<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

     protected $fillable = ['name'];
     protected $table = 'categories';

     public function trip()
     {
        return $this->hasMany(Trip::class);
     }

}
