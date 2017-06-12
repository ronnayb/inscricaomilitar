@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('message'))
        <div class="alert alert-danger" role="alert">{{ session('message') }}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <h1>Processos seletivos</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Seletivo</th>
                            <th>Período de Inscrição</th>
                            <th>Ano</th>
                            <th>Edição</th>
                            <th></th>
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
                                <td>
                                  <a href="{{ route('inscricao.consultar',$seletivo->id) }}" class="btn btn-primary">Inscrição</a>
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

@endsection