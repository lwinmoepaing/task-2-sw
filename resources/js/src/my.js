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
    };

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

    // When mapCursor click to Map-Image
    const clearStoryForm = () => {
        $("#shop_name_field").val("");
        $("#shop_address_field").val("");
    };

    Container.mapCursor.addEventListener("click", () => {
        const myModal = new bootstrap.Modal(Container.shopNewFormModal, {
            backdrop: true,
        });
        myModal.show();
        clearStoryForm();
        $("#mapPositionX").val(position.x);
        $("#mapPositionY").val(position.y);
    });

    $("#shop-new-form-modal").on("hidden.bs.modal", function () {
        clearStoryForm();
    });
};
