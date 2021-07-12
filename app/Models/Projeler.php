<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeler extends Model
{
    use HasFactory;

    protected $table = 'projelers';

    protected $fillable = ['ProjeBaslik','ProjeAciklama', 'ProjeKategori', 'Sahip','UyeSayisi','KatilimcilarId','Benzersizkimlik'];
}
