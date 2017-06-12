@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Cadastrar Unidade</h1>
            @if(isset($unidade))
                <form method="post" action="{{ route('unidades.update',$unidade->id) }}" class="form-horizontal">
                {!! method_field('PUT') !!}
            @else
                <form method="post" action="{{ route('unidades.save') }}" class="form-horizontal">
            @endif
                {!! csrf_field() !!}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="unidade" required value="{{ $unidade->unidade or old('unidade') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Polo</label>
                            <div class="col-sm-10">
                                <select name="polo_id" id="polo" class="form-control" required>
                                    <option value="">Selecione</option>
                                    @foreach($polos as $polo)
                                    <option value="{{ $polo->id }}" {{isset($unidade) && $polo->id == $unidade->polo_id? 'selected':''}} >{{ $polo->polo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ route('unidades.list') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
