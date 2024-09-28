<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Invoice order: {{ $data['order']->id }}</h2>
        <table border="1">
            <thead>
                <tr>
                    <th colspan="4">Information customer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Name :{{ $data['order']->name }}</td>
                    <td>Phone : {{ $data['order']->phone }}</td>
                    <td>Date order: {{ $data['order']->date_order }}</td>
                </tr>
                <tr>

                    <td colspan="3">Email : {{ $data['order']->email }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-hover" border="1" style="margin-top:20px;">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['orders'] as $item)
                    <tr style="width: 100%">
                        <td>{{ $data['num']++ }}</td>
                        <td>{{ $item->name_product }}</td>
                        <td>{{ number_format($item->price, 0, '.', '.') }} VND</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->total, 0, '.', '.') }} VND</td>
                    </tr>
                @endforeach


    </div>
</body>

</html>
