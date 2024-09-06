@extends('layout.layout')


@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Add a Category</div>
                <div class="card-body">
                    <form method="POST" action="{{route('create.category')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="email" name="name" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection