<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center">Report Transaction</h1>
    </br>
    <table id="table-data" class="table table-bordered">
        <thead>
            <tr>
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
</body>

</html>