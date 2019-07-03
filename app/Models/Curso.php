<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;

    /**
     * Os atributos que são atribuíveis a model
     *
     * @var array
     */
    protected $fillable = ['nome', 'professor_id'];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }

    public function aluno()
    {
        return $this->hasOneThrough(Aluno::class, Professor::class);
    }
}
