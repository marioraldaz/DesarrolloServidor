@extends('layout')

@section('titulo','titulo por defecto')

@section('contenido')
    <form method="POST" action="">
        <a href="./insertarCustomer">Insertar Customer</button>
        <a href="./">Go Back</a>
        @if(count($customersInDB)>0)
            <table>
                <thead>
                    <tr>
                        @foreach ($customersInDB[0] as $key => $value)
                            <th>{{ $key }}</th>
                        @endforeach
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customersInDB as $params)
                        <tr>
                            @foreach ($params as $key=>$value)
                                <td>{{ htmlspecialchars($value) }}</td>
                            @endforeach
                            <td>
                                <button type="submit" name="seeSales" value="{{ $params['id'] }}">See Sales</button>
                                <button type="submit" name="seeBorrowedBooks" value="{{ $params['id'] }}">See Borrowed Books</button>
                                <button type="submit" name="modifyCustomer" value="{{ $params['id'] }}">Modify</button>
                                <button type="submit" name="deleteCustomer" value="{{ $params['id'] }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>No customers in DataBase</h1>
        @endif
    </form>
@endsection