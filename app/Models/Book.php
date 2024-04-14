<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // 主キーの設定
    protected $primaryKey = 'isbn';
    
    use HasFactory;
}
