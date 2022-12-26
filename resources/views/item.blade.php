@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>Item</h1>
@stop

@section('content')
<div class="container-fluid">
	<div class="card card-default">
		<div class="card-header">{{ __('Item') }}</div>
		<div class="card-body">
            <!-- Button Tambah Data -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal"><i class="fa fa-plus"></i> Tambah Data</button>
            
            </hr>
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                                        <th>ITEM CATEGORY ID</th>
                                        <th>NAME</th>
                                        <th>PRICE</th>
                                        <th>STOK</th>
                                        <th>IMAGE</th>
                                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php $id=1; @endphp
                    @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->item_categpry_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->stok}}</td>
                        <td>
                            @if($item->image !== null)
                                <img src="{{ asset('storage/image_item/'.$item->image) }}" width="100px"/>
                            @else
                                [Gambar tidak tersedia]
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" id="btn-edit-buku" class="btn btn-success"
                                    data-toggle="modal" data-target="#editItem"
                                    data-id="{{ $item->id }}">Edit</button>
                                <button type="button" class="btn btn-danger"
                                    onclick="deleteConfirmation('{{ $item->id }}', '{{ $item->name }}' )">Hapus</button>
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