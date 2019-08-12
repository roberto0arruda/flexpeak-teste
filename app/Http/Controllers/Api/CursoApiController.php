<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curso;

class CursoApiController extends Controller
{
	protected $curso;

	public function __construct(curso $curso)
	{
		$this->curso = $curso;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->curso::all());
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
            $this->curso::create($request->all());

            return response()->json(['msg' => 'Criado com sucesso!'], 201);
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
        return response()->json($this->curso::find($id));
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
			$this->curso::find($id)->update($request->all());

			return response()->json(['msg' => 'Atualizado com sucesso'], 201);
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
			$this->curso::destroy($id);

			return response()->json(['msg' => 'Deletado com sucesso'], 200);
		} catch (\Exception $e) {
			if ( config('app.debug') ) {
                return response()->json(['msg' => $e->getMessage()]);
            }

            return response()->json(['msg' => 'Erro ao deletar']);
		}
    }
}
