@isset($map)
<div class="modal fade" id="shop-new-form-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('shop.create') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Shop Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="map_id" value="{{$map->id}}" id="mapIdInput">
                    <input type="hidden" name="map_position_x" value="" id="mapPositionX">
                    <input type="hidden" name="map_position_y" value="" id="mapPositionY">
                    <div class="mb-3">
                        <label for="shop_name" class="form-label">Shop Name</label>
                        <input type="text" name="shop_name" class="form-control" id="shop_name_field" >
                    </div>
                    <div class="mb-3">
                        <label for="shop_address" class="form-label">Shop Address</label>
                        <input type="text" name="shop_address" class="form-control" id="shop_address_field" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save Shop</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endisset
