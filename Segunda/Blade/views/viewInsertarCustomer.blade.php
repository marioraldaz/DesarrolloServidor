@extends('layout')

@section('titulo','titulo por defecto')

@section('contenido')
<a href="./gestionarCustomers">Go back</a>
<a href="./index">Go To Main Page</a>

<form method="post" action="">
            
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" required>
    <br>

    <label for="surname">Surname:</label>
    <input type="text" name="surname" required>
    <br>

    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>

    <label for="type">Type:</label>
    <input type="text" name="type" required>
    <br>
    <button type="submit" name="insertar">Submit</button>
</form>
@endsection