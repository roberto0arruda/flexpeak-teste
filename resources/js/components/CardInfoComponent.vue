<template>
	<div id="card">
		<div class="row mb-3">
			<div class="col-md-4 mb-2" v-for="(card, index) in cards" :key="index" @click="$emit('evento-card-click',card.title)">
				<div class="card">
					<div class="card-content">
						<div class="card-body">
							<div class="media d-flex">
								<div class="align-self-center">
									<i v-bind:class="card.icon"></i>
								</div>
								<div class="media-body text-right">
									<h3>{{ card.total }}</h3>
									<span>{{ card.title }}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			cards: [
				{
					total: '-',
					title: 'Professores',
					icon: 'fas fa-chalkboard-teacher fa-3x'
				},
				{
					total: '-',
					title: 'Cursos',
					icon: 'fas fa-graduation-cap fa-3x'
				},
				{
					total: '-',
					title: 'Alunos',
					icon: 'fas fa-user-graduate fa-3x'
				}
			]
		}
	}
}
</script>

<style lang="css">
	#card {
		padding-top: 10px;
	}
</style>
