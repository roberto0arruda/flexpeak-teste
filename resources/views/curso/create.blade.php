@extends('adminlte::page')

@section('title', 'curso cadastrar')

@section('content_header')
<a href="{{route('cursos.index')}}">
    <button type="button" class="btn btn-warning btn-sm">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">curso</a></li>
    <li><a href="">Cadastrar</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">cadastrar curso</div>

    <div class="panel-body table-responsive">
        @include('includes.alerts')

        <form action="{{route('cursos.store')}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}

            @include('curso.form', ['formMode' => 'create'])

        </form>
    </div>
</div>
@stop