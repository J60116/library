<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public function book(){
        // 多対1の関係は「belongsTo()」で指定
        return $this->belongsTo(Book::class);
    }
    
    public function libraries(){
        // 1対多の関係は「hasMany()」で指定
        return $this->hasMany(Library::class);
    }

}
