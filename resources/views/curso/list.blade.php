@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @if (session('message'))
        <div class="alert alert-info" role="alert">{{ session('message') }}</div>
        @endif
        @if(session('message_delete'))
            <div class="alert alert-danger" role="alert">{{ session('message_delete') }}</div>
        @endif

        <div class="col-md-12">
            <h1>Cursos</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('cursos.new') }}" class="btn btn-sm btn-default">Novo</a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Curso</th>
                            <th>Nível</th>
                            <th>Turno</th>
                            <th>Vagas</th>
                            <th>Unidade/Polo</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                        @foreach($cursos as $curso)
                            <tr>
                                <td>{{ $curso->curso }}</td>
                                <td>{{ $curso->nivel->nivel }}</td>
                                <td>{{ $curso->turno }}</td>
                                <td>{{ $curso->vagas }}</td>
                                <td>{{ $curso->unidade->unidade }}</td>
                                <td style="width:200px">
                                    <a href="{{ route('cursos.edit',$curso->id) }}" class="btn btn-xs btn-primary">Editar</a>
                                    <form method="post" action="{{ route('cursos.delete',$curso->id) }}" style="display: inline;">
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
                if(confirm('Deseja excluir o curso?')){
                    event.target.parentNode.submit();
                }
            });
        });
    </script>
@endsection