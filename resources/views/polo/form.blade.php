@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $title }}</h1>
            @if(isset($polo))
                <form method="post" action="{{ route('polos.update',$polo->id) }}" class="form-horizontal">
                {!! method_field('PUT') !!}
            @else
                <form method="post" action="{{ route('polos.save') }}" class="form-horizontal">
            @endif
                {!! csrf_field() !!}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="polo" required value="{{ $polo->polo or old('polo') }}">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ route('polos.list') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
