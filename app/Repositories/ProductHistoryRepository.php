<?php

namespace App\Repositories;

use App\Models\ProductHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductHistoryRepository extends BaseRepository
{
    public function __construct(ProductHistory $model)
    {
        $this->model = $model;
    }

    public function queryImport($options)
    {
        $query = $this->model->where('number_import', '!=', null);

        if (isset($options['name'])) {
            $query = $query->where('name', 'LIKE', '%' . escape_like($options['name']) . '%');
        }

        if (isset($options['category_id'])) {
            $query = $query->whereHas('category', function ($sub) use ($options) {
                $sub->where('categories.id', $options['category_id']);
            });
        }

        if (empty($options['end_time']) && !empty($options['start_time'])) {
            $startOfDay = Carbon::parse($options['start_time'])->format('Y-m-d');
            $query = $query->where(DB::raw('date_format(time_import, "%Y-%m-%d")'), $startOfDay);
        }

        if (empty($options['start_time']) && !empty($options['end_time'])) {
            $endOfDay = Carbon::parse($options['end_time'])->format('Y-m-d');
            $query = $query->where(DB::raw('date_format(time_import, "%Y-%m-%d")'), $endOfDay);
        }

        if (!empty($options['end_time']) && !empty($options['start_time'])) {
            $startOfTime = Carbon::parse($options['start_time'])->startOfDay();
            $endOfTime = Carbon::parse($options['end_time'])->endOfDay();
            $query = $query->where('time_import', '>=', $startOfTime)->where('time_import', '<=', $endOfTime);
        }

        return $query;
    }

    public function queryExport($options)
    {
        $query = $this->model->where('number_export', '!=', null);

        if (isset($options['name'])) {
            $query = $query->where('name', 'LIKE', '%' . escape_like($options['name']) . '%');
        }

        if (isset($options['category_id'])) {
            $query = $query->whereHas('category', function ($sub) use ($options) {
                $sub->where('categories.id', $options['category_id']);
            });
        }

        if (empty($options['end_time']) && !empty($options['start_time'])) {
            $startOfDay = Carbon::parse($options['start_time'])->format('Y-m-d');
            $query = $query->where(DB::raw('date_format(time_export, "%Y-%m-%d")'), $startOfDay);
        }

        if (empty($options['start_time']) && !empty($options['end_time'])) {
            $endOfDay = Carbon::parse($options['end_time'])->format('Y-m-d');
            $query = $query->where(DB::raw('date_format(time_export, "%Y-%m-%d")'), $endOfDay);
        }

        if (!empty($options['end_time']) && !empty($options['start_time'])) {
            $startOfTime = Carbon::parse($options['start_time'])->startOfDay();
            $endOfTime = Carbon::parse($options['end_time'])->endOfDay();
            $query = $query->where('time_export', '>=', $startOfTime)->where('time_export', '<=', $endOfTime);
        }

        return $query;
    }

    public function prepareProduct(array $data)
    {
        $product = [
            'name' => $data['name'] ?? '',
            'slug' => Str::slug($data['name'] ?? ''),
            'image' => $data['image'] ?? '',
            'description' => $data['description'] ?? '',
            'content' => $data['content'] ?? '',
            'category_id' => $data['category_id'] ?? '',
            'price' => $data['price'] ?? '',
            'sale' => $data['sale'] ?? '',
        ];

        return $product;
    }
}
