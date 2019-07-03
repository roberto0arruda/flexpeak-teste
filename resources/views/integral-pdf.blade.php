<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Relatório de Alunos - {{date('d/m/Y')}}</title>
    <link rel="stylesheet" href="{{asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
</head>
<body>
	<small style="float:right">Emitido por {{auth()->user()->name}} <br>
		<b>Data: </b>{{ strftime('%a, %d de %B de %Y %H:%M:%S') }}</small>
	<h1>Relatório de Alunos</h1>

	@foreach ($data as $aluno)
	<fieldset>
		<legend>Aluno</legend>
		<div class="row">
			<div class="col-sm">
				Academico: <b>{{$aluno->nome}}</b>
			</div>
			<div class="col-sm">
				Nascimento: <b>{{date('d-m-Y',strtotime($aluno->data_nascimento))}}</b>
			</div>
		</div>
		<table class="table">
			<tr>
				<td>Endereço: <b>{{$aluno->logradouro}}, {{$aluno->numero}} - {{$aluno->bairro}} - {{$aluno->cidade}} - {{$aluno->uf}}</b></td>
			</tr>
			<tr><td>Cep: <b>{{$aluno->cep}}</b></td></tr>
		</table>
		<br/>
		<table class="table">
			<tr><td>Curso: <b>{{$aluno->curso->nome}}</b></td></tr>
			<tr><td>Professor: {{$aluno->curso->professor->nome}}</td></tr>
		</table>
	</fieldset>
	@endforeach

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