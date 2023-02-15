<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository extends BaseRepository
{
    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function query($options)
    {
        $query = $this->model;

        if (isset($options['name'])) {
            $query = $query->whereHas('user', function ($sub) use ($options) {
                $sub->where('users.name', 'LIKE', '%' . escape_like($options['name']) . '%');
            });
        }

        if (isset($options['code'])) {
            $query = $query->where('payment_code', 'LIKE', '%' . escape_like($options['code']) . '%');
        }

        if (isset($options['status'])) {
            $query = $query->where('status', $options['status']);
        }

        if (isset($options['status_payment'])) {
            $query = $query->where('status_payment', $options['status_payment']);
        }

        if (isset($options['type_payment'])) {
            $query = $query->where('type_payment', $options['type_payment']);
        }

        return $query;
    }
}
