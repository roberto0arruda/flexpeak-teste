@extends('adminlte::page')

@section('title', 'alunos')

@section('content_header')
<a href="{{route('alunos.create')}}">
    <button type="button" class="btn btn-success btn-sm" title="cadastro aluno">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">alunos</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">Lista de alunos</div>

    <div class="panel-body table-responsive">
        <table class="table table-borderless table-striped" id="table">
            <thead>
                <th></th>
                <th>ID</th>
                <th>NOME</th>
                <th>DATA_NASCIMENTO</th>
                <th>LOGRADOURO</th>
                <th>NUMERO</th>
                <th>BAIRRO</th>
                <th>CIDADE</th>
                <th>ESTADO</th>
                <th>DATA_CRIACAO</th>
                <th>CEP</th>
                <th>CURSO</th>
            </thead>
            <tbody>
                @forelse ($alunos as $aluno)
                <tr data-entry-id="{{ $aluno->id }}"
                    @if($aluno->deleted_at) class="danger" title="aluno Bloqueado" >
                    <td class=""><div class="text-center"><div class="btn-group">
                        <form action="{{route('alunos.restore', $aluno->id)}}" method="POST" onsubmit="return confirm('Restaurar?');" style="display:inline">
                            {!! csrf_field() !!}
                            <button type="submit" class="tip btn btn-info btn-xs" title="Restaurar"><i class="fa fa-recycle" aria-hidden="true"></i></button>
                        </form>
                    </td>
                    @else >
                    <td class=""><div class="text-center"><div class="btn-group">
                        <a href="{{route('alunos.edit', $aluno->id)}}" class="tip btn btn-info btn-xs" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <form action="{{route('alunos.destroy', $aluno->id)}}" method="POST" onsubmit="return confirm('Deletar?');" style="display:inline">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="tip btn btn-danger btn-xs" title="Deletar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form></div></div>
                    </td>
                    @endif
                    <td>{{$aluno->id}}</td>
                    <td>{{$aluno->nome}}</td>
                    <td>{{date('d-m-Y',strtotime($aluno->data_nascimento))}}</td>
                    <td>{{$aluno->logradouro}}</td>
                    <td>{{$aluno->numero}}</td>
                    <td>{{$aluno->bairro}}</td>
                    <td>{{$aluno->cidade}}</td>
                    <td>{{$aluno->uf}}</td>
                    <td>{{date('d-m-Y',strtotime($aluno->created_at))}}</td>
                    <td>{{$aluno->cep}}</td>
                    <td>{{$aluno->curso->nome}}</td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop