@extends('adminlte::page')

@section('title', 'cursos')

@section('content_header')
<a href="{{route('cursos.create')}}">
    <button type="button" class="btn btn-success btn-sm" title="cadastro curso">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">cursos</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">Lista de cursos</div>

    <div class="panel-body table-responsive">
        <table class="table table-borderless table-striped" id="table">
            <thead>
                <th></th>
                <th>ID</th>
                <th>NOME</th>
                <th>DATA_CRIACAO</th>
                <th>PROFESSOR</th>
            </thead>
            <tbody>
                @forelse ($cursos as $curso)
                <tr data-entry-id="{{ $curso->id }}">
                    <td class=""><div class="text-center"><div class="btn-group">
                        <a href="{{route('cursos.edit', $curso->id)}}" class="tip btn btn-info btn-xs" title="Editar">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="{{route('cursos.show', $curso->id)}}" class="tip btn btn-default btn-xs" title="Imprimir Detalhes"><i class="fa fa-print" aria-hidden="true"></i></a>
                        <form action="{{route('cursos.destroy', $curso->id)}}" method="POST" onsubmit="return confirm('Tem Certeza?');" style="display:inline">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="tip btn btn-danger btn-xs" title="Deletar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form></div></div>
                    </td>
                    <td>{{$curso->id}}</td>
                    <td>{{$curso->nome}}</td>
                    <td>{{date('d-m-Y',strtotime($curso->created_at))}}</td>
                    @if (isset($curso->professor->nome))
                        <td>{{$curso->professor->nome}}</td>
                    @else
                        <td class="danger" title="Sem Professor vinculado">Curso Bloqueado</td>
                    @endif
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop