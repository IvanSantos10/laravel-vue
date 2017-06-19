@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Lista de bancos</h4>
            <a href="{{route('admin.banks.create')}}" class="btn waves-effect">Novo banco</a>
            <table class="bordered striped highlight responsive-table z-depth-5">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banks as $bank)
                    <tr>
                        <td>{{ $bank->id }}</td>
                        <td>{{ $bank->name }}</td>
                        <td>
                            <a href="{{route('admin.banks.edit', ['bank' => $bank->id])}}">Editar</a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById({{"\"form-$bank->id\""}}).submit();gg">Excluir</a>
                            {{ Form::open(['route' => ['admin.banks.destroy', 'bank' => $bank->id], 'id' => 'form-'.$bank->id, 'method' => 'DELETE']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $banks->links() !!}
        </div>
    </div>
@endsection