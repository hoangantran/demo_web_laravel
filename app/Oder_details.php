<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oders_detail extends Model
{
    //
    protected $table ='oder_details';

    public function oders()
    {
        return $this->belongsTo('App\Oders','o_id');
    }

    public function products()
    {
        return $this->hasOne('App\Products','pro_id');
    }
}
