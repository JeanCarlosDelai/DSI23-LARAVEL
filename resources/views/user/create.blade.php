@extends('base')

@section('title', 'Usuarios')

@section('content')
<p>Página de usuários</p>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<form action="{{ route('user.create')}}" method="post">

    @csrf

    <input type="text" name="name" placeholder="Username">

    <br>

    <input type="password" name="password" placeholder="Senha">

    <br>

    <input type="email" name="email" placeholder="email">

    <br>

    <input class="rounded-full border border-primary-500 bg-primary-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-primary-700 hover:bg-primary-700 focus:ring focus:ring-primary-200 disabled:cursor-not-allowed disabled:border-primary-300 disabled:bg-primary-300" type="submit" value="gravar" class="mt-2">

</form>

@endsection
