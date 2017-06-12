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
            <h1>Processos seletivos</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('seletivos.new') }}" class="btn btn-sm btn-default">Novo</a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Seletivo</th>
                            <th>Período de Inscrição</th>
                            <th>Ano</th>
                            <th>Edição</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                        @foreach($seletivos as $seletivo)
                            <tr>
                                <td>{{ $seletivo->seletivo }}</td>
                                <td>{{ $seletivo->data_inicio }} {{ substr($seletivo->hora_inicio_inscricao,0,5) }}  
                                    a 
                                    {{ $seletivo->data_fim }} {{ substr($seletivo->hora_fim_inscricao,0,5) }} </td>
                                <td>{{ $seletivo->ano }}</td>
                                <td>{{ $seletivo->edicao }}</td>
                               <td>{{ $seletivo->ativo ? 'Ativo':'Inativo' }}</td>
                                <td style="width:300px">
                                    <a href="{{ route('seletivos.edit',$seletivo->id) }}" class="btn btn-xs btn-primary">Editar</a>
                                    <a href="{{ route('seletivos.show',$seletivo->id) }}" class="btn btn-xs btn-primary">Visualizar</a>
                                    <form method="post" action="{{ route('seletivos.delete',$seletivo->id) }}" style="display: inline;">
                                        {!! method_field('DELETE') !!}
                                        {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-xs btn-danger deletar">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        let btns = document.querySelectorAll('.deletar');
        btns.forEach(function(btn){
            btn.addEventListener('click',function(event){
                event.preventDefault();
                if(confirm('Deseja excluir o processo seletivo?')){
                    event.target.parentNode.submit();
                }
            });
        });
    </script>
@endsection