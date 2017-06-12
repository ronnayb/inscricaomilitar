@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('cadastros.save') }}">
                {!! csrf_field() !!}
                <div class="panel panel-default">

                    <div class="panel-body">

                        <h4>Informações Pessoais</h4>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" required value="{{ $cadastro->cpf or old('cpf') }}" 
                                {{ $cadastro->cpf or old('cpf')? 'readonly':'' }}/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="data_nascimento">Data de Nascimento</label>
                                <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" required  value="{{ $cadastro->data_nascimento or old('data_nascimento') }}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" required value="{{ $cadastro->nome or old('nome') }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" required value="{{ $cadastro->rg or old('rg') }}"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="emissor_rg">Órgão Emissor</label>
                                <input type="text" class="form-control" id="emissor_rg" name="emissor_rg" required value="{{ $cadastro->emissor_rg or old('emissor_rg') }}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="responsavel">Nome do Responsável</label>
                                <input type="text" class="form-control" id="responsavel" name="responsavel" value="{{ $cadastro->responsavel or old('responsavel') }}"/>
                            </div>
                        </div>

                        <h4>Informações de Contato e Endereço</h4>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" required value="{{ $cadastro->celular or old('celular') }}"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="outro_telefone">Telefone</label>
                                <input type="text" class="form-control" id="outro_telefone" name="outro_telefone" value="{{ $cadastro->outro_telefone or old('outro_telefone') }}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $cadastro->email or old('email') }}"/>
                            </div>
                        </div>

                        <h4>Informações do Curso</h4>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cpf">Seletivo</label>
                                <select id="seletivo" name="seletivo_id" class="form-control" required>
                                    @foreach($seletivos as $seletivo)
                                    <option value="{{ $seletivo->id }}">{{ $seletivo->seletivo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                         <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cpf">Polo</label>
                                <select id="polo" class="form-control" required onchange="inscricaoController.polochange(event)">
                                    <option value="">Selecione</option>
                                    @foreach($polos as $polo)
                                    <option value="{{ $polo->id }}">{{ $polo->polo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="cpf">Unidade</label>
                                <select id="unidade" class="form-control" required onchange="inscricaoController.unidadeChange(event)">
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="cpf">Cusro</label>
                                <select id="curso" name="curso_id" class="form-control" required>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cpf">Atualmente estuda em</label>
                                <select name="estuda_em" class="form-control" required>
                                    <option value="">Selecione</option>
                                    <option value="PUBLICA">Escola Pública</option>
                                    <option value="PARTICULAR">Escola Particular</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <div class="panel-footer">
                        <button class="btn btn-primary">Confirmar</button>
                        <a href="{{url('/')}}" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p>Bunscando Informações...</p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection


@section('script')
    <script src="{{ asset('/js/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/js/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('/js/jquery.inputmask.extensions.js') }}"></script>

    <script src="{{ asset('/js/View.js') }}"></script>
    <script src="{{ asset('/js/ComboView.js') }}"></script>
    <script src="{{ asset('/js/InscritosTrableView.js') }}"></script>
    <script src="{{ asset('/js/InscricaoController.js') }}"></script>
    <script>
        $("#data_nascimento").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $("#cpf").inputmask("999.999.999-99");
        $("#celular").inputmask("(99)99999-9999");
        $("#outro_telefone").inputmask("(99)99999-9999");

        let inscricaoController = new InscricaoController();

    </script>
@endsection