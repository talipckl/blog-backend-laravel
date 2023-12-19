<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='blogs';
    protected $date = ['created_at','updated_at','deleted_at'];
    protected $fillable=[
        'category_id',
        'user_id',
        'img',
        'title',
        'description',
        'release_date',
    ];
    public function category(){
        return $this->belongsTo(BlogCategory::class,'category_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
