<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'curso_id',
        'turma_id',
        'aluno_id',
        'data_matricula',
    ];
    protected $cast =[
        'curso_id'=>'intiger',
        'turma_id'=>'intiger',
        'aluno_id'=>'intiger',
        'data_fim' => 'date',
    ];
    public function Curso()
    {
        return $this -> belongTo(Curso::class,'curso_id');
    }
    public function Turma()
    {
        return $this -> belongTo(Turma::class,'turma_id');
    }
    public function Aluno()
    {
        return $this -> belongTo(Aluno::class,'aluno_id');
    }
}
