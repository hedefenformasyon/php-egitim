<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recete extends Model
{
    use HasFactory;
    protected $table = 'receteler';
    protected $fillable = [
        'recete_id',
        'no',
        'tur',
        'tarih',
        'klinik_id',
        'hasta_id',
        'doktor_id'
    ];
}
