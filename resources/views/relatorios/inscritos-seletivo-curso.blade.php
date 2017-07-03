@extends('layouts.relatorio')

@section('content')

        <div class="header">
            <div class="images">
                <img src="{{ asset('images/brasao-tocantins150x150.png') }}" alt="">
            </div>
            <h3>Relação de Inscritos por curso</h3>
            <table class="table">
                <tr>
                    <td class="descricao">Processo Seletivo:</td>
                    <td>{{ $seletivo->seletivo }}</td>
                </tr>
                <tr>
                    <td class="descricao">Curso:</td>
                    <td>{{ $curso->curso }}</td>
                </tr>
                <tr>
                    <td class="descricao">Total de Inscritos:</td>
                    <td>{{ $inscritos->count() }}</td>
                </tr>
            </table>
        </div>

        <div class="content">
            <table class="table">
                <thead>
                    <th></th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </thead>
                <tbody>
                    @foreach($inscritos as $key => $inscrito)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $inscrito->nome }}</td>
                        <td>{{ $inscrito->cpf }}</td>
                        <td>{{ $inscrito->email }}</td>
                        <td>{{ $inscrito->nome }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
@endsection 
        
    
