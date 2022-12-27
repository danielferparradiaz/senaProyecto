<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeprint extends Model
{
    use HasFactory;
    protected $table='typesprint';
    protected $fillable=[
        'print'
    ];
}
