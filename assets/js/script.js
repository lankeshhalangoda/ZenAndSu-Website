function history_back1() {
  history.back();
}

function goToAddProduct() {
  window.location = "add_product.php";
}

function goToMyProducts() {
  window.location = "my_products.php";
}

function goToAddManageOrders() {
  window.location = "manage_orders.php";
}

// admin signin
function admin_signin() {
  var e = document.getElementById("e").value;
  var p = document.getElementById("p").value;

  var f = new FormData();
  f.append("e", e);
  f.append("p", p);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == 1) {
        window.location = "admin.php";
      } else {
        Snackbar.show({
          pos: "bottom-right",
          text: t,
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      }
    }
  };
  r.open("POST", "adminVerificationProcess.php", true);
  r.send(f);
}

// my product [filters]
function addfilters(x) {
  var search = document.getElementById("my_product_filter");
  var page = x;
  var select = document.getElementById("my_product_select");

  var form = new FormData();
  form.append("search", search.value);
  form.append("select", select.value);
  form.append("page", page);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      if (text == 10) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Select at least One filter option",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else {
        // alert(text);
        var filterproducts = document.getElementById("filter_div1");
        filterproducts.innerHTML = "";
        filterproducts.innerHTML = text;
        document.getElementById("sp").style.display = "none";
      }
    }
  };
  r.open("POST", "my_product_filterProcess.php", true);
  r.send(form);
}

// desctive product
function product_deactive(id) {
  var id = id;
  var d = document.getElementById("deactive_product" + id);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == 2) {
        d.innerHTML = "Activate Your Product";
        d.classList = "btn btn-warning col-12 mt-2";
        // s = document.getElementById("check").checked = "checked";
        // alert(s);

        // statustext.innerHTML = "Make Your Product Active";
      } else if (t == 1) {
        d.innerHTML = "Deactivate Your Product";
        d.classList = "btn btn-danger col-12 mt-2";
        // statustext.innerHTML = "Make Your Product Deactive";
      } else {
        alert(t);
      }
    }
  };
  r.open("GET", "myProductstatusChangeProcess.php?p=" + id, true);
  r.send();
}

// Add To WatchList

function addToWishList(id) {
  var pid = id;
  // alert(pid);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == 0) {
        window.location = "login.php";
      } else if (t == 1) {
        window.location = "wishlist.php";
      } else if (t == 5) {
        alert("Please Sign in");
        window.location = "login.php";
      } else {
        // alert(t);
        Snackbar.show({
          pos: "bottom-right",
          text: t,
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      }
    }
  };
  r.open("GET", "addToWishlistProcess.php?id=" + pid, true);
  r.send();
}

// delete from wishlist
function deleteFromWatchlist(id) {
  var wid = id;
  // alert(wid);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var t = request.responseText;
      if (t == 1) {
        window.location = "wishlist.php";
      }
    }
  };
  request.open("GET", "removeWatchlistItemProcess.php?id=" + wid, true);
  request.send();
}

// Add To Cart
function addToCart(id) {
  var qtytxt = document.getElementById("qtyinput" + id).value;
  var pid = id;

  // alert(qtytxt);
  // alert(pid);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == 1) {
        // alert("added");
        window.location = "cart.php";
      } else if (t == 2) {
        alert("Please Sign in");
        window.location = "login.php";
      } else {
        // alert(t);
        Snackbar.show({
          pos: "bottom-right",
          text: t,
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      }
    }
  };
  r.open("GET", "addToCartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
  r.send();
}

// qty increase
function qty_inc() {
  var input = document.getElementById("qtyinput");
  var qty_eka = document.getElementById("items_left").innerHTML;
  var pqty = qty_eka;

  // alert(pqty);

  if (input.value < parseInt(pqty)) {
    var newValue = parseInt(input.value) + 1;
    input.value = newValue.toString();
  } else if (input.value > parseInt(pqty)) {
    input = document.getElementById("qtyinput").value = "1";
  } else {
    // alert("Maximum quantity count has been achieved");
    Snackbar.show({
      pos: "bottom-right",
      text: "Maximum quantity count has been achieved",
      actionTextColor: "#17D1EE",
      customClass: "snack",
    });
  }
}
/* Qty Decrease */

function qty_dec() {
  var input = document.getElementById("qtyinput");

  if (input.value > 1) {
    var newValue = parseInt(input.value) - 1;
    input.value = newValue.toString();
  } else {
    // alert("Minimum quantity count has been achieved");
    Snackbar.show({
      pos: "bottom-right",
      text: "Minimum quantity count has been achieved",
      actionTextColor: "#17D1EE",
      customClass: "snack",
    });
  }
}

window.onload = disble_product_size;

function disble_product_size() {
  document.getElementById("size_id").setAttribute("disabled", "disabled");
  // document.getElementById("coupon_code").setAttribute("disabled", "disabled");
}

// auto_size
function auto_size() {
  document.getElementById("qty_div").innerHTML = "Please select both";
  input = document.getElementById("qtyinput").value = "1";

  var id = document.getElementById("color_set").value;
  // alert(id);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      document.getElementById("size_id").removeAttribute("disabled");
      document.getElementById("size_id").selectedIndex = text;

      var old_brand = document.getElementById("size_id");
      old_brand.style.display = "none";
      document.getElementById("size_div").innerHTML = text;

      // alert(text);
    }
  };

  r.open("GET", "size_set_auto.php?id=" + id, true);
  r.send();
}

//auto_qty
function auto_qty(sid) {
  input = document.getElementById("qtyinput").value = "1";

  var size = document.getElementById("size_id").value;
  var sid = sid;
  // alert(sid);
  // alert(size);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      // alert(text);
      document.getElementById("qty_div").innerHTML = text;
      var old_text = document.getElementById("qty_set");
      old_text.style.display = "none";

      // alert(text);
    }
  };

  r.open("GET", "qty_set_auto.php?size=" + size + "&sid=" + sid, true);
  r.send();
}

//couponf
function couponf(id) {
  c_input = document.getElementById("coupon_id").value;
  var pid = id;

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      if (text == 1) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Success !!",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 2) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Incorrect coupon code",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else {
        Snackbar.show({
          pos: "bottom-right",
          text: text,
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      }
    }
  };

  r.open(
    "GET",
    "coupon_checking_process.php?c_input=" + c_input + "&pid=" + pid,
    true
  );
  r.send();
}

// Buy now

function paynow(pid) {
  var qty = document.getElementById("qtyinput").value;
  var coupon = document.getElementById("coupon_id").value;
  var size_id = document.getElementById("size_id").value;
  var color_set = document.getElementById("color_set").value;
  // alert(coupon);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      // alert(t);

      if (t == 0) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Please select both",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (t == 1) {
        alert("Please Sign in First");
        window.location = "login.php";
      } else if (t == 2) {
        alert("Please Update Your Profile First");
        window.location = "my_account.php";
      } else {
        var obj = JSON.parse(t);

        var orderID = obj["id"];
        var item = obj["item"];
        var amount = obj["amount"];
        var fname = obj["fname"];
        var lname = obj["lname"];
        var email = obj["email"];
        var mobile = obj["mobile"];
        var address = obj["address"];
        var city = obj["city"];
        var country = obj["country"];
        var delivery = obj["delivery"];

        var size = obj["size"];
        var color = obj["color"];
        var price = obj["price"];
        var stock_id = obj["stock_id"];

        // alert(color);
        // alert(size);

        // OnePay(orderID, item, amount, fname, lname, email, mobile, address, city, country, delivery, qty);

        window.location.href =
          "payment_method.php?orderID=" +
          orderID +
          "&item=" +
          item +
          "&qty=" +
          qty +
          "&amount=" +
          amount +
          "&fname=" +
          fname +
          "&lname=" +
          lname +
          "&email=" +
          email +
          "&mobile=" +
          mobile +
          "&address=" +
          address +
          "&city=" +
          city +
          "&country=" +
          country +
          "&delivery=" +
          delivery +
          "&size=" +
          size +
          "&color=" +
          color +
          "&price=" +
          price +
          "&stock_id=" +
          stock_id;
      }
    }
  };
  r.open(
    "GET",
    "buyNowProcess.php?pid=" +
      pid +
      "&qty=" +
      qty +
      "&coupon=" +
      coupon +
      "&size_id=" +
      size_id +
      "&color_set=" +
      color_set,
    true
  );
  r.send();
}

