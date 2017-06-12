class InscritosTrableView extends View{

	constructor(element){
		super(element);
	}


	_template(model){
		console.log(model);
		return `
			<table class="table">
    			<thead>
    				<th>Nome</th>
    				<th>CPF</th>
    				<th>E-mail</th>
    				<th>Celular</th>
    				<th>Responsável</th>
        			<th>Estuda em</th>
        			<th>Data de inscricão</th>
        			<th></th>
    			</thead>
    			<tbody>
        			${model.map( n => 
        				`
							<tr>
								<td>${n.nome}</td>
								<td>${n.cpf}</td>
								<td>${n.email}</td>
								<td>${n.celular}</td>
								<td>${n.responsavel}</td>
								<td>${n.estuda_em}</td>
								<td>${n.created_at}</td>
								<td>
									<a href="${n.uri_alterar}" class="btn btn-primary btn-xs">Editar</a>
									<a href="${n.uri_visualizar}" class="btn btn-primary btn-xs">Visualizar</a>
								</td>
							</tr>
        				`
        			).join('')}
					<tr>
						<td colspan="7" style="text-align:right">Total</td>
						<td>${model.length}</td>
					</tr>
    			</tbody>
			</table>
		`;
	}
}