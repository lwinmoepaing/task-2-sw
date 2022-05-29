@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-2">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                  Home
                </a>
                <a href="#" class="list-group-item list-group-item-action">Shop</a>
                <a href="#" class="list-group-item list-group-item-action">Map</a>
            </div>
        </div>
        <div class="col-md-8 mb-2">
            <form action="{{ route('map.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload New Map</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="d-grid gap-2">
                    <input class="btn btn-primary block" type="submit" value="submit">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
