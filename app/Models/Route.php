<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text'];

    //ステータス定数
    const PUBLISHED = 1;
    const DRAFT = 2;
}
