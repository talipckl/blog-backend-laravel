<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='subs';
    protected $date = ['created_at','updated_at','deleted_at'];
    protected $fillable = [
        'mail_address',
        'status',
    ];

}
