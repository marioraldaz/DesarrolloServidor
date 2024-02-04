@extends('layout')

@section('titulo')

@section('contenido')
    <a href="./index">Go To Main Page</a>
    <form method="POST" action="">
        <table>
            <tr>
                @foreach ($books[0] as $key => $value)
                    <th>{{ htmlspecialchars($key) }}</th>
                @endforeach
                <th>Actions</th>
            </tr>

            @foreach ($books as $params)
                <tr>
                    @foreach ($params as $key => $value)
                        <td>{{ htmlspecialchars($value) }}</td>
                    @endforeach
                    <td>
                        <a href="./modifyBook?id={{ $params['id'] }}">Modify</a>
                        <button type="submit" name="deleteBook" value="{{ $params['id'] }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
        <button type="submit" name="insertBook">Insert Book</button>
    </form>

@endsection
