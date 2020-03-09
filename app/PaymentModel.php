<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PaymentModel extends Model
{
    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function getMetaDataAttribute($key)
    {
        return json_decode($key, true);
    }

    public function setMetaDataAttribute($meta_data)
    {
        $newMetaData = [];
        foreach ($meta_data as $key => $value){
            $newMetaData[str::snake($key)] = $value;
        }
        return $newMetaData;
    }
}
