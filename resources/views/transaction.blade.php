@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    Choose Item
                </div>
                <div class="card-body">
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="item_id" id="itemId">

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="itemName" placeholder="Choose Item..." readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#pilihBarang">Add</button>
                                </div>
                            </div>

                            <div class="modal fade" id="pilihBarang">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Choose Item</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <table class="table table-striped">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">CATEGORY ID</th>
                                                        <th scope="col">NAME</th>
                                                        <th scope="col">PRICE</th>
                                                        <th scope="col">STOCK</th>
                                                        <th scope="col">IMAGE</th>
                                                        <th scope="col">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($items as $item)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $item->item_category_id }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>Rp {{ $item->price }}</td>
                                                            <td>{{ $item->stock }}</td>
                                                            <td>
                                                                <img src="{{ asset($item->image) }}" width="50px" height="50px">
                                                            </td>
                                                            <td>
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-sm btn-primary" 
                                                                    data-dismiss="modal"
                                                                    onclick="
                                                                        $('#itemId').val('{{ $item->id }}')
                                                                        $('#itemName').val('{{ $item->name }}')
                                                                        $('#itemQty').attr('max', '{{ $item->stock }}')
                                                                    "
                                                                >
                                                                    Add
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" value="1" class="form-control" name="quantity" id="itemQty" placeholder="Enter Amount..." required>
                                <div class="input-group-append">
                                    <span class="input-group-text">Unit</span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Add</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Payment
                </div>
                <div class="card-body">
                    <form action="{{ route('transaction.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price</label>

                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name="total" 
                                    value="{{ 
                                        $itemCarts->sum(function ($item) {
                                            return $item->price * $item->cart->quantity;
                                        })
                                    }}" 
                                    placeholder="0" 
                                    readonly 
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Payment</label>

                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name="pay_total" 
                                    placeholder="0" 
                                    min="{{
                                        $itemCarts->sum(function ($item) {
                                            return $item->price * $item->cart->quantity;
                                        })
                                    }}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Date</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="date" value="{{ date('d F Y') }}" disabled>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">CATEGORY ID</th>
                <th scope="col">NAME</th>
                <th scope="col">PRICE</th>
                <th scope="col">STOCK</th>
                <th scope="col">AMOUNT</th>
                <th scope="col">TOTAL</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itemCarts as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->item_category_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>Rp {{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->cart->quantity }}</td>
                    <td>{{ $item->price * $item->cart->quantity }}</td>
                    
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubahJumlah{{ $loop->iteration }}">Edit</button>
                        <form action="{{ route('cart.destroy', $item->cart) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>

                        <div class="modal fade" id="ubahJumlah{{ $loop->iteration }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Amount '{{ $item->name }}'</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ route('cart.update', $item->cart) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="number" min="1" max="{{ $item->stock }}" value="{{ $item->cart->quantity }}" class="form-control" name="quantity" placeholder="Enter Amount..." required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Unit</span>
                                                        <button type="submit" class="btn btn-primary float-right">Edit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
