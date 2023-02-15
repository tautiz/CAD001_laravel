<?php

namespace App\Managers;

use App\Http\Requests\ProductRequestInterface;
use App\Models\File;
use App\Models\Product;

class ProductManager
{
    protected const IMAGE_PATH       = 'img/products';
    protected const IMAGE_FIELD_NAME = 'foto';

    public function __construct(protected FileManager $fileManager,)
    {
    }

    public function updateMainImage(Product $product, ProductRequestInterface $request): void
    {
        $this->fileManager->removeFile($product->image, $product->id, Product::class);
        $file = $this->fileManager->storeFile($request, self::IMAGE_FIELD_NAME, self::IMAGE_PATH);
        $this->fileManager->assignModel($file, $product);
        $this->assignMainImage($product, $file);
    }

    public function assignMainImage(Product $product, ?File $file): void
    {
        if ($file === null) {
            return;
        }

        $product->image   = $file->url;
        $file->model_id   = $product->id;
        $file->model_type = Product::class;
        $file->save();
        $product->save();
    }

    public function addImage(Product $product, ProductRequestInterface $request): void
    {
        $file = $this->fileManager->storeFile($request, self::IMAGE_FIELD_NAME, self::IMAGE_PATH);
        $this->fileManager->assignModel($file, $product);
        $this->assignMainImage($product, $file);
    }
}
