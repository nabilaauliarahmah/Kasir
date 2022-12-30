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
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#importDataModal">Import</button>
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

<!-- MODAL IMPORT DATA FORM -->
<div class="modal fade" id="importDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.report.import_transaction') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cover">Upload File</label>
                        <input type="file" class="form-control" name="file"/>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Import Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop