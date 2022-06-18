/**
 * Ajax for validating code
 *
 * Created by: Nathan Rawiri, 16/09/2020
 */

/**
 * Module pattern for GetCart2 function
 */
var GetCart2 = (function() {
    "use strict";
    var pub = {};


    /**
     * Setup Function
     *
     */
    pub.setup = function() {
        var cartData = window.sessionStorage.getItem("cart");
        console.log(cartData);

        $.ajax({

            type: "POST",
            url: '../setSessionPrice.php', cache: false,
            data: cartData,
            datatype: 'JSON',
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                console.log("cart posted via getCart2");
                alert("cart posted via getCart2");
            },
            error: function (data) {
                alert("Ajax Failed");
            }

        });
    }
    return pub;

}());

$(document).ready(GetCart2.setup);