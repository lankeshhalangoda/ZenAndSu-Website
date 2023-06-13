// function updateProfile() {
//     var fname = document.getElementById("fname");
//     var lname = document.getElementById("lname");
//     var mobile = document.getElementById("mobile");
//     var line1 = document.getElementById("line1");
//     var line2 = document.getElementById("line2");
//     var country = document.getElementById("country");
//     var province = document.getElementById("province");
//     var district = document.getElementById("district");
//     var city = document.getElementById("city");
//     var postalcode = document.getElementById("postalcode");
//     var inner = document.getElementById("inner");
//     var model = document.getElementById("md");

//     var f = new FormData();
//     f.append("f", fname.value);
//     f.append("l", lname.value);
//     f.append("m", mobile.value);
//     f.append("a1", line1.value);
//     f.append("a2", line2.value);
//     f.append("co", country.value);
//     f.append("p", province.value);
//     f.append("d", district.value);
//     f.append("c", city.value);
//     f.append("pcode", postalcode.value);

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function () {
//       if (r.readyState == 4) {
//         var t = r.responseText;
//         if (t == "12") {
//           alert("Profile Updated Successfully");


//         } else if (t == "2") {
//             alert("User Details Updated");


//         } else if (t == "1") {
//             alert("User Details Updated");


//         }
//       }
//     };

//     r.open("POST", "updateProfileProcess.php", true);
//     r.send(f);

//     // alert(fname.value);
//     // alert(lname.value);
//     // alert(mobile.value);
//     // alert(line1.value);
//     // alert(line2.value);
//     // alert(city.value);
//     // alert(img.value);
//   }

function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    // var country = document.getElementById("country");
    // var province = document.getElementById("province");
    // var district = document.getElementById("district");
    // var city = document.getElementById("city");
    // var postalcode = document.getElementById("postalcode");


    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("a1", line1.value);
    f.append("a2", line2.value);
    // f.append("co", country.value);
    // f.append("p", province.value);
    // f.append("d", district.value);
    // f.append("c", city.value);
    // f.append("pcode", postalcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                // alert("New Details Added..");
                // Snackbar.show({
                //     pos: 'bottom-right',
                //     text: "New Details Added..",
                //     actionTextColor: '#17D1EE',
                //     customClass: 'snack'
                // });
                window.location = "my_account.php";
            } else if (t == 2) {
                // alert("User Profile Updated");

                window.location = "my_account.php";
                // Snackbar.show({
                //     pos: 'bottom-right',
                //     text: "User Profile Updated",
                //     actionTextColor: '#17D1EE',
                //     customClass: 'snack',

                // });
            } else {
                // alert(t);
                Snackbar.show({
                    pos: 'bottom-right',
                    text: t,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            }

        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);

}