<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository extends BaseRepository
{
    public function __construct(Article $model)
    {
        $this->model = $model;
    }
}
