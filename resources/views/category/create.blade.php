@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="d-inline-block">
                            Dashboard
                        </div>
                        <div>
                            <a href="{{route('home')}}" class="btn btn-warning">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        Add new category!
                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="form-group mt-4">
                                <label for="category_name">Enter a category</label>
                                <input type="text" class="form-control" name="category_name">
                                @error('category_name')
                                <div class="error text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
