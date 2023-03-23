<?php

namespace App\Repositories;

use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RatingRepository extends BaseRepository
{
    public function __construct(Rating $model)
    {
        $this->model = $model;
    }
}
