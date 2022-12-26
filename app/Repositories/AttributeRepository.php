<?php

namespace App\Repositories;

use App\Models\Attribute;
use Illuminate\Support\Str;

class AttributeRepository extends BaseRepository
{
    public function __construct(Attribute $model)
    {
        $this->model = $model;
    }

    public function prepareAttribute(array $data)
    {
        $attribute = [
            'name' => $data['name'] ?? '',
            'slug' => Str::slug($data['name'] ?? ''),
            'type' => $data['type'] ?? '',
            'value' => $data['value'] ?? '',
        ];

        return $attribute;
    }
}
