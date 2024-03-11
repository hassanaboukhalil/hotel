

function myFunction1(x : any) {
    if (x.matches) { // If media query matches
        let header_sc = document.getElementById("header_section");
        let header_height = (window.getComputedStyle(header_sc,null)).height;
        //
        let nav = document.getElementsByClassName("navbar")[0];
        let nav_height = (window.getComputedStyle(nav,null)).height;
        //
        let signin_and_photo = document.getElementById("signin_and_photo")
        signin_and_photo.style.height = parseInt(header_height.replace("px", "")) - parseInt(nav_height.replace("px", "")) + "px";
    }
}

var x = window.matchMedia("(min-width: 992px)")
myFunction1(x) // Call listener function at run time
// x.addListener(myFunction) // Attach listener function on state changes


////////////////////////////////////////////////////// check if the fields and send a code to the email
function forget_pass(){
    let email = document.getElementById("email") as HTMLInputElement
    if(email.value == ""){
        alert("Enter your email address")
    }
    else if(!email.value.includes("@")){
        alert("Wrong email address")
    }
    else if((email.value.startsWith("@") || email.value.endsWith("@"))){
        alert("Wrong email address")
    }
    else{
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            const data = JSON.parse(this.responseText);
            alert(data.msg)
            if(data.msg == "a code was sent to your email"){
                document.getElementById("parent_of_div_code").style.display = "flex";
            }
            
        }
        var url = "check_and_sendcode.php"
        xhttp.open("POST",url,true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Set the request headers
        xhttp.send("email="+email.value+"&send="+true);
    }
}


let codediv_clicked : boolean = false;
function codediv(){
    codediv_clicked = true
}
function close_divcode_parent(){
    if(!codediv_clicked){
        document.getElementById("parent_of_div_code").style.display = "none"
    }
    codediv_clicked = false
}

function check_code(){
    let code_field = document.getElementById("code") as HTMLInputElement 
    let code = code_field.value;
    const xhttp = new XMLHttpRequest();
    //
    /// first ajax is to check if the code is equal to the code that was sent to the email , the url for ajax is "check_code.php"
    /// second ajax is inside the first ajax that check if the email is found in the database and if yes it will update the password in the database , the url for ajax is "update_data.php" 
    //
    //
    /// first ajax
    xhttp.onload = function(){
        let msg = this.responseText;
        if(msg == "true"){
            close_divcode_parent();
            let pass_field = document.getElementById("password") as HTMLInputElement;
            pass_field.placeholder = "Enter a new password";
            let re_enter_pass = document.createElement("input");
            re_enter_pass.setAttribute("type","password")
            re_enter_pass.setAttribute("class","txts_input")
            re_enter_pass.setAttribute("minlength","8")
            re_enter_pass.placeholder = "Re-enter your password";
            let form = document.getElementById("form") as HTMLFormElement;
            form.insertBefore(re_enter_pass,form.children[3])
            let pass_conditions = document.getElementById("er_pass");
            pass_conditions.innerHTML = "Enter a combinations of at least 8 numbers, letters and special characters( such as ! and ? )";
            pass_conditions.style.color = "#797878";
            re_enter_pass.addEventListener("onkeydown",function(){
                if(re_enter_pass.value == pass_field.value){
                    re_enter_pass.style.borderColor = "#10fd10";
                    pass_field.style.borderColor = "#10fd10";
                }
                else{
                    re_enter_pass.style.borderColor = "unset";
                    pass_field.style.borderColor = "unset";
                }
            })
            pass_field.addEventListener("onkeydown",function(){
                if(re_enter_pass.value == pass_field.value){
                    re_enter_pass.style.borderColor = "#10fd10";
                    pass_field.style.borderColor = "#10fd10";
                }
                else{
                    re_enter_pass.style.borderColor = "unset";
                    pass_field.style.borderColor = "unset";
                }
            })
            let email_field = document.getElementById("email") as HTMLInputElement;
            let email = email_field.value; 
            let login_btn = document.getElementById("login_btn") as HTMLInputElement;
            login_btn.setAttribute("type","button");
            //
            ////////// adding an event listener for login btn. login after with changing the password
            login_btn.addEventListener("click",function(){
                if(email != "" && pass_field.value != "" && re_enter_pass.value != ""){
                    //
                    /// checking if the password is at least 8 characters
                    let pass = pass_field.value;
                    if((pass.length>=8)){
                        //
                        /// check if the new pass and the re-entered password are equals
                        if(re_enter_pass.value == pass){
                            //
                            /// checking if the password contain at least one number, letter, special letter
                            let contain_number = false;
                            let contain_letter = false;
                            let contain_special_letter = false;
                            for(let i = 0; (i < pass.length) && (contain_number == false || contain_letter == false || contain_special_letter == false) ; i++){
                                if(("0123456789").includes(pass[i])){
                                    if(contain_number == false){
                                        contain_number = true;
                                    }
                                }
                                else if(("QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm").includes(pass[i])){
                                    if(contain_letter == false){
                                        contain_letter = true
                                    }
                                }
                                else {
                                    contain_special_letter = true;
                                }
                            }
                            if(contain_number == true && contain_letter == true && contain_special_letter == true){
                                //
                                ///second ajax that is in the first ajax
                                // checking if the email is found and if yes then updating the password in database in "update_data.php" , then login and go to user_index.php
                                const xhttp = new XMLHttpRequest();
                                xhttp.onload = function(){
                                    let msg : string = this.responseText;
                                    if(msg == "the password was updated"){
                                        window.location.href = "user_index.php";
                                    }
                                    else{
                                        alert("Email is not found")
                                    }
                                }
                                var url = "update_data.php"
                                xhttp.open("POST",url,true);
                                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Set the request headers
                                xhttp.send("email="+email+"&pass="+pass_field.value);
                            }
                            else{
                                alert("Your password should contain at least one number, one letter and one special letter")
                            }
                        }
                        else{
                            alert("Your passwords are not equals")
                        }
                    }
                    else{
                        alert("The password should be at least 8 character")
                    }
                }
                else{
                    alert("You should fill all fields")
                }
            })
        }
        else{
            alert(msg);
        }
    }
    var url = "check_code.php"
    xhttp.open("POST",url,true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Set the request headers
    xhttp.send("code="+code);
}