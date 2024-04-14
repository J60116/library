<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user(){
        // 多対1の関係は「belongsTo()」で指定
        return $this->belongsTo(User::class);
    }
    public function material(){
        // 多対1の関係は「belongsTo()」で指定
        return $this->belongsTo(Material::class);
    }
}
