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
            <!-- Button -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal"><i class="fa fa-plus"></i>Add Item</button>
            <a href="{{ route('admin.print_item') }}" target="_blank" class="btn btn-secondary"><i class="fa fa-print"></i>Print PDF</a>
            <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('admin.items.export_item') }}" class="btn btn-info" target="_blank">Export</a>
            </div>    
            </hr>
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                                        <th>ITEM CATEGORY ID</th>
                                        <th>NAME</th>
                                        <th>PRICE</th>
                                        <th>STOCK</th>
                                        <th>IMAGE</th>
                                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php $id=1; @endphp
                    @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->item_category_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->stock}}</td>
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
                                    onclick="deleteConfirmation('{{ $item->id }}', '{{ $item->name }}' )">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- TAMBAH DATA -->
<div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.items.submit_item') }}" enctype="multipart/form-data">
                    @csrf
                        
                        <div class="form-group">
                            <label for="item_category_id">Item Category ID</label>
                            <input type="text" class="form-control" name="item_category_id" id="item_category_id" required/>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="year" class="form-control" name="name" id="name" required/>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" required/>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" name="stock" id="stock" required/>
                        </div>
                        <div class="form-group">
                            <label for="image">Image<label>
                            <input type="file" class="form-control" name="image" id="image"/>
                        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop