@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $seletivo->seletivo }}</h1>
            <div class="panel panel-default">
                <div class="panel-body">

                    <h4>Cursos Oferecidos</h4>

                    <form method="post" action="{{ route('seletivos.storeCourse') }}">
                    <input type="hidden" name="seletivo_id" value="{{$seletivo->id}}">
                    {!! csrf_field() !!}
                    @foreach($polos  as $polo)
                        <ul>
                            <li>{{$polo->polo}}</li>
                            <ul>
                               @foreach($polo->unidades as $unidade)
                                    <li>{{ $unidade->unidade }}</li>
                                    <ul>
                                        @foreach($unidade->cursos as $curso)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="curso_id[]" value="{{ $curso->id }}" {{$curso->checked}}>{{$curso->curso}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </ul>
                               @endforeach
                            </ul>
                        </ul>
                    @endforeach
                    <button style="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

@endsection