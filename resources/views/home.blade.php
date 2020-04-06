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
                            <form class="d-inline-block" action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        You are logged in!
                        <div class="d-flex align-items-between">
                            <a href="{{route('category.create')}}" class="btn btn-success w-50 m-1">Add new category</a>
                            <a href="{{route('category.index')}}" class="btn btn-success w-50 m-1">Show categories</a>
                        </div>
                        <div class="d-flex align-items-between">
                            <a href="{{route('sub-category.create')}}" class="btn btn-success w-50 m-1">Add new sub category</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
