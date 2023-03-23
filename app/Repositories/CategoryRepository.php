<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function query($options)
    {
        $query = $this->model;

        if (isset($options['name'])) {
            $query = $query->where('name', 'LIKE', '%' . escape_like($options['name']) . '%');
        }

        if (isset($options['attribute'])) {
            $query = $query->whereHas('attributes', function ($sub) use ($options) {
                $sub->where('attributes.id', $options['attribute']);
            });
        }

        if (isset($options['status'])) {
            $query = $query->whereIn('status', $options['status']);
        }

        return $query;
    }

    public function prepareCategory(array $data)
    {
        $category = [
            'name' => $data['name'] ?? '',
            'slug' => Str::slug($data['name'] ?? ''),
//            'status' => $data['status']
        ];

        return $category;
    }
}
