@extends('layout')

@section('titulo','titulo por defecto')

@section('contenido')

    @if(count($borrowedBooks)>0)
        @foreach()

        @endforeach

    @else
        <h1> The Customer Has Not Any Borrowed Books</h1>
    @endif
@endsection