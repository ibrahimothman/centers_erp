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
        $expenses_amount = 0; $transactions->filter(function ($value) use (&$revenues_amount, &$expenses_amount){
            if($value->account->parent->id == 1){
                $revenues_amount += $value->amount;
                return true;
            }
            else if($value->account->parent->id == 2){
                $expenses_amount += $value->amount;
            }

        });

        $profit = $revenues_amount - $expenses_amount;
        $tax = abs($profit) * .2;
        $net_profit = $profit - $tax;
        $transactions['revenues_amount'] = $revenues_amount;
        $transactions['expenses_amount'] = $expenses_amount;
        $transactions['profit'] = $profit;
        $transactions['tax'] = $tax;
        $transactions['net_profit'] = $net_profit;
//
        return $transactions;
    }

}
