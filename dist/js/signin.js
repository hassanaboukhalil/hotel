"use strict";
function myFunction1(x) {
    if (x.matches) {
        let header_sc = document.getElementById("header_section");
        let header_height = (window.getComputedStyle(header_sc, null)).height;
        let nav = document.getElementsByClassName("navbar")[0];
        let nav_height = (window.getComputedStyle(nav, null)).height;
        let signin_and_photo = document.getElementById("signin_and_photo");
        signin_and_photo.style.height = parseInt(header_height.replace("px", "")) - parseInt(nav_height.replace("px", "")) + "px";
    }
}
var x = window.matchMedia("(min-width: 992px)");
myFunction1(x);
function forget_pass() {
    let email = document.getElementById("email");
    if (email.value == "") {
        alert("Enter your email address");
    }
    else if (!email.value.includes("@")) {
        alert("Wrong email address");
    }
    else if ((email.value.startsWith("@") || email.value.endsWith("@"))) {
        alert("Wrong email address");
    }
    else {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            const data = JSON.parse(this.responseText);
            alert(data.msg);
            if (data.msg == "a code was sent to your email") {
                document.getElementById("parent_of_div_code").style.display = "flex";
            }
        };
        var url = "check_and_sendcode.php";
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("email=" + email.value + "&send=" + true);
    }
}
let codediv_clicked = false;
function codediv() {
    codediv_clicked = true;
}
function close_divcode_parent() {
    if (!codediv_clicked) {
        document.getElementById("parent_of_div_code").style.display = "none";
    }
    codediv_clicked = false;
}
function check_code() {
    let code_field = document.getElementById("code");
    let code = code_field.value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let msg = this.responseText;
        if (msg == "true") {
            close_divcode_parent();
            let pass_field = document.getElementById("password");
            pass_field.placeholder = "Enter a new password";
            let re_enter_pass = document.createElement("input");
            re_enter_pass.setAttribute("type", "password");
            re_enter_pass.setAttribute("class", "txts_input");
            re_enter_pass.setAttribute("minlength", "8");
            re_enter_pass.placeholder = "Re-enter your password";
            let form = document.getElementById("form");
            form.insertBefore(re_enter_pass, form.children[3]);
            let pass_conditions = document.getElementById("er_pass");
            pass_conditions.innerHTML = "Enter a combinations of at least 8 numbers, letters and special characters( such as ! and ? )";
            pass_conditions.style.color = "#797878";
            re_enter_pass.addEventListener("onkeydown", function () {
                if (re_enter_pass.value == pass_field.value) {
                    re_enter_pass.style.borderColor = "#10fd10";
                    pass_field.style.borderColor = "#10fd10";
                }
                else {
                    re_enter_pass.style.borderColor = "unset";
                    pass_field.style.borderColor = "unset";
                }
            });
            pass_field.addEventListener("onkeydown", function () {
                if (re_enter_pass.value == pass_field.value) {
                    re_enter_pass.style.borderColor = "#10fd10";
                    pass_field.style.borderColor = "#10fd10";
                }
                else {
                    re_enter_pass.style.borderColor = "unset";
                    pass_field.style.borderColor = "unset";
                }
            });
            let email_field = document.getElementById("email");
            let email = email_field.value;
            let login_btn = document.getElementById("login_btn");
            login_btn.setAttribute("type", "button");
            login_btn.addEventListener("click", function () {
                if (email != "" && pass_field.value != "" && re_enter_pass.value != "") {
                    let pass = pass_field.value;
                    if ((pass.length >= 8)) {
                        if (re_enter_pass.value == pass) {
                            let contain_number = false;
                            let contain_letter = false;
                            let contain_special_letter = false;
                            for (let i = 0; (i < pass.length) && (contain_number == false || contain_letter == false || contain_special_letter == false); i++) {
                                if (("0123456789").includes(pass[i])) {
                                    if (contain_number == false) {
                                        contain_number = true;
                                    }
                                }
                                else if (("QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm").includes(pass[i])) {
                                    if (contain_letter == false) {
                                        contain_letter = true;
                                    }
                                }
                                else {
                                    contain_special_letter = true;
                                }
                            }
                            if (contain_number == true && contain_letter == true && contain_special_letter == true) {
                                const xhttp = new XMLHttpRequest();
                                xhttp.onload = function () {
                                    let msg = this.responseText;
                                    if (msg == "the password was updated") {
                                        window.location.href = "user_index.php";
                                    }
                                    else {
                                        alert("Email is not found");
                                    }
                                };
                                var url = "update_data.php";
                                xhttp.open("POST", url, true);
                                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhttp.send("email=" + email + "&pass=" + pass_field.value);
                            }
                            else {
                                alert("Your password should contain at least one number, one letter and one special letter");
                            }
                        }
                        else {
                            alert("Your passwords are not equals");
                        }
                    }
                    else {
                        alert("The password should be at least 8 character");
                    }
                }
                else {
                    alert("You should fill all fields");
                }
            });
        }
        else {
            alert(msg);
        }
    };
    var url = "check_code.php";
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("code=" + code);
}