// function OnePay(
//   orderID,
//   item,
//   amount,
//   fname,
//   lname,
//   email,
//   mobile,
//   address,
//   city,
//   country,
//   delivery,
//   qty
// ) {
//   window.location.href =
//     "payment_method.php?orderID=" + orderID + "&item=" + item;

//   var orderID = orderID;
//   var item = item;
//   var amount = amount;
//   var fname = fname;
//   var lname = lname;
//   var email = email;
//   var mobile = mobile;
//   var address = address;
//   var city = city;
//   var country = country;
//   var delivery = delivery;
//   var qty = qty;

//   var f = new FormData();
//   f.append("orderID", orderID);
//   f.append("item", item);
//   f.append("amount", amount);
//   f.append("fname", fname);
//   f.append("lname", lname);
//   f.append("email", email);
//   f.append("mobile", mobile);
//   f.append("address", address);
//   f.append("city", city);
//   f.append("country", country);
//   f.append("qty", qty);

//   var r = new XMLHttpRequest();
//   r.onreadystatechange = function () {
//     if (r.readyState == 4) {
//       var text = r.responseText;

//       alert(text);
//     }
//   };

//   r.open("POST", "OnePay.php", true);
//   r.send(f);
// }

// add to cart
function addToCart1(pid) {
  var qty = document.getElementById("qtyinput").value;
  var coupon = document.getElementById("coupon_id").value;
  var size_id = document.getElementById("size_id").value;
  var color_set = document.getElementById("color_set").value;
  // alert(coupon);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      // alert(t);

      if (t == 0) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Please select both",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (t == 1) {
        alert("Please Sign in First");
        window.location = "login.php";
      } else if (t == 2) {
        alert("Please Update Your Profile First");
        window.location = "my_account.php";
      } else {
        var obj = JSON.parse(t);

        var orderID = obj["id"];
        var item = obj["item"];
        var amount = obj["amount"];
        var fname = obj["fname"];
        var lname = obj["lname"];
        var email = obj["email"];
        var mobile = obj["mobile"];
        var address = obj["address"];
        var city = obj["city"];
        var country = obj["country"];
        var delivery = obj["delivery"];

        var size = obj["size"];
        var color = obj["color"];
        var price = obj["price"];
        var stock_id = obj["stock_id"];

        // alert(color);
        // alert("cart");

        add_to_cart_process(pid, color, size, qty, price);

        // OnePay(orderID, item, amount, fname, lname, email, mobile, address, city, country, delivery, qty);

        // window.location.href = "payment_method.php?orderID=" + orderID + "&item=" + item + "&qty=" + qty +
        //     "&amount=" + amount + "&fname=" + fname + "&lname=" + lname + "&email=" + email + "&mobile=" + mobile +
        //     "&address=" + address + "&city=" + city + "&country=" + country + "&delivery=" + delivery + "&size=" + size +
        //     "&color=" + color + "&price=" + price + "&stock_id=" + stock_id;
      }
    }
  };
  r.open(
    "GET",
    "buyNowProcess.php?pid=" +
      pid +
      "&qty=" +
      qty +
      "&coupon=" +
      coupon +
      "&size_id=" +
      size_id +
      "&color_set=" +
      color_set,
    true
  );
  r.send();
}


