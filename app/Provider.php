<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'lastname', 'phone', 'email', 'career',  'semester', 'curriculum_file','user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);  
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
