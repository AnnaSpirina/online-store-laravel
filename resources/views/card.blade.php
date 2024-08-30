  <div class="card h-100">
      <a href="{{route('getProduct', $product->id)}}"><img src="/images/products/{{$product->image}}" class="card-img-top" alt="{{$product->name}}"></a>
      <div class="card-body">
        <h5 class="card-title"><b>{{$product->name}}</b></h5>
        <p class="card-text">{{$product->price}} ₽</p>
          @if(isset(session('cart')[$product->id]))
            <button class="inactive" disabled>В корзине</button>
          @else
            <form action="{{route('cart.add', $product->id)}}" method="POST">
            @csrf
              <button class="active">В корзину</button>
            </form>
          @endif
      </div>
      <div class="card-footer">
        <small class="text-muted">{{$product->stock}} шт.</small>
      </div>
    </div>