<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offert extends Model
{
    protected $fillable = [
        'name', 'description', 'salary', 'duration', 'expiration_date', 'status', 'category_id',
    ];
    

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
