<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Professor;

class CursoController extends Controller
{
    /**
     * The curso repository instance
     */
    protected $cursos;

    /**
     * Create a new controller instance.
     *
     * @param  Curso  $cursos
     * @return void
     */
    public function __construct(Curso $cursos)
    {
        $this->cursos = $cursos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = $this->cursos->with('professor')->get();

        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professores = Professor::get()->pluck('nome', 'id')->prepend('please_select', '');

        return view('curso.create', compact('professores'));
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

        $curso = $this->cursos->create($dataForm);

        if($curso)
            return redirect()->route('cursos.index');
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
        $curso = $this->cursos->find($id);

        return \PDF::loadView('curso.show', compact('curso'))
            ->setPaper('a4', 'portrait') // formato a4 retrato
            ->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = $this->cursos->find($id);
        $professores = Professor::get()->pluck('nome', 'id')->prepend('please_select', '');

        return view('curso.edit', compact('curso', 'professores'));
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

        if ($dataForm['professor_id'] == null)
            unset($dataForm['professor_id']);

        $curso = $this->cursos->find($id);
        $update = $curso->update($dataForm);

        if($update)
            return redirect()->route('cursos.index');
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
        $delete = $this->cursos->destroy($id);

        if($delete)
            return redirect()->route('cursos.index');
        else
            return "erro ao deletar";
    }
}
