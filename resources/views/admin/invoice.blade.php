<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <center>
    <h4>{{$data->name}}</h4>
    <h4>{{$data->address}}</h4>
    <h4>{{$data->phone}}</h4>
    <h3>{{$data->product->name}}</h3>
    <h3>{{$data->product->price}}</h3>
    {{-- <img width="100px" height="100px" src="products/{{$data->product->image}}" alt=""> --}}
    <img width="100px" height="100px" src="{{ asset('products/'. $data->product->image) }}" alt="">
   </center>

</body>
</html>
