<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id', 'sale_date', 'tax', 'total','status','picture', 'type'
    ];

    public function user(){
        return $this->belongsTo(User::class);  
    }

    public function saleDetails(){
        return $this->hasMany(saleDetails::class);  
    }
}
