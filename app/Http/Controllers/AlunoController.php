<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;

class AlunoController extends Controller
{
    /**
     * The aluno repository instance
     */
    protected $alunos;

    /**
     * Create a new controller instance.
     *
     * @param  Aluno  $alunos
     * @return void
     */
    public function __construct(Aluno $alunos)
    {
        $this->alunos = $alunos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = $this->alunos->get();

        return view('aluno.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::get()->pluck('nome', 'id')->prepend('please_select', '');

        return view('aluno.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->except('_token');

        $aluno = $this->alunos->create($dataForm);

        if($aluno)
            return redirect()->route('alunos.index');
        else
            return "erro ao criar";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = $this->alunos->find($id);
        $cursos = Curso::get()->pluck('nome', 'id');

        return view('aluno.edit', compact('cursos', 'aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->input();

        $aluno = $this->alunos->find($id);
        $update = $aluno->update($dataForm);

        if($update)
            return redirect()->route('alunos.index');
        else
            return "erro ao atualizar";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->alunos->destroy($id);

        if($delete)
            return redirect()->route('alunos.index');
        else
            return "erro ao deletar";
    }
}
