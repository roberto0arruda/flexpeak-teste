<template>
	<div class="bg-white">
		{{professores}}
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th v-for="(item, index) in table" :key="index">{{ indice }}</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in table" :key="index">
					<td>{{ item.id }}</td>
					<td>{{ item.nome }}</td>
					<td>- - -</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>

export default {
	data() {
		return {
			table: [],
			url: ''
		}
	},
	computed: {
		getTable: function () {
			return this.loadTables('cursos')
		}
	},
	methods: {
		loadTables(url) {
			axios.get('/api/'+url)
				.then(response => this.table = response.data)
		}
	},
}
</script>
