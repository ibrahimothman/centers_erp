<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinanceAccount extends Model
{
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function parent()
    {
        return $this->belongsTo(FinanceAccount::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(FinanceAccount::class, 'parent_id')->with('children');
    }
}
