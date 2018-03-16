var productsData = [];

function refreshProducts(data) {
    $("#productList").html("");
    console.log(data);
    var productListHTML= "";
    for (let i = 0; i < data.length; i++) {
        let name = data[i].name;
        productListHTML
        productListHTML += '<a href="#" class="list-group-item list-group-item-action">' + name + '</a>';
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