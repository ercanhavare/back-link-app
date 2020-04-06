@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="d-inline-block">
                            All our categories
                        </div>
                        <div>
                            <a href="{{route('home')}}" class="btn btn-warning">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        {{--@foreach($categories as $category)
                            <h4>{{$category->category_name}}</h4>

                            <ul>
                                @foreach($category->subCategories as $subCat)
                                    <li>{{$subCat->sub_category_name}}</li>
                                @endforeach
                            </ul>
                        @endforeach--}}
                        <show-category-component :categories="{{$categories}}"></show-category-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
