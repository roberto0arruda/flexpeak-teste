<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use SoftDeletes;

    protected $table = 'professores';

    /**
     * Os atributos que são atribuíveis na model
     *
     * @var array
     */
    protected $fillable = ['nome', 'data_nascimento'];
}
