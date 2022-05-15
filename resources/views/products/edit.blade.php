@extends('layouts.admin')

@section('styles')
    <link href="{{ asset('css/materialcss.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">

        <div class="card col-10" style="border-radius: 10px;width: 1150px;margin: 0 auto">
            <div class="row">
                <div class="w3-padding">
                    <div class="text-center pb-5">
                        <h1>Update Product</h1>
                        <hr>
                    </div>
                    <form action="/products/{{$product->id}}" enctype="multipart/form-data" method="POST" class="pb-5">
                        @method('PATCH')
                        <input type="text" hidden value="{{$product->image}}">
                        <div class="form-group">
                            <label for="name" >Product Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}" autofocus>
                            <div class="text-danger">
                                <small>{{ $errors->first('name') }}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type_id" >Product Type</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="" disabled>Select product</option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}" selected>{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                <small>{{ $errors->first('type_id') }}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Product Image</label>

                            <input type="file" class="form-control-file" id="image" name="image">

                            @if ($errors->has('image'))
                                <strong>{{ $errors->first('image') }}</strong>
                            @endif
                        </div>
                        @csrf
                        <div class="form-group">
                            <div class="text-right pt-2">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
@endsection
