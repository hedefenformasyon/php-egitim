<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilac extends Model
{
    use HasFactory;
    protected $table = 'ilaclar';
    protected $fillable = [
        'ilac_id',
        'ad',
        'kod',
    ];
}
