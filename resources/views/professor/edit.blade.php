@extends('adminlte::page')

@section('title', 'professor editar')

@section('content_header')
<a href="{{route('professores.index')}}">
    <button type="button" class="btn btn-warning btn-sm">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Professor</a></li>
    <li><a href="">Editar</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">editar professor</div>

    <div class="panel-body table-responsive">
        @include('includes.alerts')

        <form action="{{route('professores.update', $professor->id)}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            @include('professor.form', ['formMode' => 'update'])

        </form>
    </div>
</div>
@stop