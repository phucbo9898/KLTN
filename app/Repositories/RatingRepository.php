<?php

namespace App\Repositories;

use App\Models\Rating;

class RatingRepository extends BaseRepository
{
    public function __construct(Rating $model)
    {
        $this->model = $model;
    }

}
