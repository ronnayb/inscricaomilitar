@extends('layouts.public')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>Confirmação de Inscrição</h1>
            <div class="panel panel-default">
                

                <div class="panel-body">
                    <div class="col-md-6">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Inscrição:</td>
                                    <td>{{ $inscricao->id }}</td>
                                </tr>
                                <tr>
                                    <td>Nome:</td>
                                    <td>{{ $inscricao->nome }}</td>
                                </tr>
                                <tr>
                                    <td>Data de Nascimento:</td>
                                    <td>{{ $inscricao->data_nascimento }}</td>
                                </tr>
                                <tr>
                                    <td>CPF:</td>
                                    <td>{{ $inscricao->cpf }}</td>
                                </tr>
                                <tr>
                                    <td>RG:</td>
                                    <td>{{ $inscricao->rg }} - {{ $inscricao->emissor_rg }}</td>
                                </tr>
                                <tr>
                                    <td>Telefones:</td>
                                    <td>{{ $inscricao->celular }} | {{ $inscricao->outro_telefone }}</td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td>{{ $inscricao->email }}</td>
                                </tr>
                                <tr>
                                    <td>Responsável:</td>
                                    <td>{{ $inscricao->responsavel }}</td>
                                </tr>
                                <tr>
                                    <td>Oriundo de:</td>
                                    <td>Escola {{ $inscricao->estuda_em }}</td>
                                </tr>
                                <tr>
                                    <td>Unidade:</td>
                                    <td>
                                        {{ $inscricao->curso->unidade->unidade }} Cidade:  
                                        {{ $inscricao->curso->unidade->polo->polo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Curso:</td>
                                    <td>{{ $inscricao->curso->curso }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if (!Auth::guest())
            <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
            @endif
            <a href="{{ url('/')}}">Pagina Inicial</a>
        </div>
    </div>
</div>
@endsection