<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasta extends Model
{
    use HasFactory;
    protected $table= 'hastalar';
    protected $fillable = [
        'hasta_id',
        'ad',
        'soyad',
        'cinsiyet',
        'dogum_tarihi',
        'klinik_id',
    ];
}
