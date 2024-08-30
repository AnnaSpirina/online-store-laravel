@extends('master')
@section('title', $product->name)
@section('content')
    <div class="product-container">
        <div class="product-image">
            <img src="/images/products/{{$product->image}}" alt="{{$product->name}}">
        </div>
        <div class="product-info">
            <h1 class="product-name"><b>{{$product->name}}</b></h1>
            <p class="product-price">Стоимость: {{$product->price}} ₽</p>
            <p class="product-stock">Остаток: {{$product->stock}} шт.</p>
            @if(isset(session('cart')[$product->id]))
                <button class="inactive" disabled>В корзине</button>
            @else
            <form action="{{route('cart.add', $product->id)}}" method="POST">
                @csrf
                <button class="active">В корзину</button>
            </form>
          @endif
        </div>
    </div>
    @if(session('success'))
        <script>
          swal("", "{{ session('success') }}", "success")
        </script>
    @endif
    @if(session('outOfStock'))
        <script>
          swal("", "{{ session('outOfStock') }}", "error")
        </script>
    @endif
@endsection