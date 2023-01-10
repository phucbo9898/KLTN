<?php

namespace App\Repositories;

use App\Models\Attribute;
use App\Models\Attribute_Value;
use Illuminate\Support\Str;

class AttributeValueRepository extends BaseRepository
{
    public function __construct(Attribute_Value $model)
    {
        $this->model = $model;
    }

    public function prepareAttributeValue(array $data)
    {
        $attributeValue = [
            'value' => $data['value'] ?? ''
        ];

        return $attributeValue;
    }
}
