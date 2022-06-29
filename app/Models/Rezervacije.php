<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezervacije extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['ime', 'prezime', 'broj_osoba','paket_id'];
}
