var productsData = [];

function refreshProducts(data) {
    $("#productList").html("");
    var productListHTML= "";
    for (let i = 0; i < data.length; i++) {
        let name = data[i].name;
        productListHTML
        productListHTML += '<a href="#" class="list-group-item list-group-item-action">' + name + '</a>';
    }
    $("#productList").html(productListHTML);
}

$("document").ready(function() {
    $.getJSON("http://localhost/ggwp/products_data.json", function(data) {
        productsData = data;
        console.log(productsData);
        refreshProducts(productsData);
    });
});