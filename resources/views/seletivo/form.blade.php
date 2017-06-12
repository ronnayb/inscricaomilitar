@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $title }}</h1>
            @if(isset($seletivo))
                <form method="post" action="{{ route('seletivos.update',$seletivo->id) }}" class="form-horizontal">
                {!! method_field('PUT') !!}
            @else
                <form method="post" action="{{ route('seletivos.save') }}" class="form-horizontal">
            @endif
                {!! csrf_field() !!}
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Início Inscrição</label>
                            <div class="col-sm-2">
                                <input type="text" id="inicio_inscricao" class="form-control" name="inicio_inscricao" required value="{{ $seletivo->inicio_inscricao or old('inicio_inscricao') }}">
                            </div>
                            <label class="col-sm-2 control-label">Hora Início</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="hora_inicio_inscricao" name="hora_inicio_inscricao" required value="{{ $seletivo->hora_inicio_inscricao or old('hora_inicio_inscricao') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fim Inscrição</label>
                            <div class="col-sm-2">
                                <input type="text" id="fim_inscricao" class="form-control" name="fim_inscricao" required value="{{ $seletivo->fim_inscricao or old('fim_inscricao') }}">
                            </div>
                            <label class="col-sm-2 control-label">Hora Fim</label>
                            <div class="col-sm-2">
                                <input type="text" id="hora_fim_inscricao" class="form-control" name="hora_fim_inscricao" required value="{{ $seletivo->hora_fim_inscricao or old('hora_fim_inscricao') }}">
                            </div>
                        </div>

                    </div>


                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ route('seletivos.list') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script src="{{ asset('/js/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/js/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('/js/jquery.inputmask.extensions.js') }}"></script>
    <script>
        $(function(){
            $("#inicio_inscricao").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            $("#fim_inscricao").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

            $("#hora_inicio_inscricao").inputmask("99:99");
            $("#hora_fim_inscricao").inputmask("99:99");
        });
    </script>
@endsection