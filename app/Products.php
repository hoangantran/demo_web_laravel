<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ='products';

    public function category()
	{
		return $this->belongsTo('App\Category','cat_id');
    }
    
    public function pro_details()
    {
        return $this->hasOne('App\Pro_details','pro_id');
    }

    public function oders_detail()
    {
        return $this->hasOne('App\Oder_details','pro_id');
    }
     
}
