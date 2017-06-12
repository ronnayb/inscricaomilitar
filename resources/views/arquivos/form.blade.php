@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Cadastrar Unidade</h1>
            @if(isset($arquivo))
                <form method="post" action="{{ route('unidades.update',$unidade->id) }}" class="form-horizontal">
                {!! method_field('PUT') !!}
            @else
                <form method="post" action="{{ route('seletivos.arquivos-save') }}" class="form-horizontal">
            @endif
                {!! csrf_field() !!}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descrição</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="descricao" required value="{{ $arquivo->descricao or old('descricao') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Arquivo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="arquivo" required>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
