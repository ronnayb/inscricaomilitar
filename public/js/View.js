class View{
	constructor(element) {
		this._element = element;
	}

	_template(){
		throw new Error('O elemento precisa ser implementado');
	}

	update(model){
		this._element.innerHTML = this._template(model);
	}
}