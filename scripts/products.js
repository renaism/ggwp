var productsData = [];

function refreshProducts(data) {
    $("#productList").html("");
    console.log(data);
    var productListHTML= "";
    for (let i = 0; i < data.length; i++) {
        let name = data[i].name;
        let imglink = "";
        if(data[i].category == "Mouse") {
            imglink = "mouse/g502.png";
        }
        productListHTML
        productListHTML += 
        '<div class="col-sm-4 "><div class="card carding zoom"><div class="card-body">' +
        '<img class="card-img-top" src="' + imglink  + '" alt="Card image cap"></div>' +
        '<a href="#" class="card-link cardtext">' + data[i].name + '</a>' +
        '<div class="item-price">Rp.' + data[i].price  + '</div></div></div>';
    }
    $("#productList").html(productListHTML);
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