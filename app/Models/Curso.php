<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'requisito',
        'carga_horaria',
        'valor',
    ];
    protected $cast =[
        'categoria_id' => 'integer',
        'valor' => 'float'
    ];

    public function turmas()
    {
        return $this -> hasMany(Turma::class);
    }

    public function matriculas()
    {
        return $this -> hasMany(Matricula::class);
    }
}
