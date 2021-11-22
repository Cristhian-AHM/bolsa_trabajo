<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model{
    //
    protected $fillable = [
        'name', 'description', 'address', 'phone', 'email', 'branch', 'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);  
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }

}