<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Support\Str;

class ArticleRepository extends BaseRepository
{
    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function prepareArticle(array $data)
    {
        $article = [
            'name' => $data['name'] ?? '',
            'slug' => Str::slug($data['name'] ?? ''),
            'description' => $data['description'] ?? '',
            'content' => $data['content'] ?? '',
            'image' => $data['image'] ?? ''
        ];

        return $article;
    }
}
