@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>Report Transaction</h1>
@stop

@section('content')
<div class="container-fluid">
	<div class="card card-default">
		<div class="card-header">{{ __('Report Transaction') }}</div>
		<div class="card-body">
        <a href="{{ route('admin.print_transaction') }}" target="_blank" class="btn btn-secondary"><i class="fa fa-print"></i>Print PDF</a>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('admin.report.export_transaction') }}" class="btn btn-info" target="_blank">Export</a>
        </div>
        <table id="table-data" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>TRANSACTION ID</th>
                        <th>ITEM ID</th>
                        <th>QUANTITY</th>
                        <th>SUBTOTAL</th>
                        <th>DATE</th>
                    </tr>
                </thead>
                <tbody>
                    @php $id=1; @endphp
                    @foreach($transaction_details as $transactiondetail)
                    <tr>
                        <td>{{$transactiondetail->id}}</td>
                        <td>{{$transactiondetail->transaction_id}}</td>
                        <td>{{$transactiondetail->item_id}}</td>
                        <td>{{$transactiondetail->quantity}}</td>
                        <td>{{$transactiondetail->subtotal}}</td>
                        <td>{{$transactiondetail->created_at}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@stop