function add_to_cart_process(pid, color, size, qty, price) {
  var pid = pid;
  var color = color;
  var size = size;
  var qty = qty;
  var price = price;

  // alert(pid);
  // alert(color);
  // alert(size);
  // alert(qty);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == 0) {
        Snackbar.show({
          pos: "bottom-right",
          text: t,
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (t == 1) {
        // alert("added");
        window.location = "cart.php";
      } else if (t == 2) {
        alert("Please Sign in");
        window.location = "login.php";
      } else {
        // alert(t);
        Snackbar.show({
          pos: "bottom-right",
          text: t,
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      }
    }
  };
  r.open(
    "GET",
    "addToCartProcess.php?pid=" +
      pid +
      "&txt=" +
      qty +
      "&color=" +
      color +
      "&size=" +
      size +
      "&price=" +
      price,
    true
  );
  r.send();
}

function order_now() {
  // alert("hi");
  var m = document.getElementById("order_now_id");
  bm = new bootstrap.Modal(m);
  bm.show();
}

//cash_on_deliver
function cash_on_deliver_invoice(
  order_id,
  stock_id,
  color,
  size,
  qty,
  price,
  delivery,
  total,
  price_with_qty
) {
  bm.hide();

  var order_id = order_id;
  var stock_id = stock_id;
  var color = color;
  var size = size;
  var qty = qty;
  var price = price;
  var delivery = delivery;
  var total = total;
  var price_with_qty = price_with_qty;

  // alert(order_id);
  // alert(stock_id);
  // alert(color);
  // alert(size);
  // alert(qty);
  // alert(total);

  var f = new FormData();
  f.append("order_id", order_id);
  f.append("stock_id", stock_id);
  f.append("color", color);
  f.append("size", size);
  f.append("qty", qty);
  f.append("total", total);
  f.append("unit_price", price);
  f.append("price_with_qty", price_with_qty);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == 1) {
        // alert(t);
        window.location =
          "invoice.php?id=" +
          order_id +
          "&unit_price=" +
          price +
          "&delivery=" +
          delivery;
        // alert(t);
      }
      // alert(t);
    }
  };
  r.open("POST", "saveInvoice.php", true);
  r.send(f);
}

// Cart .......................
function deletefromCart(id) {
  var cid = id;

  var rq = new XMLHttpRequest();

  rq.onreadystatechange = function () {
    if (rq.readyState == 4) {
      var tx = rq.responseText;
      // alert(tx);

      // if (tx == 1) {
      window.location = "cart.php";

      // }
    }
  };

  rq.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
  rq.send();
}

function cartupdate(id) {
  var qty = document.getElementById("qtyup" + id).value;
  var size = document.getElementById("size_id" + id).value;
  var color = document.getElementById("color_set" + id).value;

  var f = new FormData();
  f.append("id", id);
  f.append("qty", qty);
  f.append("size", size);
  f.append("color", color);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "n") {
        alert("Enter a valid quantity");
        window.location = "cart.php";
      } else if (t == "cf") {
        alert("Cart is full");
      }
    }
  };

  r.open("POST", "cartupdate.php", true);
  r.send(f);
}

function autoprice(id) {
  var price = document.getElementById("price" + id);
  var tag = document.getElementById("sub");
  var total = document.getElementById("tot");

  var f = new FormData();
  f.append("id", id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      var obj = JSON.parse(t);

      price.innerHTML = "Rs." + obj["total"] + ".00";
      tag.innerHTML = "Rs." + obj["sub"] + ".00";
      total.innerHTML = "Rs." + obj["totupdate"] + ".00";
    }
  };

  r.open("POST", "autocartpriceupdate.php", true);
  r.send(f);
}

function checkout() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      var obj = JSON.parse(text);

      var mail = obj["email"];
      var amount = obj["amount"];

      if (text == "1") {
        alert("Please Sign In First");
        window.location = "Signin_and_signup.php";
      } else if (text == "2") {
        alert("Please Update your Profile First");
        window.location = "account.php";
      } else {
        // Called when user completed the payment. It can be a successful payment or failure
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);

          savefullInvoice(orderId);
          //Note: validate the payment and show success or failure page to the customer
        };

        // Called when user closes the payment without completing
        payhere.onDismissed = function onDismissed() {
          //Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Called when error happens when initializing payment such as invalid parameters
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: "1219168", // Replace your Merchant ID
          return_url: "http://localhost/mintstore/cart.php", // Important
          cancel_url: "http://localhost/mintstore/cart.php", // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: obj["amount"] + ".00",
          currency: "LKR",
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          phone: obj["mobile"],
          address: obj["address"],
          city: obj["city"],
          country: "Sri Lanka",
          delivery_address: obj["address"],
          delivery_city: obj["city"],
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        // document.getElementById("payhere-payment").onclick = function (e) {
        payhere.startPayment(payment);
        // };
      }
    }
  };
  r.open("GET", "checkout.php", true);
  r.send();
}

