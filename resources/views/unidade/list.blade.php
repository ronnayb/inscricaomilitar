@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('message'))
    <div class="alert alert-info" role="alert">{{ session('message') }}</div>
    @endif
    @if(session('message_delete'))
        <div class="alert alert-danger" role="alert">{{ session('message_delete') }}</div>
    @endif


    <div class="row">
        <div class="col-md-12">
            <h1>Unidades</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('unidades.new') }}" class="btn btn-sm btn-default">Novo</a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Unidade</th>
                            <th>Polo</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                        @foreach($unidades as $unidade)
                            <tr>
                                <td>{{ $unidade->unidade }}</td>
                                <td>{{ $unidade->polo->polo }}</td>
                                <td style="width:200px">
                                    <a href="{{ route('unidades.edit',$unidade->id) }}" class="btn btn-xs btn-primary">Editar</a>
                                    <form method="post" action="{{ route('unidades.delete',$unidade->id) }}" style="display: inline;">
                                        {!! method_field('DELETE') !!}
                                        {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-xs btn-danger deletar">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        let btns = document.querySelectorAll('.deletar');
        btns.forEach(function(btn){
            btn.addEventListener('click',function(event){
                event.preventDefault();
                if(confirm('Deseja excluir a unidade?')){
                    event.target.parentNode.submit();
                }
            });
        });
    </script>
@endsection