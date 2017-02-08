<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $fillable=[
        'customer_id',
        'category',
        'description',
        'pooled_with',
        'acquired_net_asset_value',
        'acquired_date',
        'estimated_yield_over_two_yrs',

    ];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}

