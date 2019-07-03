<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Relatório do Curso - {{$curso->nome.' - '.date('d/m/Y')}}</title>
    <link rel="stylesheet" href="{{asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/print.css')}}" media="print">
</head>
<body>
    <small style="float:right">Emitido por {{auth()->user()->name}} <br>
        <b>Data:</b>{{ strftime('%a, %d de %B de %Y %H:%M:%S') }}</small>
    <h1>Relatorio de Alunos por Curso</h1>
    <fieldset>
        <legend>Curso</legend>
        <div class="row">
            <div class="col-sm">
                Titulo: <b>{{$curso->nome}}</b>
            </div>
            <div class="col-sm">
                Professor: <b>{{$curso->professor->nome}}</b>
            </div>
        </div>
    </fieldset>

    <hr>

    <table class="table table-bordered" border="0" width="100%">
        <tr align="center">
            <td></td><td><h3>Lista de Alunos</h3></td><td></td>
        </tr>
        <tr align="center"><td>Matricula</td><td>Nome</td><td>Nascimento</td></tr>
        @forelse ($curso->alunos as $aluno)
        <tr align="center">
            <td>{{$aluno->id}}</td>
            <td>{{$aluno->nome}}</td>
            <td>{{date('d-m-Y',strtotime($aluno->data_nascimento))}}</td>
        </tr>
        @empty
        <tr><td align="center">Não existe alunos para este curso</td></tr>
        @endforelse
    </table>
    <br/><br/>
    <table class="boldtable" style="width:100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" bgcolor="#FFFFFF">________________________</td>
            <td align="center" bgcolor="#FFFFFF">________________________</td>
            <td align="center" bgcolor="#FFFFFF">________________________</td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF">Professor</td>
            <td align="center" bgcolor="#FFFFFF">Diretor</td>
            <td align="center" bgcolor="#FFFFFF">Secretario</td>
        </tr>
    </table>
</body>
</html>