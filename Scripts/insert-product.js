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
    $.post("http://localhost/ggwp/data_barang.json", JSON.stringify(productsData), function(data) {
        console.log("Success writing to JSON file");
        console.log(data);
    });
}

$("document").ready(function() {
    $.getJSON("http://localhost/ggwp/data_barang.json", function(data) {
        productsData = data;
        console.log(productsData);
    });
});