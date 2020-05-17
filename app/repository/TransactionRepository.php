<?php


namespace App\repository;


use App\Center;
use App\Transaction;
use DateInterval;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
//
        $finance = $this->countRevenuesAndExpenses($transactions);
        $revenues_amount = $finance['revenues_amount'];
        $expenses_amount = $finance['expenses_amount'];

        $profit = $revenues_amount - $expenses_amount;
        $tax = abs($profit) * .2;
        $net_profit = $profit - $tax;


        $result['transactions'] = $this->fetchMonthlyFinanceSummary($transactions);
        $result['finance']['revenues_amount'] = $revenues_amount;
        $result['finance']['expenses_amount'] = $expenses_amount;
        $result['finance']['profit'] = $profit;
        $result['finance']['tax'] = $tax;
        $result['finance']['net_profit'] = $net_profit;


        return $result;
    }

    /*
     * count revenues_amount and expenses_amount for incoming transactions
     * */
    private function countRevenuesAndExpenses($transactions)
    {
        $revenues_amount = 0;
        $expenses_amount = 0;
        foreach ($transactions as $transaction) {
            $account = $transaction->account;
            while ($account->parent_id != null) {
                if ($account->parent_id == 1) {
                    $revenues_amount += $transaction->amount;
                } else if ($account->parent->id == 2) {
                    $expenses_amount += $transaction->amount;
                }
                $account = $account->parent;
            }
        }
        $finance['revenues_amount'] = $revenues_amount;
        $finance['expenses_amount'] = $expenses_amount;
        return $finance;
    }

    public function fetchMonthlyFinanceSummary($transactions)
    {
        $months = $transactions->groupBy(function ($val) {
                return Carbon::parse($val->date)->format('Y/m');
            });

            $finance_summary = [];
            foreach ($months as $month => $transactions) {
                $temp = [];
                $temp['date'] = $month;
                $temp['transactions'] = $transactions;
                $finance = $this->countRevenuesAndExpenses($transactions);
                $revenues_amount = $finance['revenues_amount'];
                $expenses_amount = $finance['expenses_amount'];
                $profit = $revenues_amount - $expenses_amount;
                $tax = abs($profit) * .2;
                $net_profit = $profit - $tax;

                $temp['revenues_amount'] = $revenues_amount;
                $temp['expenses_amount'] = $expenses_amount;
                $temp['tax'] = $tax;
                $temp['net_profit'] = $net_profit;

                $finance_summary[] = $temp;
            }

            return $finance_summary;
    }
}
