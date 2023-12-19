<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='blog_categories';
    protected $date = ['created_at','updated_At','deleted_at'];
    protected $fillable=[
        'name',
    ];
    public function blog(){
        return $this->hasMany(Blog::class,'category_id','id');
    }
}
