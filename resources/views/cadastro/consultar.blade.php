@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('inscricao.search') }}" class="form-horizontal" role="form">
            {!! csrf_field() !!}
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group">
                         
                            <label for="cpf" class="col-sm-2 control-label col-md-offset-2">
                                CPF
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="cpf" name="cpf" />
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <button class="btn btn-primary">Proseguir</button>
                        <a href="{{url('/')}}" class="btn btn-default">Cancelar</a>
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
            $("#cpf").inputmask("999.999.999-99");
        });
    </script>
@endsection