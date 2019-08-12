import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		professores: [],
		cursos: [],
		alunos: []
	},

	mutations: {
		LOAD_PROFESSORES (state, data) {
			state.professores = data
		},
		LOAD_CURSOS (state, data) {
			state.cursos = data
		},
		LOAD_ALUNOS (state, data) {
			state.alunos = data
		}
	},

	actions: {
		loadProfessores (context) {
			axios.get('/api/professores')
				.then(response => {
					context.commit('LOAD_PROFESSORES', response.data)
				})
		},
		loadCursos (context) {
			axios.get('/api/cursos')
				.then(response => {
					context.commit('LOAD_CURSOS', response.data)
				})
		},
		loadAlunos (context) {
			axios.get('/api/alunos')
				.then(response => {
					context.commit('LOAD_ALUNOS', response.data)
				})
		},

	}
})
