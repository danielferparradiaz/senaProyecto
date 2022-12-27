<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shirttype extends Model
{
    use HasFactory;
    protected $table='shirttypes';
    protected $fillable=[
        'type'
    ];
}
