<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center">Data Item</h1>
    </br>
    <table id="table-data" class="table table-bordered">
        <thead>
            <tr>
            <th>ID</th>
            <th>ITEM CATEGORY ID</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>STOK</th>
            <th>IMAGE</th>
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
                            @if($item->cover !== null)
                            <img src="{{public_path('storage/cover_buku/'.$book->cover)}}" width="80px">
                            @else
                            [Gambar Tidak Tersedia]
                            @endif
                        </td>
                    </tr>
                    @endforeach
        </tbody>
    </table>
</body>

</html>