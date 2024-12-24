<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doktor extends Model
{
    use HasFactory;
    protected $table = 'doktorlar';
    protected $fillable = [
        'dr_id',
        'ad',
        'soyad',
        'title',
        'klinik_id',
    ];
}
