<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinanceAccount extends Model
{
    protected $appends = ['top_parent'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function parent()
    {
        return $this->belongsTo(FinanceAccount::class, 'parent_id');
    }

    public function getTopParentAttribute()
    {
        $topParent = $this;
        while ($topParent->parent != null){
            $topParent = $topParent->parent;
        }

        return $topParent->id;
    }

    public function children()
    {
        return $this->hasMany(FinanceAccount::class, 'parent_id')->with('children');
    }
}
