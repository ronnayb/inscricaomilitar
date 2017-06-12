class InscritosController {

	constructor(){
		let $ = document.querySelector.bind(document);

		this._unidadeView = new ComboView($('#unidade'));
		this._cursoView   = new ComboView($('#curso'));
		this._alunosView  = new InscritosTrableView($('#lista_alunos')) ;

		this._unidadeView.update([]);
		this._cursoView.update([]);
		this._alunosView.update([]);

	}

	getSeletivo(){
		return document.querySelector('#seletivo').value;
	}

	getUnidade(){
		return document.querySelector('#unidade').value;
	}

	getPolo(){
		return document.querySelector('#polo').value;
	}

	polochange(event){
		$.ajax({
			url : '/unidades/polo/' + event.target.value,
			type: 'get',
			context: this,
			dataType: 'json'
			})
			.done(function(data) {
				this._unidadeView.update(data)
				this._cursoView.update([]);

			})
			.fail(function() {
				
			})
			.always(function() {
				
			});
		
	}

	unidadeChange(event){
		$.ajax({
			url : '/cursos/unidade/' + (event.target.value?event.target.value:0) + '/seletivo/'+this.getSeletivo(),
			type: 'get',
			context: this,
			dataType: 'json'
			})
			.done(function(data) {
				this._cursoView.update(data);

			})
			.fail(function() {
				
			})
			.always(function() {
				
			});
	}

	submit(event){
		event.preventDefault();
		let where = '?';
		
		for(let i = 0; i < event.target.parentNode.elements.length; i++){
			if(event.target.parentNode.elements[i].value)
				where = where.concat(event.target.parentNode.elements[i].name+'='+event.target.parentNode.elements[i].value + '&');
		}
		console.log(where);
		$.ajax({
			url: '/inscricao/inscritos/'+ where,
			type: 'get',
			context: this,
			dataType: 'json'
		})
		.done(function(data) {
			this._alunosView.update(data);
		})
		.fail(function(err) {
			console.log(err);
		})
		.always(function() {
			
		});
		
	}

	_where(){
	}

}