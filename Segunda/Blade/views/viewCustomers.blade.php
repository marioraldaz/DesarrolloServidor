@extends('layout')

@section('titulo', 'titulo por defecto')

@section('contenido')
    <form method="POST" action="">
        <a href="./insertarCustomer">Insertar Customer</a>
        <a href="./">Go Back</a>
        @if (count($customers) > 0)
            <table>
                <thead>
                    <tr>
                        @foreach ($customers[0] as $key => $value)
                            <th>{{ $key }}</th>
                        @endforeach
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $params)
                        <tr>
                            @foreach ($params as $key => $value)
                                <td>{{ htmlspecialchars($value) }}</td>
                            @endforeach
                            <td>
                                <a href="seeCustomerSales.php?id={{ $params['id'] }}">See Sales</a>
                                <a href="seeBorrowedBooks.php?id={{ $params['id'] }}">See Borrowed Books</a>
                                <a href="modifyCustomer.php?id={{ $params['id'] }}">Modify</a>
                                <button type='submit' name='deleteCustomer' value={{ $params['id'] }}>Delete
                                    Customer</button>
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
