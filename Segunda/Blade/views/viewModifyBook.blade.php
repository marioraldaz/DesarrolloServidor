@extends('layout')

@section('titulo')
@section('contenido')
    <a href="./index">Go To Main Page</a>
    <a href="./gestionarBooks">Go Back</a>
    <form method="post" action="">
        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" value="{{ $book['isbn'] }}" required>
        <br>

        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $book['title'] }}" required>
        <br>

        <label for="author">Author:</label>
        <input type="text" name="author" value="{{ $book['author'] }}" required>
        <br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="{{ $book['stock'] }}" required>
        <br>

        <label for="price">Price:</label>
        <input type="number" name="price" value="{{ $book['price'] }}" required>
        <br>

        <button type="submit" name="updateBook" value="{{ $book['id'] }}">Submit</button>
    </form>
@endsection
