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

    public function prepareCategory(array $data)
    {
        $category = [
            'name' => $data['name'] ?? '',
            'slug' => Str::slug($data['name'] ?? ''),
            'status' => $data['status']
        ];

        return $category;
    }
}
