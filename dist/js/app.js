"use strict";
let slider_images = ["images/hotel_img1.png", "images/hotel_img2.png", "images/hotel_img3.png", "images/hotel_img4.png", "images/hotel_img5.png"];
let header_section = document.getElementById("header_section");
let circles = document.getElementsByClassName("circle");
header_section.style.backgroundImage = `url(${slider_images[0]})`;
let circle_color1 = "black";
let circle_color2 = "#706F6F";
let circle;
let slider_nb = 1;
let slider_interval;
function slider_fn(slider_nb) {
    slider_interval = setInterval(function () {
        if (slider_nb == 5)
            slider_nb = 0;
        header_section.style.backgroundImage = `url(${slider_images[slider_nb]})`;
        circle = circles[slider_nb];
        circle.style.fill = circle_color1;
        for (let i = 0; i < circles.length; i++) {
            if (i == slider_nb)
                continue;
            circle = circles[i];
            circle.style.fill = circle_color2;
        }
        slider_nb++;
    }, 3500);
}
slider_fn(slider_nb);
function change_img(cir) {
    clearInterval(slider_interval);
    let c = cir.id;
    c = c.slice(1);
    c = parseInt(c);
    header_section.style.backgroundImage = `url(${slider_images[c]})`;
    circle = circles[c];
    circle.style.fill = circle_color1;
    for (let i = 0; i < circles.length; i++) {
        if (i == c)
            continue;
        circle = circles[i];
        circle.style.fill = circle_color2;
    }
    slider_fn(c + 1);
}
