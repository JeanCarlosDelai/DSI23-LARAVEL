{{-- resources/views/estoque/apagar.blade.php --}}
@extends('base')
@section('title', 'Estoque')

@section('content')
<div class="rounded-md bg-yellow-50 p-4 text-sm text-yellow-500">👌Tem certeza que deseja apagar?</div>

<p>Você está prestes a apagar {{$estoque['nome']}}.</p>

<form action="{{route('estoque.apagar', $estoque['id'])}}
"method="post">
    @method('delete')
    @csrf
    <button type="submit"class="rounded-lg border border-red-500 bg-red-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-red-700 hover:bg-red-700 focus:ring focus:ring-red-200 disabled:cursor-not-allowed disabled:border-red-300 disabled:bg-red-300">Apaga isso logo aí </button>
 </form>

@endsection