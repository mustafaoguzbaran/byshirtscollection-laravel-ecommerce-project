<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function attemptCreate($createProductData)
    {
        $this->productRepository->save($createProductData);
    }

    public function attemptUpdate($updateProductData, $id)
    {
        $this->productRepository->updateProduct($updateProductData, $id);
    }

    public function attempProductPrice($updateProductPriceData, $categoryId)
    {
        if ($updateProductPriceData > 0) {
            $this->productRepository->increaseProductPrice($updateProductPriceData, $categoryId);
        } elseif ($updateProductPriceData < 0) {
            $this->productRepository->reduceProductPrice($updateProductPriceData, $categoryId);
        }
    }
}



