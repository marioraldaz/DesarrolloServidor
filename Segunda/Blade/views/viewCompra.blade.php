@extends('layout')

@section('titulo')

@section('contenido')
    <a href="./index">Go To Main Page</a>
    <form method="POST" action="">

        @if (count($cart) > 0)
            <table>
                <tr>
                    @foreach ($cart[0]['book'] as $key => $value)
                        <th>{{ htmlspecialchars($key) }}</th>
                    @endforeach
                    <th>Amount</th>
                    <th>Actions</th>
                </tr>

                @foreach ($cart as $params)
                    <tr>

                        @foreach ($params['book'] as $key => $value)
                            <td>{{ htmlspecialchars($value) }}</td>
                        @endforeach
                        <td>{{ $params['amount'] }}</td>
                        <td>
                            <button type="submit" name="deleteBook" value="{{ $params['book']['id'] }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif

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
                        <button type="submit" name="add" value="{{ $params['id'] }}">Add</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </form>

@endsection
