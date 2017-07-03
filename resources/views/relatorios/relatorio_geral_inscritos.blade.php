@extends('layouts.relatorio')

@section('content')

        <div class="header">
            <div class="images">
                <img src="{{ asset('images/brasao-tocantins150x150.png') }}" alt="">
            </div>
            <h3>Relação de Inscritos</h3>
            <table class="table">
                
                            <tr>
                                <td class="descricao">Processo Seletivo:</td>
                                <td>
                                    Processo Seletivo Colégio Militar
                                    {{ $seletivo['seletivo']['ano'] }}/{{ $seletivo['seletivo']['edicao'] }}
                                </td>
                            </tr>
                            <tr>
                                <td class="descricao">Total de Inscritos:</td>
                                <td>{{ $seletivo['seletivo']['total_inscritos'] }}</td>
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
                    <th>Curo</th>
                    <th>Turno</th>
                    <th>Unidade</th>
                    <th>Polo</th>
                </thead>
                <tbody>
                    @foreach($seletivo['seletivo']['inscritos'] as $key => $inscrito)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $inscrito->nome }}</td>
                        <td>{{ $inscrito->cpf }}</td>
                        <td>{{ $inscrito->email }}</td>
                        <td>{{ $inscrito->celular }} | {{ $inscrito->outro_telefone }}</td>
                        <td>{{ $inscrito->curso }}</td>
                        <td>{{ $inscrito->turno }}</td>
                        <td>{{ $inscrito->unidade }}</td>
                        <td>{{ $inscrito->polo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
@endsection 
        