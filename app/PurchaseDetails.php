<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    protected $fillable = [
        'offer_id', 'user_id', 'status_offer', 'application_date',
    ];

    public function offer(){
        return $this->belongsTo(Offer::class);  
    }

    public function user(){
        return $this->belongsTo(User::class);  
    }
}
