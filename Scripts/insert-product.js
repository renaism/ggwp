var productsData = [];

function addBarang() {    
    var product = {
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
    $.ajax({
        type: "POST",
        dataType: "json",
        async: false,
        url: "http://localhost/ggwp/insert_product.php",
        data: { data: JSON.stringify(productsData) },
        success: function() { console.log("Success writing to JSON file:\n" + data) },
        failure: function() { console.log("Error in writing JSON file") }
    });
}

$("document").ready(function() {
    $.getJSON("http://localhost/ggwp/products_data.json", function(data) {
        productsData = data;
        console.log(productsData);
    });
});