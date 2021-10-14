<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'position', 'reference', 'status', 'provider_id',
    ];
    

    public function provider(){
        return $this->belongsTo(Provider::class);
    }





}
