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
                        Add new sub category!
                        <form action="{{route('sub-category.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_id">Select category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <label for="sub_category_name">Enter a sub category</label>
                                <input type="text" class="form-control" name="sub_category_name">
                                @error('sub_category_name')
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
