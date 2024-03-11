"use strict";
function to_rooms() {
    location.replace("rooms.php");
}
function to_restaurants() {
    location.replace("restaurants.php");
}
function to_luxary() {
    location.replace("luxury_and_wellness.php");
}
function to_contact() {
    location.replace("contact.php");
}
function to_sigin() {
    location.replace("signin.php");
}
let div_ofsidbar = document.getElementById("div_ofsidebar");
function open_sidebar() {
    div_ofsidbar.style.display = "unset";
}
function close_sidebar() {
    div_ofsidbar.style.display = "none";
}
