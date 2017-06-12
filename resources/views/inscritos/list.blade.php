@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Inscritos {{$seletivo->seletivo}}</h1>
            <input type="hidden" id="seletivo" value="{{ $seletivo->id }}">
            <form action="">
                <input type="hidden" name="where[seletivo_id]" value="{{ $seletivo->id }}">
                 <div class="panel panel-default">

                <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="polo">Polo</label>
                                <select id="polo" name="where[polos.id]" class="form-control" required onchange="inscritosController.polochange(event)">
                                    <option value="">Selecione</option>
                                    @foreach($polos as $polo)
                                    <option value="{{ $polo->id }}">{{ $polo->polo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="unidade">Unidade</label>
                                <select id="unidade" name="where[unidades.id]" class="form-control" required onchange="inscritosController.unidadeChange(event)">
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="curso">Cusro</label>
                                <select id="curso" name="where[cursos.id]" class="form-control" required>
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <button type="submit" class="btn btn-default" onclick="inscritosController.submit(event)">Buscar</button>
            <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
            </form>
            <div id="lista_alunos">
                    
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('/js/InscritosController.js') }}"></script>
    <script src="{{ asset('/js/View.js') }}"></script>
    <script src="{{ asset('/js/ComboView.js') }}"></script>
    <script src="{{ asset('/js/InscritosTrableView.js') }}"></script>
    <script>
        let inscritosController = new InscritosController();
    </script>
@endsection
