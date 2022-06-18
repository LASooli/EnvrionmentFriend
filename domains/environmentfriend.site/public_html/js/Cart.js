var Cart = (function() {
    "use strict";
    var pub = {};

    function addToCart() {
        console.log("addtoCart");
        var itemList, newItem;
        itemList = window.sessionStorage.getItem("cart");
        if (itemList) {
            itemList = JSON.parse(itemList);
        } else {
            itemList = [];
        }
        newItem = {};
        /* jshint -W040 */
        newItem.title = $(this).parent().find(".itemTitle").html();
        console.log(newItem.title);
        newItem.price = $(this).parent().find(".price").html();
        /* jshint +W040 */
        itemList.push(newItem);
        window.sessionStorage.setItem("cart", JSON.stringify(itemList));
    }

    pub.setup = function() {
        $(".buy").click(addToCart);
    }

    return pub;
})();

$(document).ready(Cart.setup);