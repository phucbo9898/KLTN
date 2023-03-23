<?php

namespace App\Repositories;

use App\Models\Category_Attribute;

class CategoryAttributeRepository extends BaseRepository
{
    public function __construct(Category_Attribute $model)
    {
        $this->model = $model;
    }

    public function prepareCategoryAttribute(array $data)
    {
        $categoryAttribute = [
            'category_id' => $data['name'] ?? '',
            'slug' => Str::slug($data['name'] ?? ''),
            'type' => $data['type'] ?? '',
            'value' => $data['value'] ?? '',
        ];

        return $categoryAttribute;
    }
}
