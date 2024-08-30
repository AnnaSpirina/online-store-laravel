@extends('master')
@section('title', 'Все товары')
@section('content')
<div class="cards">
  <div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($products as $product)
    <div class="col">
      @include('card', compact('product'))
    </div>
    @endforeach
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