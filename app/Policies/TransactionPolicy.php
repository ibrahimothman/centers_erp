<?php

namespace App\Policies;


class TransactionPolicy extends Policy
{

    public function getScope()
    {
        // TODO: Implement getScope() method.
        return 'finance';
    }
}
