<template>
	<div class="bg-white">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Criado em</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in professores" :key="index">
					<td>{{ item.id }}</td>
					<td>{{ item.nome }}</td>
					<td>{{ item.created_at }}</td>
					<td>----</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>

export default {
	created() {
		axios.get('/api/professores')
				.then(response => {
					this.professores = response.data;
				})
	},
	data() {
		return { 'professores' : ''}
	}
}
</script>
