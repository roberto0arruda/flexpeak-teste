<template>
	<div class="bg-white">
		<professores></professores>

	</div>
</template>

<script>
import professores from './tables/professores'
// import cursos from './tables/cursos'
// import alunos from './tables/alunos'

export default {
	props: {
		ondeClicou: String
	},
	data() {
		return {

		}
	},
	components: {
		professores
		// ,
		// cursos,
		// alunos
	},

}
</script>
