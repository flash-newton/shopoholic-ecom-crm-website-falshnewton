<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'ref_no',
        'user_id',
        'phone',
        'address',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function items(){
        return $this->hasMany(Orderitems::class,'orders_id','id');
    }
}
