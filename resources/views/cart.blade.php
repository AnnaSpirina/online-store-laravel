@extends('master')
@section('title', 'Корзина')
@section('content')
    <div class="cart-container">
        <h1>Корзина</h1>
        @if (empty($cart))
            <p>Корзина пуста</p>
        @else
        <table class="cart-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Название</th>
                    <th>Стоимость</th>
                    <th>Количество</th>
                    <th>Итого</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $product)
                <tr>
                    <td><a href="{{route('getProduct', $product['id'])}}"><img src="/images/products/{{$product['image']}}" alt="{{$product['name']}}"></a></td>
                    <td><a href="{{route('getProduct', $product['id'])}}"><b>{{$product['name']}}</b></a></td>
                    <td>{{$product['price']}} ₽</td>
                    <td>
                    <div class="Row">
                        <div class="Column">
                            <form action="{{route('cart.reduce', $product['id'])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn-icon"><i class="fa fa-minus"></i></button>
                            </form>
                        </div>
                        <div class="Column"><h3>{{$product['quantity']}}</h3></div>
                        <div class="Column">
                            <form action="{{route('cart.add', $product['id'])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn-icon"><i class="fa fa-plus"></i></button>
                            </form>
                        </div>
                    </div>
                    </td>
                    <td><h3 class="total-price">{{$product['quantity']*$product['price']}} ₽</h3></td>
                    <td class="button-remove">
                        <form action="{{route('cart.remove', $product['id'])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn-icon"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @php $total += $product['price'] * $product['quantity']; @endphp
            @endforeach
            </tbody>
        </table>
        <div id="wrapper">
            <div id="left" class="total">
                <h2>Итоговая стоимость: <span id="total-cost">{{ $total }} ₽</span></h2>
            </div>
            <div id="right">
                <form action="{{route('cart.clear')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn-clear">Очистить корзину</button>
                </form>
            </div>
        </div>
        <form action="{{route('order')}}" method="GET">
            @csrf
            <button type="submit" class="active">Оформить заказ</button>
        </form>
        @endif
    @if(session('maximum'))
        <script>
          swal("", "{{ session('maximum') }}", "warning")
        </script>
    @endif
@endsection