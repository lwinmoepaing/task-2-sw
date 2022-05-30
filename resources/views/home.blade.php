@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-2">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                  Home
                </a>
                <a href="#" class="list-group-item list-group-item-action">Shop</a>
                <a href="#" class="list-group-item list-group-item-action">Map</a>
            </div>
        </div>
        <div class="col-md-9 mb-2">
            @includeIf('common.messages')
            @includeIf('common.shop-new-form')


            @if(isset($map))
                <div class="">
                    <div class="map-container" id="mapContainer">
                        <div class="cursor cursor-pointer" id="mapCursor"></div>
                        <img src="{{$map->url}}" class="cursor-pointer" id="mapImage" />
                    </div>
                </div>

                <div class="mt-3">
                    <form action="{{ route('map.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$map->id}}">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Change Map</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                        </div>
                        <div class="d-grid gap-2">
                            <input class="btn btn-primary block" type="submit" value="Change Map">
                        </div>
                    </form>
                </div>
            @else
                <form action="{{ route('map.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload New Map</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                    </div>
                    <div class="d-grid gap-2">
                        <input class="btn btn-primary block" type="submit" value="Create New Map">
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
