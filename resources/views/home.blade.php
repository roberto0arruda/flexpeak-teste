@extends('layouts.app')

@section('content')
@auth
	<app-content></app-content>
@else
	<div class="container h-100" style="padding-top:50pt;">
		<div class="row align-items-center h-100">
			<div class="col-sm-9 col-md-7 col-lg-6 col-xl-5 mx-auto">
				<div class="jumbotron bg-white">
					<h3 class="text-center">Painel Administrativo v2.0</h3>
					<hr class="mb-4">
					<form action="{{ route('login') }}" method="post">
						@csrf
						<div class="input-group mb-1">
							<span class="input-group-prepend">
								<div class="input-group-text bg-transparent">
									<i class="fas fa-user"></i>
								</div>
							</span>
							<input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="E-mail" value="{{ old('email') }}" required>
							@if ($errors->has('email'))
								<div class="invalid-feedback">
									{{ $errors->first('email') }}
								</div>
							@endif
						</div>
						<div class="input-group mb-2">
							<span class="input-group-prepend">
								<div class="input-group-text bg-transparent">
									<i class="fas fa-lock"></i>
								</div>
							</span>
							<input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Senha" value="" required>
							@if ($errors->has('password'))
								<div class="invalid-feedback">
									{{ $errors->first('password') }}
								</div>
							@endif
						</div>
						<div class="row">
							<div class="col-md-6">
								<label class="pull-left checkbox-inline mt-2">
									<input type="checkbox" name="remember"> Permanecer conectado
								</label>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">
									<i class="fas fa-sign-in-alt"></i>
										Entrar
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<p class="text-light text-center">
					Created by <a href="http://github.com/roberto0arruda">Roberto Arruda</a><br>
					&copy; Copyright <a class="text-primary" href="https://flexpeak.com.br/site" target="_blank">FlexPeak</a> {{ date('Y') }} - Todos os direitos reservados.
				</p>
			</div>
		</div>
	</div>
@endauth
@stop
