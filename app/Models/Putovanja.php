<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Putovanja extends Model
{
    use HasFactory;
    //public $timestamps = false;
   // protected $fillable = ['destinacija', 'trajanje', 'opis','slika'];
   protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
