@extends('layout')

@section('title','Ecommerce Home Page')

@section('content')

<div class="card-group">
    @foreach($products as $product)
    <div class="card">
      <img src="{{ asset($product->image) }}" class="card-img-top" alt="..." style="height:300px;width:300px;">
      <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-title">{{ $product->price }}</p>
        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
        <form action="{{ route('processTransaction', $product) }}" method="GET">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <button type="submit" class="btn btn-primary">Pay with PayPal</button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
</div>



@endsection