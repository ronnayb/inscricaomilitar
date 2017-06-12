@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('message'))
        <div class="alert alert-info" role="alert">{{ session('message') }}</div>
    @endif
    @if(session('message_delete'))
        <div class="alert alert-danger" role="alert">{{ session('message_delete') }}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $seletivo->seletivo }}</h1>
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ações <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('seletivos.addCursos',$seletivo->id) }}">Adicionar/Remover Cursos</a></li>
                            <li><a href="{{ route('inscricao.list',$seletivo->id) }}">Inscritos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-5">
                        <table class="table">
                            <tr>
                                <td>Perído de Inscrição</td>
                                <td>
                                    {{ $seletivo->data_inicio }} {{ substr($seletivo->hora_inicio_inscricao,0,5) }}  
                                        a 
                                    {{ $seletivo->data_fim }} {{ substr($seletivo->hora_fim_inscricao,0,5) }} 
                                </td>
                            </tr>
                            <tr>
                                <td>Ano</td>
                                <td>{{ $seletivo->ano }}</td>
                            </tr>
                            <tr>
                                <td>Edição</td>
                                <td>{{ $seletivo->edicao }}</td>
                            </tr>
                            <tr>
                                <td>Situação</td>
                                <td>{{ $seletivo->ativo? 'Ativo':'Inativo' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-7" style="text-align:center">
                        
                    </div>
                    <div class="col-md-12">
                        <h4>Cursos Ofertados</h4>
                        <table class="table">
                            <thead>
                                <th>Curso</th>
                                <th>Polo</th>
                                <th>Unidade</th>
                                <th>Turno</th>
                                <th>Inscritos</th>
                            </thead>
                            <tbody>
                            @foreach($seletivo->cursos as $curso)
                                <tr>
                                    <td>{{ $curso->curso }}</td>
                                    <td>{{ $curso->unidade->polo->polo }}</td>
                                    <td>{{ $curso->unidade->unidade }}</td>
                                    <td>{{ $curso->turno }}</td>
                                    <td class="qtd-inscritos" style="text-align:center">{{ $curso->inscricoess($seletivo->id) }}</td>
                                    <td><a href="{{ route('inscricao.relatorio',[$seletivo->id,$curso->id]) }}" class="btn btn-primary btn-xs" target="_blank">Relação de Inscritos</a></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" style="text-align:right">Total</td>
                                <td class="total" style="text-align:center">0</td>
                            </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('seletivos.list') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
 ( () => {
   let qtd = [];
   let qtdInscritos = document.querySelectorAll('.qtd-inscritos');
   qtdInscritos.forEach( (item) => qtd.push(parseInt(item.innerHTML)) );
   document.querySelector('.total').innerHTML = qtd.reduce(  (total, num) => {return total+num} );
 })();
</script>
@endsection