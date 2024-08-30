@extends('master')
@section('title', 'Оформление заказа')
@section('content')
    <div class="cart-container">
        <h1>Оформление заказа</h1>
        <form class="order-form" action="{{route('createOrder')}}" method="POST">
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" placeholder="Введите Ваше имя" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Введите Вашу электронную почту" required>
            </div>
            @php
                $total=0;
                foreach ($cart as $product){
                    $total+=$product['quantity']*$product['price'];
                }
            @endphp
            <h2>Итоговая стоимость: <span id="total-cost">{{$total}} ₽</span></h2>
            @csrf
            <button class="active" type="submit" class="btn">Оформить заказ</button>
        </form>
    </div>
@endsection