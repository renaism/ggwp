function addBarang() {    
    barang = {
        "name": $("#productNameInput").val(),
        "brand": $("#brandInput").val(),
        "category": $("#categoryInput").val(),
        "price": $("#priceInput").val(),
        "description": $("#descriptionInput").val(),
        "details": $("#detailsInput").val(),
        "specifications": $("#specificationsInput").val(),
        "image": $("#imagesInput").val() 
    }
    console.log(barang);

    
}