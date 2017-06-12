class InscricaoController{

	constructor(){
		let $ = document.querySelector.bind(document);
		this._unidadeView = new ComboView($('#unidade'));
		this._cursoView   = new ComboView($('#curso'));
		if(!this.getPolo()){
			this._unidadeView.update([]);
			this._cursoView.update([]);
		}
	}

	getSeletivo(){
		return document.querySelector('#seletivo').value;
	}

	getPolo(){
		return document.querySelector('#polo').value;
	}

	getUnidade(){
		return document.querySelector('#unidade').value;
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

}