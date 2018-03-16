var productsData = [];

function refreshProducts(data) {
    $("#productsRow").html("");
    console.log(data);
    var productListHTML= "";
    for (let i = 0; i < data.length; i++) {
        let name = data[i].name;
        let imglink = "";
        if(data[i].category == "Mouse") {
            imglink = "products-img/mouse.png";
        }
        else if(data[i].category == "Keyboard") {
            imglink = "products-img/keyboard.png";
        }
        else if(data[i].category == "Headset") {
            imglink = "products-img/headset.png";
        }
        else if(data[i].category == "Gamepad") {
            imglink = "products-img/gamepad.png";
        }
        else if(data[i].category == "Accessories") {
            imglink = "products-img/acc.png";
        }
        else {
            imglink = "products-img/misc.png";
        }
        productListHTML
        productListHTML += 
        '<div class="col-sm-4 "><div class="card carding zoom"><div class="card-body">' +
        '<img class="card-img-top" src="' + imglink  + '" alt="Card image cap"></div>' +
        '<a href="#" class="card-link cardtext">' + data[i].name + '</a>' +
        '<div class="item-price">Rp. ' + $.number(data[i].price, 0, ',', '.')  + ',-</div></div></div>';
    }
    $("#productsRow").html(productListHTML);
}

function getProducts() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "http://localhost/ggwp/products_data.json",
        success: function (data) {
            console.log(data);
            productsData = data;
            refreshProducts(productsData);
        },
        error: function (result) { console.log("Error in loading JSON file") }
    });
}

$("document").ready(function() {
    getProducts();
});