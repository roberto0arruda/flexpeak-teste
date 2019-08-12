<template>
	<div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="">
				<img src="" alt="">
			</a>
			<a class="navbar-brand" href="">SITE V2.0</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav ml-auto mr-auto text-uppercase text-weight-bold">
					<li class="nav-item">
						<a class="nav-link" href="">Início</a>
					</li>
				</ul>
				<ul class="navbar-nav mb-3 mb-lg-0">
					<li class="nav-item">
						<a class="btn btn-primary" :href="rota"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<i class="fas fa-sign-out-alt"></i>
							Desconectar
						</a>
						<form id="logout-form" :action="rota" method="POST" style="display: none;" v-html="csrf">
						</form>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</template>

<script>
export default {
	props: {
		rota : {},
		csrf: {}
	}
}
</script>
