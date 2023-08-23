<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'actual_price',
        'discount',
        'sold_price',
        'stock',
        'soldcount',
        'sub_category',
        'trending',
        'status',
        'prod_img',
        'category_id'
  
    ];

    public function popular(){
        $topprod = Product::orderBy('soldcount', 'desc')->take(2)->pluck('id');
        return $topprod->contains($this->id);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }



}

