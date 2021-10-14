<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'name', 'description', 'salary', 'duration', 'expiration_date', 'status', 'category_id',
    ];
    

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function applicants(){
        return $this->hasMany(PurchaseDetails::class);
    }




}