@extends('layout')

@section('titulo','titulo por defecto')


@section('contenido')
    <a href="./gestionarCustomers">Go Back</a>
    <a href="./index">Go To Main Page</a>

    @if(count($sales)>0)

    @else
        <h1>No Se Han Encontrado Ventas Asociadas A Este Usuario</h1>
    @endif
    
@endsection