function savefullInvoice(orderId, delivery) {
  var orderid = orderId;

  var f = new FormData();
  f.append("oid", orderid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == 2) {
        alert("No Quantity Available");
      } else {
        window.location =
          "invoice2.php?id=" + orderid + "&delivery=" + delivery;
      }
    }
  };

  r.open("POST", "checkoutinvoiceprocess.php", true);
  r.send(f);
}

var price1 = 10;
var price2 = 1000;

(function ($) {
  "use strict";

  /*****************************
   * Commons Variables
   *****************************/
  var $window = $(window),
    $body = $("body");

  /****************************
   * Sticky Menu
   *****************************/
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $(".sticky-header").removeClass("sticky");
    } else {
      $(".sticky-header").addClass("sticky");
    }
  });

  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $(".seperate-sticky-bar").removeClass("sticky");
    } else {
      $(".seperate-sticky-bar").addClass("sticky");
    }
  });

  /************************************************
   * Modal Search
   ***********************************************/
  $('a[href="#search"]').on("click", function (event) {
    event.preventDefault();
    $("#search").addClass("open");
    $('#search > form > input[type="search"]').focus();
  });

  $("#search, #search button.close").on("click", function (event) {
    if (event.target.className == "close") {
      $(this).removeClass("open");
    }
  });

  /*****************************
   * Off Canvas Function
   *****************************/
  (function () {
    var $offCanvasToggle = $(".offcanvas-toggle"),
      $offCanvas = $(".offcanvas"),
      $offCanvasOverlay = $(".offcanvas-overlay"),
      $mobileMenuToggle = $(".mobile-menu-toggle");
    $offCanvasToggle.on("click", function (e) {
      e.preventDefault();
      var $this = $(this),
        $target = $this.attr("href");
      $body.addClass("offcanvas-open");
      $($target).addClass("offcanvas-open");
      $offCanvasOverlay.fadeIn();
      if ($this.parent().hasClass("mobile-menu-toggle")) {
        $this.addClass("close");
      }
    });
    $(".offcanvas-close, .offcanvas-overlay").on("click", function (e) {
      e.preventDefault();
      $body.removeClass("offcanvas-open");
      $offCanvas.removeClass("offcanvas-open");
      $offCanvasOverlay.fadeOut();
      $mobileMenuToggle.find("a").removeClass("close");
    });
  })();

  /**************************
   * Offcanvas: Menu Content
   **************************/
  function mobileOffCanvasMenu() {
    var $offCanvasNav = $(".offcanvas-menu"),
      $offCanvasNavSubMenu = $offCanvasNav.find(".mobile-sub-menu");

    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offCanvasNavSubMenu
      .parent()
      .prepend('<div class="offcanvas-menu-expand"></div>');

    /*Category Sub Menu Toggle*/
    $offCanvasNav.on("click", "li a, .offcanvas-menu-expand", function (e) {
      var $this = $(this);
      if (
        $this.attr("href") === "#" ||
        $this.hasClass("offcanvas-menu-expand")
      ) {
        e.preventDefault();
        if ($this.siblings("ul:visible").length) {
          $this.parent("li").removeClass("active");
          $this.siblings("ul").slideUp();
          $this.parent("li").find("li").removeClass("active");
          $this.parent("li").find("ul:visible").slideUp();
        } else {
          $this.parent("li").addClass("active");
          $this
            .closest("li")
            .siblings("li")
            .removeClass("active")
            .find("li")
            .removeClass("active");
          $this.closest("li").siblings("li").find("ul:visible").slideUp();
          $this.siblings("ul").slideDown();
        }
      }
    });
  }
  mobileOffCanvasMenu();

  /************************************************
   * Nice Select
   ***********************************************/
  // $('select').niceSelect();

  /*************************
   *   Hero Slider Active
   **************************/
  var heroSlider = new Swiper(".hero-slider-active.swiper-container", {
    slidesPerView: 1,
    effect: "fade",
    speed: 1500,
    watchSlidesProgress: true,
    loop: true,
    autoplay: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  /****************************************
   *   Product Slider Active - 4 Grid 2 Rows
   *****************************************/
  var productSlider4grid2row = new Swiper(
    ".product-default-slider-4grid-2row.swiper-container",
    {
      slidesPerView: 4,
      spaceBetween: 30,
      speed: 1500,
      slidesPerColumn: 2,
      slidesPerColumnFill: "row",

      navigation: {
        nextEl: ".product-slider-default-2rows .swiper-button-next",
        prevEl: ".product-slider-default-2rows .swiper-button-prev",
      },

      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        576: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
      },
    }
  );

  /*********************************************
   *   Product Slider Active - 4 Grid Single Rows
   **********************************************/
  var productSlider4grid1row = new Swiper(
    ".product-default-slider-4grid-1row.swiper-container",
    {
      slidesPerView: 4,
      spaceBetween: 30,
      speed: 1500,

      navigation: {
        nextEl: ".product-slider-default-1row .swiper-button-next",
        prevEl: ".product-slider-default-1row .swiper-button-prev",
      },

      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        576: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
      },
    }
  );

  /*********************************************
   *   Product Slider Active - 4 Grid Single 3Rows
   **********************************************/
  var productSliderListview4grid3row = new Swiper(
    ".product-listview-slider-4grid-3rows.swiper-container",
    {
      slidesPerView: 4,
      spaceBetween: 30,
      speed: 1500,
      slidesPerColumn: 3,
      slidesPerColumnFill: "row",

      navigation: {
        nextEl: ".product-list-slider-3rows .swiper-button-next",
        prevEl: ".product-list-slider-3rows .swiper-button-prev",
      },

      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
      },
    }
  );

  /*********************************************
   *   Blog Slider Active - 3 Grid Single Rows
   **********************************************/
  var blogSlider = new Swiper(".blog-slider.swiper-container", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 1500,

    navigation: {
      nextEl: ".blog-default-slider .swiper-button-next",
      prevEl: ".blog-default-slider .swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
    },
  });

  /*********************************************
   *   Company Logo Slider Active - 7 Grid Single Rows
   **********************************************/
  var companyLogoSlider = new Swiper(".company-logo-slider.swiper-container", {
    slidesPerView: 7,
    speed: 1500,

    navigation: {
      nextEl: ".company-logo-slider .swiper-button-next",
      prevEl: ".company-logo-slider .swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      480: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 7,
      },
    },
  });

  /********************************
   *  Product Gallery - Horizontal View
   **********************************/
  var galleryThumbsHorizontal = new Swiper(
    ".product-image-thumb-horizontal.swiper-container",
    {
      loop: true,
      speed: 1000,
      spaceBetween: 25,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    }
  );

  var gallerylargeHorizonatal = new Swiper(
    ".product-large-image-horaizontal.swiper-container",
    {
      slidesPerView: 1,
      speed: 1500,
      thumbs: {
        swiper: galleryThumbsHorizontal,
      },
    }
  );

  /********************************
   *  Product Gallery - Vertical View
   **********************************/
  var galleryThumbsvartical = new Swiper(
    ".product-image-thumb-vartical.swiper-container",
    {
      direction: "vertical",
      centeredSlidesBounds: true,
      slidesPerView: 4,
      watchOverflow: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      spaceBetween: 25,
      freeMode: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    }
  );

  var gallerylargeVartical = new Swiper(
    ".product-large-image-vartical.swiper-container",
    {
      slidesPerView: 1,
      speed: 1500,
      thumbs: {
        swiper: galleryThumbsvartical,
      },
    }
  );

  /********************************
   *  Product Gallery - Single Slide View
   * *********************************/
  var singleSlide = new Swiper(".product-image-single-slide.swiper-container", {
    loop: true,
    speed: 1000,
    spaceBetween: 25,
    slidesPerView: 4,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });

  /******************************************************
   * Quickview Product Gallery - Horizontal
   ******************************************************/
  var modalGalleryThumbs = new Swiper(".modal-product-image-thumb", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  var modalGalleryTop = new Swiper(".modal-product-image-large", {
    thumbs: {
      swiper: modalGalleryThumbs,
    },
  });

  /********************************
   * Blog List Slider - Single Slide
   * *********************************/
  var blogListSLider = new Swiper(".blog-list-slider.swiper-container", {
    loop: true,
    speed: 1000,
    slidesPerView: 1,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  /********************************
   *  Product Gallery - Image Zoom
   **********************************/
  $(".zoom-image-hover").zoom();

  /************************************************
   * Price Slider
   ***********************************************/
  $("#slider-range").slider({
    range: true,
    min: 10,
    max: 2000,
    values: [price1, price2],

    slide: function (event, ui) {
      $("#amount").val("LKR " + ui.values[0] + " - LKR " + ui.values[1]);

      price1 = ui.values[0];
      price2 = ui.values[1];

      advancedSearch(0);
    },
  });
  $("#amount").val(
    "LKR " +
      $("#slider-range").slider("values", 0) +
      " - LKR " +
      $("#slider-range").slider("values", 1)
  );

  /************************************************
   * Animate on Scroll
   ***********************************************/
  AOS.init({
    duration: 1000,
    once: true,
    easing: "ease",
  });
  window.addEventListener("load", AOS.refresh);

  /************************************************
   * Video  Popup
   ***********************************************/
  $(".video-play-btn").venobox();

  /************************************************
   * Scroll Top
   ***********************************************/
  $("body").materialScrollTop();
})(jQuery);

//Advanced Search

function advancedSearch(x) {
  var s = document.getElementById("s1").value;
  var ca = document.getElementById("ca1").value;
  var ty = document.getElementById("ty").value;
  var clr = document.getElementById("clr").value;
  var siz = document.getElementById("siz").value;
  var sort = document.getElementById("sort").value;

  var form = new FormData();
  form.append("page", x);
  form.append("s", s);
  form.append("c", ca);
  form.append("ty", ty);
  form.append("clr", clr);
  form.append("siz", siz);

  form.append("prif", price1);
  form.append("prit", price2);
  form.append("sort", sort);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      //
      document.getElementById("filter").innerHTML = text;
    }
  };
  r.open("POST", "advancedSearchpro.php", true);
  r.send(form);
}

