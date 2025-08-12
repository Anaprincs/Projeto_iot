<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'status'
    ];


    public function sensores(){ //relacionamento
        return $this->hasMany(Sensor::class);
    }
}
