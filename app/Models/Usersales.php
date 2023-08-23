<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersales extends Model
{
    use HasFactory;

    protected $table = 'usersales';

    protected $fillable = [
        'users_id',
        'totalsales'
  
    ];
}
