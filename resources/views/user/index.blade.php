
    @extends('base')

    @section('title', 'Usuarios')

    @section('content')
    <p>Página de usuários</p>

    <a href = "{{ route('user.create')}}" >Adicionar Usuário</a>

    @endsection
    