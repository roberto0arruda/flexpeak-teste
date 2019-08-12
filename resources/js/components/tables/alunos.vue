<template>
	<div class="bg-white">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Professor</th>
					<th>Curso</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in alunos" :key="index">
					<td>{{ item.id }}</td>
					<td>{{ item.nome }}</td>
					<td>{{ item.nome }}</td>
					<td>{{ item.nome }}</td>
					<td>- - -</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>

export default {
	created() {
		this.$store.dispatch('loadAlunos')
	},

	computed: {
		alunos() {
			return this.$store.state.alunos
		}
	},
}
</script>
