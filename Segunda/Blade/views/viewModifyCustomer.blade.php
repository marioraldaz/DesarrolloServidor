@extends('layout')

@section('titulo', 'Update Customer')

@section('contenido')
    <a href="./index">Go To Main Page</a>
    <a href="./gestionarCustomers">Go Back</a>

    <form method="post" action="">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="{{ $customer['firstname'] }}" required>
        <br>

        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="{{ $customer['surname'] }}" required>
        <br>

        <label for="newEmail">Email:</label>
        <input type="email" name="newEmail" value="{{ $customer['email'] }}" required>
        <br>

        <label for="type">Type:</label>
        <select name="type" required>
            <option value="basic" {{ $customer['type'] == 'basic' ? 'selected' : '' }}>basic</option>
            <option value="premium" {{ $customer['type'] == 'premium' ? 'selected' : '' }}>Premium</option>
        </select>
        <br>

        <button type="submit" name="updateCustomer" value="{{ $customer['id'] }}">Submit</button>
    </form>
@endsection
