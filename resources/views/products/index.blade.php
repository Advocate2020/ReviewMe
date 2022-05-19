@extends('layouts.admin')

@section('styles')
    <link href="{{ asset('css/materialcss.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="card" style="border-radius: 10px;width: 1350px;margin: 0 auto">
            <div class="row">
                <div class="w3-padding">
                    <div class="col-12 text-center pb-5">
                        <h1>Manage Products</h1>
                        <hr>
                    </div>
                    <livewire:products-data-table/>
                </div>
            </div>
        </div>

        <div class="fab-container">
            <button class="fab-icon-holder navy"  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i></button>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/products" enctype="multipart/form-data" method="POST" class="pb-5">
                        <div class="form-group">
                            <label for="name" >Product Name</label>
                            <input type="text" class="form-control" name="name" id="name"  autofocus>
                            <div class="text-danger">
                                <small>{{ $errors->first('name') }}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company_id" >Company</label>
                            <select name="company_id" id="company_id" class="form-control">
                                <option value="" disabled>Select company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                <small>{{ $errors->first('company_id') }}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type_id" >Product Type</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="" disabled>Select product type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                <small>{{ $errors->first('type_id') }}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-md-4 col-form-label">Product Image</label>

                            <input type="file" class="form-control-file" id="image" name="image">

                            @if ($errors->has('image'))
                                <strong>{{ $errors->first('image') }}</strong>
                            @endif
                        </div>
                        @csrf
                        <div class="form-group">
                            <div class="text-right pt-2">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endsection
