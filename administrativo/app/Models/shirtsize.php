<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shirtsize extends Model
{
    use HasFactory;
    protected $table='shirtsizes';
    protected $fillable=[
        'size'
    ];
}
