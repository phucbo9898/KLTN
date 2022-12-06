<?php

namespace App\Repositories;

use App\Models\Slide;

class SlideRepository extends BaseRepository
{
    public function __construct(Slide $model)
    {
        $this->model = $model;
    }

    public function prepareSlide(array $data)
    {
        $slide = [
            'name' => $data['name'] ?? '',
            'image' => $data['image'] ?? ''
        ];

        return $slide;
    }
}
