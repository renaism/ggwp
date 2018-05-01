function showOverview() {
    $("#overviewTab").addClass("active");
    $("#specificationsTab").removeClass("active");
    $("#specifications").hide();
    $("#overview").show();
    $("#overview").ready();
}

function showSpecifications() {
    $("#specificationsTab").addClass("active");
    $("#overviewTab").removeClass("active");
    $("#overview").hide();
    $("#specifications").show();
}

$("document").ready(function () {
    $("#specifications").hide();
    loadProducts();
});