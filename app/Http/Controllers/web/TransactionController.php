<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Diploma;
use App\Http\Controllers\Controller;
use App\repository\TransactionRepository;
use App\Rules\TransactionMetaDateRule;
use App\Student;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class TransactionController extends Controller
{


    public function allTransactions()
    {
        $center = Center::findOrFail(Session('center_id'));
        return TransactionRepository::getInstance()->fetchTransactions($center);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $center = Center::findOrFail(Session('center_id'));
        $data = $this->validateTransaction($request);
        if($data->fails()){
            return response()->json(['message' => 'invalid data', 'error' => true]);
        }
        $transactions = $data->validate()['transactions'];
        foreach ($transactions as $transaction){
            $center->transactions()->create($transaction);
        }
        return response()->json(['message' => 'transactions are successfully added :)', 'error' => false]);
    }


    private function validateTransaction(Request $request)
    {
        /*
         * date, amount, account, meta-data
         * */
        $validator =  Validator::make($request->all(),[
            'transactions' => ['required' , 'array'],
            'transactions.*.account' => ['required', 'integer'],
            'transactions.*.amount' => ['required', 'integer'],
            'transactions.*.rest' => ['required', 'integer'],
            'transactions.*.date' => ['required', 'date'],
            'transactions.*.meta_data' => ['required', 'array'],
            'transactions.*.meta_data.payer_id' => ['required', 'integer'],
            'transactions.*.meta_data.payer_type' => ['required'],
            'transactions.*.meta_data.payFor_id' => ['required', 'integer'],
            'transactions.*.meta_data.payFor_type' => ['required'],
        ]);

        return $validator;
    }
}
