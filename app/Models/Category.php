<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'cat_img',
        'status',
  
    ];

    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function genres(){
        return $this->hasMany(Genre::class,'category_id','id');
    }


}
