@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="/product/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$product->title}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="description" placeholder="Description" name="description" value="{{$product->description}}">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="avatar" placeholder="Description" name="avatar">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
