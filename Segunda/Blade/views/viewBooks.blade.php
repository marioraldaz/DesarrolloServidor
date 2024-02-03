@extends('layout')

@section('titulo', 'titulo por defecto')

@section('contenido', 'contenido por defecto')
<form method="POST" action="">
    <table>
        <tr>
            @foreach ($customersInDB[0] as $key => $value)
                <th>{{ htmlspecialchars($key) }}</th>
            @endforeach
            <th>Actions</th>
        </tr>

        @foreach ($customersInDB as $params)
            <tr>
                @foreach ($params as $key => $value)
                    <td>{{ htmlspecialchars($value) }}</td>
                @endforeach
                <td>
                    <a href="{{ route('seeSales', ['id' => $params['id']]) }}">See Sales</a>
                    <button type="submit" name="modifyBook" value="{{ $params['id'] }}">Modify</button>
                    <button type="submit" name="deleteBook" value="{{ $params['id'] }}">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
    <button type="submit" name="insertBook">Insert Book</button>
</form>

@endsection