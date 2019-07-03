<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    /**
     * Os atributos que são atribuíveis a model
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'data_nascimento',
        'cep', 'logradouro', 'numero', 'cidade', 'uf', 'bairro',
        'curso_id'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
