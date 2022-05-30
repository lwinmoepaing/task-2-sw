const $ = require("jquery");
const bootstrap = require("bootstrap");

module.exports = () => {
    let position = {
        x: "",
        y: "",
    };

    const Container = {
        mapContainer: document.getElementById("mapContainer"),
        mapCursor: document.getElementById("mapCursor"),
        mapImage: document.getElementById("mapImage"),
        shopNewFormModal: document.getElementById("shop-new-form-modal"),
        shopEditFormModal: document.getElementById("shop-edit-form-modal"),
    };

    if (Container.mapContainer) {
        Container.mapContainer.addEventListener("mousemove", function (e) {
            const x = e.pageX - e.currentTarget.offsetLeft;
            const y = e.pageY - e.currentTarget.offsetTop;
            Container.mapCursor.style.left = `${x}px`;
            Container.mapCursor.style.top = `${y}px`;
            position.x = x;
            position.y = y;
        });

        Container.mapContainer.addEventListener("mouseenter", (e) => {
            Container.mapCursor.classList.add("active");
        });

        Container.mapContainer.addEventListener("mouseleave", (e) => {
            Container.mapCursor.classList.remove("active");
        });
    }

    // When mapCursor click to Map-Image

    if (Container.mapCursor) {
        const clearShopForm = () => {
            $("#shop_name_field").val("");
            $("#shop_address_field").val("");
        };

        Container.mapCursor.addEventListener("click", () => {
            const newShopModal = new bootstrap.Modal(
                Container.shopNewFormModal,
                {
                    backdrop: true,
                }
            );
            newShopModal.show();
            clearShopForm();
            $("#mapPositionX").val(position.x);
            $("#mapPositionY").val(position.y);
        });

        $("#shop-new-form-modal").on("hidden.bs.modal", function () {
            clearShopForm();
        });
    }

    // When Shop Edit
    const clearShopEditForm = () => {
        $("#shop_edit_name_field").val("");
        $("#shop_edit_address_field").val("");
        $("#mapEditPositionX").val("");
        $("#mapEditPositionY").val("");
        $("#mapEditIdInput").val("");
        $("#mapEditId").val("");
        $("#mapEditIsDelete").val("false");
        $("#shop_edit_name_field").attr("disabled", false);
        $("#shop_edit_address_field").attr("disabled", false);
        $("#shop_edit_danger").attr("disabled", false);
        $("#shop_edit_submit").attr("disabled", false);
    };

    if ($("#shop-edit-form-modal")) {
        $("#shop-edit-form-modal").on("hidden.bs.modal", function () {
            clearShopForm();
        });

        $(".shop-edited-wrapper").on("click", function () {
            clearShopEditForm();
            const value = $(this).data("value");
            const useRole = $("#mapEditUserRole").val();
            const userID = $("#mapEditUserId").val();
            if (useRole === "1" && userID !== value.user_id) {
                $("#shop_edit_name_field").attr("disabled", true);
                $("#shop_edit_address_field").attr("disabled", true);
                $("#shop_edit_danger").attr("disabled", true);
                $("#shop_edit_submit").attr("disabled", true);
            }

            $("#mapEditId").val(value.id);
            $("#mapEditIdInput").val(value.map_id);
            $("#shop_edit_name_field").val(value.shop_name);
            $("#shop_edit_address_field").val(value.shop_address);
            $("#mapEditPositionX").val(value.map_position_x);
            $("#mapEditPositionY").val(value.map_position_y);
            $("#mapEditIsDelete").val("false");

            const editShopModal = new bootstrap.Modal(
                Container.shopEditFormModal,
                {
                    backdrop: true,
                }
            );
            editShopModal.show();
        });

        $("#shop_edit_danger").on("click", function () {
            $("#mapEditIsDelete").val("true");
            $("#shop-edit-form").submit();
        });
    }
};
