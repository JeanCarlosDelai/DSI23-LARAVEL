@extends('base')

@section('title', 'Usuarios')

@section('content')

<form action="{{ route('user.login')}}" method="post">

    @csrf

    <input type="text" name="name" placeholder="Username">

    <br>

    <input type="password" name="password" placeholder="Senha">

    <br>
    <br>

    <input type="submit" value="gravar" class="mt-2">

</form>

@endsection