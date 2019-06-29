@extends('adminlte::page')

@section('title', 'professores')

@section('content_header')
<a href="{{route('professores.create')}}">
    <button type="button" class="btn btn-success btn-sm" title="cadastro professor">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">professores</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">Lista de Professores</div>

    <div class="panel-body table-responsive">
        <table class="table table-borderless table-striped" id="table">
            <thead>
                <th></th>
                <th>ID</th>
                <th>Nome</th>
                <th>Nascimento</th>
            </thead>
            <tbody>
                @forelse ($professores as $professor)
                <tr data-entry-id="{{ $professor->id }}">
                    <td class=""><div class="text-center"><div class="btn-group">
                        <a href="{{route('professores.edit', $professor->id)}}" class="tip btn btn-info btn-xs" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="{{route('professores.show', $professor->id)}}" class="tip btn btn-warning btn-xs" title="Detalhes"><i class="fa fa-file-text" aria-hidden="true"></i></a>
                        <form action="{{route('professores.destroy', $professor->id)}}" method="POST" onsubmit="return confirm('Tem Certeza?');" style="display:inline">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="tip btn btn-danger btn-xs" title="Deletar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form></div></div>
                    </td>
                    <td>{{$professor->id}}</td>
                    <td>{{$professor->nome}}</td>
                    <td>{{date('d-m-Y',strtotime($professor->data_nascimento))}}</td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop