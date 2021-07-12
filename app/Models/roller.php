<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roller extends Model
{
    use HasFactory;

    protected $table = 'rollers';

    protected $fillable = ['ProjeId','KullaniciId','Seviye'];

}
