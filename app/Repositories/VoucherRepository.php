<?php

namespace App\Repositories;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Support\Str;

class VoucherRepository extends BaseRepository
{
    public function __construct(Voucher $model)
    {
        $this->model = $model;
    }

    public function prepareVoucher(array $data)
    {
        $voucher = [
            'category_id' => $data['category_id'] ?? 1,
            'code' => $data['code'] ?? '',
            'sale' => $data['sale'] ?? '',
            'expire_date' => $data['expire_date'] ?? Carbon::now()->format('Y-m-d'),
        ];

        return $voucher;
    }
}
