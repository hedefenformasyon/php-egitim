<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceteIlac extends Model
{
    use HasFactory;
    protected $table = 'recete_ilaclari';
    protected $fillable = [
        'recete_ilac_id',
        'recete_id',
        'ilac_id',
        'adet',
    ];
}
