<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function prepareProduct(array $data)
    {
        $product = [
            'name' => $data['name'] ?? '',
            'slug' => Str::slug($data['name'] ?? ''),
            'image' => $data['image'] ?? '',
            'description' => $data['description'] ?? '',
            'content' => $data['content'] ?? '',
            'category_id' => $data['category_id'] ?? '',
            'price' => $data['price'] ?? '',
            'sale' => $data['sale'] ?? '',
        ];

        return $product;
    }
}
