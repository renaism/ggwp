<!DOCTYPE html>
<html>

<head>
    <?php include 'default_head.php' ?>
    <title>GGWP | Add a Product</title>
    <script src="scripts/products-crud.js"></script>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container" style="margin-top:90px">
        <h1>Add a Product</h1>
        <form class="mb-3">
            <div class="form-group">
                <label for="productNameInput">Product Name</label>
                <input type="text" class="form-control" id="productNameInput" placeholder="Enter Name">
            </div>
            <div class="form-row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="brandInput">Brand</label>
                        <input type="text" class="form-control" id="brandInput" placeholder="Enter Brand">
                    </div>
                    <div class="form-group">
                        <label for="categoryInput">Category</label>
                        <select class="custom-select" id="categoryInput">
                            <option value="0" selected>Select Category</option>
                            <option value="Keyboard">Keyboard</option>
                            <option value="Mouse">Mouse</option>
                            <option value="Gamepad">Gamepad</option>
                            <option value="Headset">Headset</option>
                            <option value="Accessories">Accessories</option>
                            <option value="Miscellaneous">Miscellaneous</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="priceInput">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control" id="priceInput" placeholder="Enter Price">
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="descriptionInput">Product Description (Summary)</label>
                    <textarea class="form-control" id="descriptionInput" rows="8" placeholder="Enter Description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="detailsInput">Product Details</label>
                <textarea class="form-control" id="detailsInput" rows="8" placeholder="Enter Details"></textarea>
            </div>
            <div class="form-group">
                <label for="specificationsInput">Product Specifications</label>
                <textarea class="form-control" id="specificationsInput" rows="8" placeholder="Enter Specifications"></textarea>
            </div>
            <div class="form-group">
                <label for="imagesInput">Product Image</label>
                <input type="text" class="form-control" id="imagesInput" placeholder="Enter Image URL">
            </div>
            <button type="button" class="btn btn-primary mt-2" onclick="addProduct()">Add Product</button>
            <a href="product_manager.html">
                <button type="button" class="btn btn-danger mt-2">Cancel</button>
            </a>
        </form>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>