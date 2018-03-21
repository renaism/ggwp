var products_data = [];

//Source: https://stackoverflow.com/questions/11582512/how-to-get-url-parameters-with-javascript/11582513#11582513
function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}

function loadData() {
    var id = null;
    id = getURLParameter("id");
    console.log(id);
    var product = productsData.find(function (element) {
        return element.id == id;
    });
    if (product != undefined) {
        let imglink = "";
        if (product.category == "Mouse") {
            imglink = "products-img/mouse.png";
        }
        else if (product.category == "Keyboard") {
            imglink = "products-img/keyboard.png";
        }
        else if (product.category == "Headset") {
            imglink = "products-img/headset.png";
        }
        else if (product.category == "Gamepad") {
            imglink = "products-img/gamepad.png";
        }
        else if (product.category == "Accessories") {
            imglink = "products-img/acc.png";
        }
        else {
            imglink = "products-img/misc.png";
        }

        $("#name").html(product.name);
        $("#category").html("Category: " + product.category);
        $("#price").html("Rp. " + $.number(product.price, 0, ',', '.') + ".-");
        $("#description").html(product.description);
        $("#image").attr("src", imglink);
        $("#details").html(product.details);
        $("#specs").html(product.specifications);
    }
}

function loadProducts() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "http://localhost/ggwp/products_data.json",
        success: function (data) {
            console.log(data);
            productsData = data;
            loadData();
        },
        error: function (result) { console.log("Error in loading JSON file") }
    });
}

function showOverview() {
    $("#overviewTab").addClass("active");
    $("#specificationsTab").removeClass("active");
    $("#specifications").hide();
    $("#overview").show();
    $("#overview").ready();
}

function showSpecifications() {
    $("#specificationsTab").addClass("active");
    $("#overviewTab").removeClass("active");
    $("#overview").hide();
    $("#specifications").show();
}

$("document").ready(function () {
    $("#specifications").hide();
    loadProducts();
});