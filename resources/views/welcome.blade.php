@extends('layouts.app')

@section('content')
<div class="content">
    <div class="title m-b-md">
        {{config('app.name')}}
    </div>

    <div class="links">
        <a href="/alunos">Alunos</a>
        <a href="/clientes">Cursos</a>
        <a href="/professores">Professores</a>
        <a href="https://github.com/roberto0arruda/teste-flexpeak" target="_blank">GitHub</a>
    </div>
</div>
@endsection