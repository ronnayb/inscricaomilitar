
(function(){
	let polo = document.querySelector('#polo');
	let seletivo = document.querySelector('#seletivo');
	let unidade = document.querySelector('#unidade');

	polo.addEventListener('change',function(event){
		$.ajax({
			type: 'get',
			url : '/unidades/polo/' + event.target.value,
			success:function(data){
				let polo = document.querySelector('#polo');
				buildCompo(data,unidade);
			}
		});
	});

	unidade.addEventListener('change',function(event){
		$.ajax({
			type: 'get',
			url : '/cursos/unidade/' + (event.target.value?event.target.value:0) + '/seletivo/'+seletivo.value,
			success:function(data){
				let unidade = document.querySelector('#unidade');
				buildCompo(data,curso);
			}
		});
	});


})()