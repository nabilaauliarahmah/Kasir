@extends('adminlte::page')

@section('content')
<div class="container">
    <center><h1>Detail Transaksi</h1></center>
    <div class="float-right"><b>{{ date('d F Y', strtotime($transaction->created_at)) }}</b></div>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ITEM</th>
                <th scope="col">CATEGORY</th>
                
                <th scope="col">PRICE</th>
                <th scope="col">AMOUNT</th>
                <th scope="col">SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaction->details as $detail)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $detail->item->name }}</td>
                    <td>{{ $detail->item->category->name }}</td>
                    
                    <td>Rp {{ $detail->item->price }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>Rp {{ $detail->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
