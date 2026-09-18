<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'curso_id',
        'codigo',
        'data_inicio',
        'data_fim',
    ];
    protected $cast =[
        'curso_id'=>'intiger',
        'data_inicio'=>'date',
        'data_fim' => 'date',
    ];
    public function Curso()
    {
        return $this -> belongTo(curso::class,'curso_id');
    }
}
