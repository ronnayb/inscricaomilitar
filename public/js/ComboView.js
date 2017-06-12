class ComboView extends View {

	constructor(element){
		super(element);
	}

	_template(model){
		return `
				
					<option value="">Selecione</option>
					${model.map( n => `
						<option value="${n.id}">${n[this._element.id]} ${n['turno'] ? ' - ' + n['turno']:''}</option>
					`).join('')}
				`;
	}

}