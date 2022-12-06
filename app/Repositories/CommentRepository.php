<?php

namespace App\Repositories;

use App\Models\Slide;

class CommentRepository extends BaseRepository
{
    public function __construct( $model)
    {
        $this->model = $model;
    }
}
