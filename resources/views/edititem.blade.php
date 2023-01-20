@extends('adminlte::page')

@section('content')
<div class="animated fade-in">
    <div  class="card">
        <div class="card-header">
            <div class="pull-left">
                <strong>Edit Item</strong>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('admin/'.$item->id) }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form group">
                            <label>Item Category ID</label>
                            <input type="text" name="item_category_id" class="form-control" value="{{ $item->item_category_id }}" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="year" class="form-control" name="name" value="{{ $item->name }}" autofocus required/>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" value="{{ $item->price }}" autofocus required/>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" name="stock" value="{{ $item->stock }}" autofocus required/>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('admin/items') }}" class="btn btn-secondary btn sm">
                            <i class="fa fa-undo"></i>Back
                            </a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop