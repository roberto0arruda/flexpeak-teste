/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import store from './vuex/store'

window.Vue = require('vue');

const swal = window.swal = require('sweetalert2');
const toast = window.toast = swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 3000
})

window.DataTable = function(target = [], order = 0) {
	var table = $('#data-table');

	table.DataTable({
		columnDefs: [{
			orderable: false,
			targets: target
		}],
		order: [[
			order,
			'asc'
		]],
		pagingType: 'first_last_numbers',
		lengthMenu: [
			[5, 10, 20, 50 , -1],
			[5, 10, 20, 50, 'Todos']
		],
		ageLength: 20,
		language: {
			processing:		'Processando...',
			search:			'Pesquisar por:',
			lengthMenu:		'Mostrar _MENU_ registros',
			info:			'Mostrando de _START_ até _END_ de _TOTAL_ registros',
			infoEmpty:		'Mostrando 0 até 0 de 0 registros',
			infoFiltered:	'(Filtrados de _MAX_ registros)',
			infoPostFix:	'',
			loadingRecords:	'Carregando...',
			zeroRecords:	'Nenhum registro encontrado',
			emptyTable:		'Nenhum registro para mostrar',
			paginate: {
				previous:	'Anterior',
				next:		'Próximo',
				first:		'Primeiro',
				last:		'Último'
			},
			aria: {
				sortAscending:  ': Ordenar colunas de forma ascendente',
				sortDescending: ': Ordenar colunas de forma descendente'
			}
		}
	});
	// fixes
	table.parent().addClass('table-responsive');
}

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('app-content', require('./components/AppContentComponent.vue').default);
Vue.component('app-nav-bar', require('./components/NavBarComponent.vue').default);
Vue.component('card-info', require('./components/CardInfoComponent.vue').default);
Vue.component('tabela-dados', require('./components/TableComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	store,
    el: '#app',
});
