<div class="modal fade" id="shop-edit-form-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('shop.edit') }}" method="post" id="shop-edit-form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editing Shop </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="mapEditUserId" value="{{$user->id}}">
                    <input type="hidden" name="user_role" id="mapEditUserRole" value="{{$user->role_id}}"/>
                    <input type="hidden" name="id" value="" id="mapEditId">
                    <input type="hidden" name="map_id" value="" id="mapEditIdInput">
                    <input type="hidden" name="map_position_x" value="" id="mapEditPositionX">
                    <input type="hidden" name="map_position_y" value="" id="mapEditPositionY">
                    <input type="hidden" name="is_delete" value="false" id="mapEditIsDelete">
                    <div class="mb-3">
                        <label for="shop_name" class="form-label">Shop Name</label>
                        <input type="text" name="shop_name" class="form-control" id="shop_edit_name_field" >
                    </div>
                    <div class="mb-3">
                        <label for="shop_address" class="form-label">Shop Address</label>
                        <input type="text" name="shop_address" class="form-control" id="shop_edit_address_field" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="shop_edit_danger">Delete</button>
                    <button class="btn btn-primary" type="submit" id="shop_edit_submit">Save Shop</button>
                </div>
            </form>
        </div>
    </div>
</div>
