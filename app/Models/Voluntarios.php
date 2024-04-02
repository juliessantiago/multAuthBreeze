<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome'
    ]; 

    public function horariosLivres(){
        return $this->belongsToMany(HorariosLivres::class);
    }
}