//Advanced Search end

//change status
function changeStatus(id) {
  // alert(id);

  var invoiceid = id;
  var statuslabel = document.getElementById("checklabel" + invoiceid);
  // var statustext = document.getElementById("statustext" + productid);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      // alert(t);
      if (t == 2) {
        statuslabel.innerHTML = "Ready To Ship";
        // s = document.getElementById("check").checked = "checked";
        // alert(t);

        // statustext.innerHTML = "Make Your Product Active";
      } else if (t == 1) {
        statuslabel.innerHTML = "Active";
        // statustext.innerHTML = "Make Your Product Deactive";
        // alert(t);
      }
    }
  };
  r.open("GET", "statusChangeProcess.php?p=" + invoiceid, true);
  r.send();
}

function savedeliveryinvoice(orderId, delivery) {
  var orderid = orderId;

  var f = new FormData();
  f.append("oid", orderid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      alert(t);
      if (t == 2) {
        alert("No Quantity Available");
      } else {
        window.location =
          "invoice2.php?id=" + orderid + "&delivery=" + delivery;
      }
    }
  };

  r.open("POST", "CartDeliveryInvoiceProcess.php", true);
  r.send(f);
}

function deliveryfull() {
  bm.hide();
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      var obj = JSON.parse(text);

      var orderId = obj["id"];
      var delivery = obj["delivery"];

      if (text == "1") {
        alert("Please Sign In First");
        window.location = "Signin_and_signup.php";
      } else if (text == "2") {
        alert("Please Update your Profile First");
        window.location = "account.php";
      } else {
        alert(orderId);
        alert(delivery);

        savedeliveryinvoice(orderId, delivery);
      }
    }
  };
  r.open("GET", "deliveryfullcheck.php", true);
  r.send();
}

