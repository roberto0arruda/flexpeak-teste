<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Professor;

class ProfessorController extends Controller
{
	protected $professor;

	public function __construct(Professor $professor)
	{
		$this->professor = $professor;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => $this->professor::paginate(5)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->professor::create($request->all());

            return response()->json(['msg' => 'Produto criado com sucesso!'], 201);
        } catch (\Exception $e) {
            if ( config('app.debug') ) {
                return response()->json(['msg' => $e->getMessage()]);
            }

            return response()->json(['msg' => 'Erro ao criar']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->professor::find($id));
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
		try {
			$this->professor::find($id)->update($request->all());

			return response()->json(['msg' => 'atualizado com sucesso'], 201);
		} catch (\Exception $e) {
			if ( config('app.debug') ) {
                return response()->json(['msg' => $e->getMessage()]);
            }

            return response()->json(['msg' => 'Erro ao atualizar']);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
			$this->professor::destroy($id);

			return response()->json(['msg' => 'deletado com sucesso'], 200);
		} catch (\Exception $e) {
			if ( config('app.debug') ) {
                return response()->json(['msg' => $e->getMessage()]);
            }

            return response()->json(['msg' => 'Erro ao deletar']);
		}
    }
}
