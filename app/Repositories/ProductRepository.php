<?php

namespace App\Repositories;

use App\Enums\ActiveStatus;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function query($options)
    {
        $query = $this->model;

        if (empty($options)) {
            $query = $query->orderby('id', 'desc');
        }

        if (isset($options['name']) && empty($options['filter_price']) && empty($options['filter_sold'])) {
            $query = $query->where('name', 'LIKE', '%' . escape_like($options['name']) . '%')->orderby('created_at', 'desc');
        }

        if (isset($options['category_id']) && empty($options['filter_price']) && empty($options['filter_sold'])) {
            $query = $query->whereHas('category', function ($sub) use ($options) {
                $sub->where('categories.id', $options['category_id']);
            })->orderby('products.created_at', 'desc');
        }

        if (isset($options['filter_price'])) {
            $query = $query->orderBy('price', $options['filter_price']);
        }

        if (isset($options['filter_sold'])) {
            $query = $query->orderBy('qty_pay', $options['filter_sold']);
        }

        if (isset($options['status'])) {
            $query = $query->whereIn('status', $options['status'])->orderby('created_at', 'desc');
        }

        return $query;
    }

    public function prepareProduct(array $data)
    {
        $product = [
            'name' => $data['name'] ?? '',
            'name_full' => $data['name_full'] ?? '',
            'slug' => Str::slug($data['name'] ?? ''),
            'image' => $data['image'] ?? '',
            'content' => $data['content'] ?? '',
            'category_id' => $data['category_id'] ?? '',
            'price' => $data['price'] ?? '',
            'sale' => $data['sale'] ?? '',
            'hot' => $data['hot'] ?? '',
            'status' => $data['status'] ?? ''
        ];

        return $product;
    }
}
