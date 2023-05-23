<?php

namespace App\Repositories;

use App\Models\Voucher;
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
            'code' => $data['code'] ?? '',
            'sale' => $data['sale'] ?? '',
            'expire_date' => $data['expire_date'] ?? '',
        ];

        return $voucher;
    }
}
