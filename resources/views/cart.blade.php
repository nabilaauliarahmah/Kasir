@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>Cart</h1>
@stop

@section('content')
<div class="container-fluid">
	<div class="card card-default">
		<div class="card-header">{{ __('Cart') }}</div>
		<div class="card-body">
            <!-- Button Tambah Data -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal"><i class="fa fa-plus"></i> Tambah Data</button>
            
            </hr>
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>ITEM ID</th>
                        <th>QUANTITY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php $id=1; @endphp
                    @foreach($carts as $cart)
                    <tr>
                        <td>{{$cart->id}}</td>
                        <td>{{$cart->item_id}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" id="btn-edit-buku" class="btn btn-success"
                                    data-toggle="modal" data-target="#editItem"
                                    data-id="{{ $cart->id }}">Edit</button>
                                <button type="button" class="btn btn-danger"
                                    onclick="deleteConfirmation('{{ $cart->id }}', '{{ $cart->name }}' )">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop