@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $title }}</h1>
            @if(isset($curso))
                <form method="post" action="{{ route('cursos.update',$curso->id) }}" class="form-horizontal">
                {!! method_field('PUT') !!}
            @else
                <form method="post" action="{{ route('cursos.save') }}" class="form-horizontal">
            @endif
                {!! csrf_field() !!}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Curso</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="curso" required value="{{ $curso->curso or old('curso') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Unidade</label>
                            <div class="col-sm-10">
                                <select name="unidade_id" id="unidade" class="form-control" required>
                                    <option value="">Selecione</option>
                                    @foreach($unidades as $unidade)
                                    <option value="{{ $unidade->id }}" {{ isset($curso) && $curso->unidade_id == $unidade->id ? 'selected':'' }}>{{ $unidade->unidade }} / Polo:{{ $unidade->polo->polo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nível</label>
                            <div class="col-sm-10">
                                <select name="nivel_id" id="nivel" class="form-control" required>
                                    <option value="">Selecione</option>
                                    @foreach($niveis as $nivel)
                                    <option value="{{$nivel->id}}" {{isset($curso) && $curso->nivel_id == $nivel->id ? 'selected':''}}>{{$nivel->nivel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Turno</label>
                            <div class="col-sm-10">
                                <select name="turno" id="turno" class="form-control" required>
                                    <option value="">Selecione</option>
                                    @foreach($turnos as $turno)
                                    <option value="{{$turno}}" {{isset($curso) && $curso->turno == $turno ? 'selected':''}}>{{$turno}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ route('cursos.list') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