function order_now2() {
  // alert("hi");
  var m = document.getElementById("order_now_id");
  bm = new bootstrap.Modal(m);
  bm.show();
}

//payments

// function itembuy(id) {
//   var modal = document.getElementById("wd");
//   var inner = document.getElementById("inner2");
//   var qty = document.getElementById("qtyinput" + id).value;
//   var color = document.getElementById("color" + id).value;
//   var size = document.getElementById("size" + id).value;
//   var price = document.getElementById("price" + id).value;

//   var r = new XMLHttpRequest();

//   r.onreadystatechange = function () {
//     if (r.readyState == 4) {
//       var t = r.responseText;

//       alert(t);

//       var obj = JSON.parse(t);

//       var orderID = obj["id"];
//       var item = obj["item"];
//       var amount = obj["amount"];
//       var fname = obj["fname"];
//       var lname = obj["lname"];
//       var email = obj["email"];
//       var mobile = obj["mobile"];
//       var address = obj["address"];
//       var city = obj["city"];
//       var country = obj["country"];
//       var delivery = obj["delivery"];

//       var size = obj["size"];
//       var color = obj["color"];
//       var price = obj["price"];
//       var stock_id = obj["stock_id"];

//       var f = new FormData();
//       f.append("oid", orderID);
//       f.append("fname", fname);
//       f.append("lname", lname);
//       f.append("email", email);
//       f.append("mobile", mobile);
//       f.append("amount", amount);

