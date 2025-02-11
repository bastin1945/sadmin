<?php

namespace App\Repositories;

use App\Models\order;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function createTransaction(array $data)
    {
        return order::create($data);
    }
}
