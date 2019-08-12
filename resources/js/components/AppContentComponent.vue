<template>
	<div class="container-fluid mb-3">
		<card-info v-on:evento-card-click="cardClicked"></card-info>

		<div class="row" v-if="!showTable">
			<div class="col-12">
				<div class="card">
					<div class="card-content">
						<div class="card-body">
							<div class="m-4 text-center">
								<p>
									<i class="far fa-smile-beam fa-5x"></i>
								</p>
								<h4>Olá! Seja bem-vindo.</h4>
								Aqui você poderá criar, visualizar, alterar e excluir professores, cursos e alunos.<br />
								Basta acessar as opções no menu principal.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<tabela-dados v-else :ondeClicou="tabela"></tabela-dados>
	</div>
</template>

<script>
import cardInfo from './CardInfoComponent'
import tabelaDados from './TableComponent'

export default {

	data() {
		return {
			showTable: false,
			tabela: ''
		}
	},

	methods: {
		cardClicked(card) {
			this.tabela = card
			this.showTable ? this.showTable = false : this.showTable = true
		}
	},
}
</script>