//       if (t == "1") {
//         inner.innerHTML = "Please Sign In First";
//         k = new bootstrap.Modal(modal);
//         k.show();
//         // window.location = "Signin_and_signup.php";
//       } else if (t == "2") {
//         alert("Please Update your Profile First");
//         window.location = "account.php";
//       } else if (t == "3") {
//         alert("Please enter a valid quantity");
//       } else if (t == "4") {
//         alert("Please enter a valid quantity");
//       } else {
        
//       }
//     }
//   };
//   r.open(
//     "GET",
//     "itembuy.php?id=" +
//       id +
//       "&qty=" +
//       qty +
//       "&size=" +
//       size +
//       "&color=" +
//       color +
//       "&price=" +
//       price,
//     true
//   );
//   r.send();
// }

function savedeliveryinvoice(orderId, delivery) {
  var orderid = orderId;
  var delivery = delivery;

  alert("Your order is processing please wait 10 seconds");

  var f = new FormData();
  f.append("oid", orderid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t % 2 == 0) {
        alert("No Quantity Available");
        window.location = "index.php";
      } else if (t == 0) {
        alert("Error");
      } else {
        alert("Order Placed Successfully");
        window.location =
          "invoice2.php?id=" + orderid + "&delivery=" + delivery;
      }
    }
  };

  r.open("POST", "CartDeliveryInvoiceProcess.php", true);
  r.send(f);
}

window.onload = display_none_img;

function display_none_img() {
  document.getElementById("small_photo_set1").style.display = "none";
  document.getElementById("small_photo_set2").style.display = "none";
  document.getElementById("smallphoto_set1").style.display = "none";
  document.getElementById("smallphoto_set2").style.display = "none";
}

function auto_img_set(pid) {
  var stock_id = document.getElementById("color_set").value;
  var pid = pid;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      if (text == 1) {
        alert(text);
      } else {
        var obj = JSON.parse(text);

        var thumbnail_set = obj["thumbnail"];
        var product_img1 = obj["product_img1"];
        var product_img2 = obj["product_img2"];

        // alert(text);

        alert(product_img1);
        alert(product_img2);

        document.getElementById("thumbnail_photo1").src = "";
        document.getElementById("thumbnail_photo1").src = product_img1;

        // document.getElementById("small_photo1").style.display = "none";
        document.getElementById("small_photo_set1").src = product_img1;

        // document.getElementById("small_photo2").style.display = "none";
        document.getElementById("small_photo_set2").src = product_img2;

        // document.getElementById("smallphoto1").style.display = "none";
        document.getElementById("smallphoto1").src = product_img1;

        // document.getElementById("smallphoto2").style.display = "none";
        document.getElementById("smallphoto2").src = product_img2;
      }
    }
  };
  r.open("GET", "auto_img_set.php?stock_id=" + stock_id + "&pid=" + pid, true);
  r.send();
}
