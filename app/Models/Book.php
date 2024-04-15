<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // 主キーの設定
    protected $primaryKey = 'isbn';
    
    use HasFactory;

    public function materials(){
        // 1対多の関係は「hasMany()」で指定
        return $this->hasMany(Material::class);
    }
    
    public function reviews(){
        // 1対多の関係は「hasMany()」で指定
        return $this->hasMany(Reviews::class);
    }

}
