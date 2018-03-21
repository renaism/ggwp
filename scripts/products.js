var productsData = [];

//Source: https://stackoverflow.com/questions/11582512/how-to-get-url-parameters-with-javascript/11582513#11582513
function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}

function refreshProducts(data) {
    $("#productsRow").html("");
    console.log(data);
    var productListHTML = "";
    for (let i = 0; i < data.length; i++) {
        let name = data[i].name;
        let imglink = "";
        if (data[i].category == "Mouse") {
            imglink = "products-img/mouse.png";
        }
        else if (data[i].category == "Keyboard") {
            imglink = "products-img/keyboard.png";
        }
        else if (data[i].category == "Headset") {
            imglink = "products-img/headset.png";
        }
        else if (data[i].category == "Gamepad") {
            imglink = "products-img/gamepad.png";
        }
        else if (data[i].category == "Accessories") {
            imglink = "products-img/acc.png";
        }
        else {
            imglink = "products-img/misc.png";
        }
        productListHTML
        productListHTML +=
            '<div class="col-sm-4 "><div class="card carding zoom"><div class="card-body">' +
            '<img class="card-img-top" src="' + imglink + '" alt="Card image cap"></div>' +
            '<a href="' + 'detail_product.html?id=' + data[i].id + '" class="card-link cardtext">' + data[i].name + '</a>' +
            '<div class="item-price">Rp. ' + $.number(data[i].price, 0, ',', '.') + ',-</div></div></div>';
    }
    $("#productsRow").html(productListHTML);
}

function filter(cat) {
    var filteredProductsData = productsData
    if (cat != "none") {
        filteredProductsData = productsData.filter(function (element) {
            return element.category == cat;
        });
    }
    refreshProducts(filteredProductsData);
}

function getProducts() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "http://localhost/ggwp/products_data.json",
        success: function (data) {
            console.log(data);
            productsData = data;
            var cat = getURLParameter("category");
            console.log(cat);
            if (cat == undefined) {
                cat = "none";
            }
            filter(cat);
            //refreshProducts(productsData);
        },
        error: function (result) { console.log("Error in loading JSON file") }
    });
}

$("document").ready(function () {
    getProducts();
});