window.onload = signup_method1;

function signup_method1() {
  document.getElementById("signup_form1").style.display = "none";
}

function signup_method() {
  document.getElementById("signup_form1").style.display = "block";
}

//Error close button
$(".close-btn").click(function () {
  $(".alert").addClass("hide");
  $(".alert").removeClass("show");
});

//Switch between sign in adn signup
const signupview = document.querySelector("#signUp");
const signIn = document.querySelector("#signIn");
const passwordIcon = document.querySelectorAll(".password__icon");
const authPassword = document.querySelectorAll(".auth__password");

// when click sign up button
if (signupview != null) {
  signupview.addEventListener("click", () => {
    document.querySelector(".login__form").classList.remove("active");
    document.querySelector(".register__form").classList.add("active");
  });

  // when click sign in button
  signIn.addEventListener("click", () => {
    document.querySelector(".login__form").classList.add("active");
    document.querySelector(".register__form").classList.remove("active");
  });

  // change hidden password to visible password
  for (var i = 0; i < passwordIcon.length; ++i) {
    passwordIcon[i].addEventListener("click", (i) => {
      const lastArray = i.target.classList.length - 1;
      if (i.target.classList[lastArray] == "bi-eye-slash") {
        i.target.classList.remove("bi-eye-slash");
        i.target.classList.add("bi-eye");
        i.currentTarget.parentNode.querySelector("input").type = "text";
      } else {
        i.target.classList.add("bi-eye-slash");
        i.target.classList.remove("bi-eye");
        i.currentTarget.parentNode.querySelector("input").type = "password";
      }
    });
  }
}

//Sign Up part

function signUp1() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var password = document.getElementById("password");
  var mobile = document.getElementById("mobile");
  var RePassword = document.getElementById("RePassword");
  var gender = document.getElementById("gender");

  var f = new FormData();
  f.append("fname", fname.value);
  f.append("lname", lname.value);
  f.append("email", email.value);
  f.append("password", password.value);
  f.append("RePassword", RePassword.value);
  f.append("gender", gender.value);

  f.append("mobile", mobile.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      if (text == 01) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Please enter your frist name",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 02) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Only alphabets and whitespace are allowed for names",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 03) {
        Snackbar.show({
          pos: "bottom-right",
          text: "First name must be less than 50 characters",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 04) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Please enter your last name",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 05) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Only alphabets and whitespace are allowed for names",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 06) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Last name must be less than 50 characters",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 07) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Please enter your email",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 08) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Invalid email address",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 09) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Sorry! Email must be less than 100 characters",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 10) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Please enter your mobile",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 11) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Invalid mobile number",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 12) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Please enter your password",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 13) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Password length must between 8 to 20",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 14) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Password not match!",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 15) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Invalid email",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 16) {
        Snackbar.show({
          pos: "bottom-right",
          text: "User with the same email address or mobile already exsist",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
      } else if (text == 17) {
        swal("Verfication email send.Please check your inbox : ", {
          content: "input",
        }).then((value) => {
          //swal(`You typed: ${value}`);
          confirmuser(value);
        });
      }
    }
  };

  r.open("POST", "signUpProcess.php", true);
  r.send(f);
}
var c = 0;

function confirmuser(code) {
  if (c == 0) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var text = r.responseText;

        if (text == 1) {
          swal("Success!", "User successfully registered!", "success");
          fname.value = "";
          lname.value = "";
          email.value = "";
          mobile.value = "";
          password.value = "";
          RePassword.value = "";
          document.querySelector(".login__form").classList.add("active");
          document.querySelector(".register__form").classList.remove("active");
        } else if (text == 2) {
          swal("Incorrect verification code. Please try again:", {
            content: "input",
          }).then((value) => {
            if (value != null || value == "") {
              confirmuser(value);
              c++;
            } else {
              swal("Error!", "Registration failed", "error");
              window.location = "register.php";
            }
          });
        } else {
          swal("Error!", text, "error");
        }
      }
    };
    r.open("POST", "confirmEmail.php", true);
    r.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    r.send("code=" + code);
  } else {
    swal("Error!", "Registration failed", "error");
    fname.value = "";
    lname.value = "";
    email.value = "";
    mobile.value = "";
    password.value = "";
    RePassword.value = "";
    c = 0;
  }
}

function signInProcess() {
  var email = document.getElementById("email2");
  var password = document.getElementById("password2");

  var formData = new FormData();
  formData.append("email", email.value);
  formData.append("password", password.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == 1) {
        window.location = "index.php";
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
  r.open("POST", "signInProcess.php", true);
  r.send(formData);
}

function forgotPassword() {
  var email = document.getElementById("email2");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      Snackbar.show({
        pos: "bottom-right",
        text: "Verfication email send.Please check your inbox",
        actionTextColor: "#17D1EE",
        customClass: "snack",
      });

      var m = document.getElementById("forgetPasswordModel");
      bm = new bootstrap.Modal(m);
      bm.show();
    }
  };

  r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
  r.send();
}

function resetPassword() {
  var e = document.getElementById("email2");
  var np = document.getElementById("np");
  var rnp = document.getElementById("rnp");
  var vc = document.getElementById("vc");

  var formData = new FormData();
  formData.append("e", e.value);
  formData.append("np", np.value);
  formData.append("rnp", rnp.value);
  formData.append("vc", vc.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      if (text == 1) {
        Snackbar.show({
          pos: "bottom-right",
          text: "Password reset success!",
          actionTextColor: "#17D1EE",
          customClass: "snack",
        });
        document.getElementById("forgetPasswordModel");
        bm.hide();
        // window.location = "login.php";
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
  r.open("POST", "resetPassword.php", true);
  r.send(formData);
}

function showPassword1() {
  var np = document.getElementById("np");
  var npb = document.getElementById("npb");

  if (npb.innerHTML == "Show") {
    np.type = "text";
    npb.innerHTML = "Hide";
  } else {
    np.type = "password";
    npb.innerHTML = "Show";
  }
}

function showPassword2() {
  var rnp = document.getElementById("rnp");
  var rnpb = document.getElementById("rnpb");

  if (rnpb.innerHTML == "Show") {
    rnp.type = "text";
    rnpb.innerHTML = "Hide";
  } else {
    rnp.type = "password";
    rnpb.innerHTML = "Show";
  }
}
