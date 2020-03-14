<?php

namespace App;

use App\QueryFilter\Account;
use App\QueryFilter\EndDate;
use App\QueryFilter\StartDate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\App;

class Transaction extends Model
{
    //
    protected $guarded = [];

    public static function allTransactions($center)
    {
        return App(Pipeline::class)
            ->send($center->transactions())
            ->through([
                Account::class,
                StartDate::class,
                EndDate::class,
            ])
            ->thenReturn()->get();
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }


    public function setMetaDataAttribute($value)
    {
        return $this->attributes['meta_data'] = json_encode($value);

    }


    public function getMetaDataAttribute($value)
    {
        return json_decode($value, true);

    }


    public function payer()
    {
        return $this->meta_data['payer_type']::find($this->meta_data['payer_id']);
    }

    public function payFor()
    {
        return $this->meta_data['payFor_type']::find($this->meta_data['payFor_id']);
    }
}
