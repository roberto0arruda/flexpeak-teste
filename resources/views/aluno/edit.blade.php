@extends('adminlte::page')

@section('title', 'aluno editar')

@section('content_header')
<a href="{{route('alunos.index')}}">
    <button type="button" class="btn btn-warning btn-sm">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">aluno</a></li>
    <li><a href="">Editar</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">editar aluno</div>

    <div class="panel-body table-responsive">
        @include('includes.alerts')

        <form action="{{route('alunos.update', $aluno->id)}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            <div class="form-group @error('nome')is-invalid @enderror">
                <label for="nome">Nome <sup style="color:red">*</sup></label>
                <input type="text" name="nome" id="nome" value="{{ isset($aluno->nome) ? $aluno->nome : old('nome') }}" class="form-control" placeholder="Nome Completo" required>
                @error('nome')
                    <p class="help-block">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="formp-group @error('data_nascimento')is-invalid @enderror">
                            <label for="data_nascimento">Nascimento <sup style="color:red">*</sup></label>
                            <input type="date" name="data_nascimento" id="data_nascimento" value="{{ isset($aluno->data_nascimento) ? $aluno->data_nascimento : old('data_nascimento') }}" class="form-control" required>
                            @error('data_nascimento')
                                <p class="help-block">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="curso_id">Curso <sup style="color:red">*</sup></label>
                        <select name="curso_id" id="curso_id" class="form-control">
                            <option value="{{$aluno->curso->id}}">{{$aluno->curso->nome}}</option>
                            @foreach ($cursos as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group @error('cep')is-invalid @enderror">
                            <label for="cep">Cep <sup style="color:red">*</sup></label>
                            <input type="text" name="cep" id="cep" class="form-control" value="{{ isset($aluno->cep) ? $aluno->cep : old('cep') }}" required>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <label for="logradouro">Logradouro <sup style="color:red">*</sup></label>
                        <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Nome da Rua" value="{{ isset($aluno->logradouro) ? $aluno->logradouro : old('logradouro') }}" required>
                    </div>
                    <div class="col-md-2">
                        <label for="numero">Numero <sup style="color:red">*</sup></label>
                        <input type="text" name="numero" class="form-control" value="{{ isset($aluno->numero) ? $aluno->numero : old('numero') }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="bairro">Bairro <sup style="color:red">*</sup></label>
                        <input type="text" class="form-control" name="bairro" id="bairro"  value="{{ isset($aluno->bairro) ? $aluno->bairro : old('bairro') }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cidade">Cidade <sup style="color:red">*</sup></label>
                        <input type="text" class="form-control" name="cidade" id="cidade" value="{{ isset($aluno->cidade) ? $aluno->cidade : old('cidade') }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estado">Estado <sup style="color:red">*</sup></label>
                        <input type="text" name="uf" id="estado" class="form-control" value="{{ isset($aluno->uf) ? $aluno->uf : old('uf') }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="atualizar">
            </div>
        </form>
    </div>
</div>
@stop