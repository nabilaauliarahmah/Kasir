@extends('adminlte::page')

@section('content')
<div class="container">
    <center><h1>Transaction</h1></center>

    <table class="table table-striped mt-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price Total</th>
                <th scope="col">Pay Total</th>
                <th scope="col">Transaction Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr onclick="window.location='{{ route('transaction.show', $transaction) }}'" style="cursor: pointer">
                    <th scope="row">{{ $transaction->id }}</th>
                    <td>{{ $transaction->user_id }}</td>
                    <td>Rp {{ $transaction->total }}</td>
                    <td>Rp {{ $transaction->pay_total }}</td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
