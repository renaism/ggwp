var productsData = [];

function generateID() {
    var id = productsData[productsData.length - 1].id;
    if (id == null) {
        return 1;
    }
    else {
        return id + 1;
    }
}

function addProduct() {
    var product = {
        "id": generateID(),
        "name": $("#productNameInput").val(),
        "brand": $("#brandInput").val(),
        "category": $("#categoryInput").val(),
        "price": $("#priceInput").val(),
        "description": $("#descriptionInput").val(),
        "details": $("#detailsInput").val(),
        "specifications": $("#specificationsInput").val(),
        "image": $("#imagesInput").val()
    }
    console.log(product);
    productsData.push(product);
    console.log(productsData);
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "http://localhost/ggwp/insert_product.php",
        data: { data: JSON.stringify(productsData) },
        success: function (result) {
            console.log("Success writing to JSON file: ");
            window.open("product_manager.html", "_self");
        },
        error: function (result) {
            console.log("Error in writing JSON file");
            window.open("product_manager.html", "_self");
        }
    });
}

function loadProducts() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "http://localhost/ggwp/products_data.json",
        success: function (data) {
            console.log(data);
            productsData = data;
            return productsData;
        },
        error: function (result) { console.log("Error in loading JSON file") }
    });
}

$("document").ready(function () {
    loadProducts();
});