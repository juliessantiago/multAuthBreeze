<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorariosLivres extends Model
{
    use HasFactory;

    protected $fillable = [
        'diaSemana',
        'inicioExpediente',
        'finalExpediente',
    ];

    
    public function voluntarios(){
        return $this->belongsToMany(Voluntarios::class);
    }

}
