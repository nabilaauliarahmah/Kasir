@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>Item Category</h1>
@stop

@section('content')
<div class="container-fluid">
	<div class="card card-default">
		<div class="card-header">{{ __('Item Category') }}</div>
		<div class="card-body">
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>NAME</th>
                    </tr>
                </thead>
                <tbody>
                    @php $id=1; @endphp
                    @foreach($item_categories as $itemcategory)
                    <tr>
                        <td>{{$itemcategory->id}}</td>
                        <td>{{$itemcategory->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop