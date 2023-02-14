<?php

namespace App\Managers;

use http\Client\Request;
use App\Models\File;

class FileManager
{
    /**
     * @param Request $request
     * @param string $field
     * @param string $path
     * @return File
     */
    public function saveFile(Request $request, string $field, string $path): File
    {
        // Tikriname, ar užklausa turi failą ir ar jis yra validus paveikslėlio failas
        if ($request->hasFile($field) && $request->file($field)->isValid()) {
            // Įkeliame failą į /tmp/ aplanką
            $image = $request->file($field);

            // Gaunamas paveikslelio pavadinimą
            $clientOriginalName = $image->getClientOriginalName();

            // Atlieka /tml/phpHG948fWRFG paveikslelio perkelima į public/img/products katalogą
            $image->move(public_path($path), $clientOriginalName);

            // Sukurti naują DB įrašą su paveikslelio pavadinimu ir kitai duomenimis į file_data lentele
            // Gauta rezultatą gražiname
            return File::create([
                'path' => public_path($path) . '/' . $clientOriginalName,
                'url' => '/'. $path . '/' . $clientOriginalName,
                'name' => $clientOriginalName,
                'size' => $image->getSize(),
                'extension' => $image->getClientOriginalExtension(),
            ]);
        }
    }
}
