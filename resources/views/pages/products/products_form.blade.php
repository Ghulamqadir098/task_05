@extends('layout.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">Add a Product</div>
                <div class="card-body">
                    <form method="POST" action="{{route('create.product')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="email" name="name" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="password" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Description</label>
                            <input type="text" class="form-control" id="password" name="description" required>
                        </div>

                        <div class="mb-3">
                            <label for="categories" class="form-label">Select Categories</label>
                            <select class="form-control" id="categories" name="categories[]" multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection