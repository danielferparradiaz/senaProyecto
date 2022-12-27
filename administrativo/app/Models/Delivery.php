<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'deliveries';


    public function bill(){
        return $this->belongsTo( Bill::class );
    }

    public function pay(){
        return $this->belongsTo( PaymentMethod::class );
    }

    

}
