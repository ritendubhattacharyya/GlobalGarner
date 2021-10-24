@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="/product/create" method="GET">
                <button type="submit" class="btn btn-primary my-4">Create Product</button>
            </form>
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <div class="d-flex item align-items-center mb-4" style="width: 100%; border: 1px solid rgb(224, 224, 224); border-radius: 5px">
                                <img src="storage/{{$product->avatar}}" width="200" height="200">
                                <div class="d-flex justify-content-between align-items-center" style="width:100%;">
                                    <div>
                                        <h3 class="cart-text ml-4">{{$product->title}}</h3>
                                        <p class="card-text ml-4">{{$product->description}}</p>
                                    </div>
                                    <div>
                                        <a href="/product/edit/{{ $product->id }}"><i class="fa fa-pencil mr-2" style="color: rgb(0, 161, 27);"></i></a>
                                        <a href="/product/delete/{{ $product->id }}"><i class="fa fa-trash mr-2" style="color: rgb(161, 0, 0);"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No Product !!!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
