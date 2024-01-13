// Sidebar active class
$(document).ready(function () {
    function setActive() {
        var currentPath = window.location.pathname;
        $(".nav-link").removeClass("active");
        $(".nav-link[href='" + currentPath + "']").addClass("active");
    }
    setActive();

    $(window).on("popstate", function () {
        setActive();
    });
});

// Dropdown Kategori

document.getElementById("kategori").addEventListener("change", function () {
    document.getElementById("filterForm").submit();
});

// Menghitung harga jual

var inputHargaBeli = document.getElementById("harga_beli");
var inputHargaJual = document.getElementById("harga_jual");

inputHargaBeli.addEventListener("input", function () {
    var hargaBeli = parseFloat(inputHargaBeli.value);

    var hargaJual = hargaBeli * 1.3;

    inputHargaJual.value = Math.round(hargaJual);
});

// Image Preview

function previewImage() {
    const input = document.getElementById("image");
    const preview = document.getElementById("preview");
    const uploadLabel = document.querySelector(".image-label p");

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            uploadLabel.textContent = input.files[0].name; // Menetapkan nama file
        };

        reader.readAsDataURL(input.files[0]);
    }
}
