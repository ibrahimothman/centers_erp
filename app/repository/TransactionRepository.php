<?php


namespace App\repository;


use App\Center;
use App\Transaction;

class TransactionRepository
{
    public static $__instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if(is_null(self::$__instance)){
            self::$__instance = new TransactionRepository();
        }
        return self::$__instance;
    }

    public function fetchTransactions($center)
    {
        $transactions = Transaction::allTransactions($center);
        $revenues_amount = 0;
        $expenses_amount = 0;
        $transactions->filter(function ($value) use (&$revenues_amount, &$expenses_amount){
            if($value->account == 1){
                $revenues_amount += $value->amount;
                return true;
            }
            else{
                $expenses_amount += $value->amount;
            }
        });

        $profit = $revenues_amount - $expenses_amount;
        $net_profit = $profit - $profit * .02;
        $transactions['revenues_amount'] = $revenues_amount;
        $transactions['expenses_amount'] = $expenses_amount;
        $transactions['profit'] = $profit;
        $transactions['net_profit'] = $net_profit;
        return $transactions;
    }

}
