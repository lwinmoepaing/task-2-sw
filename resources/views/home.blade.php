@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-2">
           @includeIf('common.side-nav')
        </div>
        <div class="col-md-9 mb-2">
            @includeIf('common.messages')
            @includeIf('common.shop-new-form')
            @includeIf('common.shop-edit-form')

            @if(isset($map))
                <div class="">
                    <div class="map-container" id="mapContainer">
                        <div class="cursor cursor-pointer" id="mapCursor"></div>

                        @foreach ($shop_list as $shop)
                            <div class="marker-wrapper shop-edited-wrapper"  style="left: {{$shop->map_position_x}}px; top: {{$shop->map_position_y}}px;" data-value="{{json_encode($shop)}}">
                                <div class="shop-name-icon-container">
                                    <img src="image/helper/map.png" class="marker"/>
                                </div>
                                <div class="shop-name-container bg-white">
                                    {{$shop->shop_name}}
                                </div>
                            </div>
                        @endforeach
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
