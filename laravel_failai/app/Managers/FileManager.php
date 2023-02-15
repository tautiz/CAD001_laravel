<?php

namespace App\Managers;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Throwable;

class FileManager
{
    /**
     * @param FormRequest $request
     * @param string $field
     * @param string $path
     * @return File|null
     */
    public function storeFile(FormRequest $request, string $field, string $path): ?File
    {
        // Tikriname, ar užklausa turi failą ir ar jis yra validus paveikslėlio failas
        if ($request->hasFile($field) && $request->file($field)->isValid()) {
            // Įkeliame failą į /tmp/ aplanką
            $image = $request->file($field);

            // Gaunamas paveikslelio pavadinimą
            $clientOriginalName = date('ymdhis').'_'.$image->getClientOriginalName();
            $size = $image->getSize();

            // Atlieka /tml/phpHG948fWRFG paveikslelio perkelima į public/img/products katalogą
            $image->move(public_path($path), $clientOriginalName);

            // Sukurti naują DB įrašą su paveikslelio pavadinimu ir kitai duomenimis į file_data lentele
            // Gauta rezultatą gražiname
            return File::create([
                'path' => public_path($path) . '/' . $clientOriginalName,
                'url' => '/'. $path . '/' . $clientOriginalName,
                'name' => $clientOriginalName,
                'size' => $size,
                'extension' => $image->getClientOriginalExtension(),
            ]);
        }

        return null;
    }

    /**
     * @throws Throwable
     */
    public function removeFile(?string $imagePath, int $id, string $class): void
    {
        if ($imagePath) {
            /** @var File $file */
            $file = File::where(['url' => $imagePath, 'model_type' => $class, 'model_id' => $id])->first();
            $file?->deleteOrFail();
        }
    }

    public function assignModel(File $file, Model $model): void
    {
        $file->model_id   = $model->id;
        $file->model_type = $model::class;
        $file->save();
    }
}
