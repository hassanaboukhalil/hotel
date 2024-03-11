"use strict";
var _a;
let classic_room_images = ["images/rooms/classic_room_images/classic_room1.png", "images/rooms/classic_room_images/balcony.png", "images/rooms/classic_room_images/toilet.png"];
let superior_room_images = ["images/rooms/superior_room_images/superior_room1.png", "images/rooms/superior_room_images/balcony.png", "images/rooms/superior_room_images/toilet.png"];
let deluxe_room_images = ["images/rooms/deluxe_room_images/deluxe_room1.png", "images/rooms/deluxe_room_images/balcony.png", "images/rooms/deluxe_room_images/toilet.png"];
let classic_room_advantages = ["Free wifi", "Electronic door locks", "49\" Smart TV", "Iron and ironing board", "Air conditioning", "24-hour room service", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum"];
let superior_room_advantages = ["Free wifi", "Electronic door locks", "49\" Smart TV", "Iron and ironing board", "Air conditioning", "24-hour room service", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum"];
let deluxe_room_advantages = ["Free wifi", "Electronic door locks", "49\" Smart TV", "Iron and ironing board", "Air conditioning", "24-hour room service", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum", "Lorem ipsum"];
let slider_section = document.getElementById("header_section");
let circles_array = document.getElementsByClassName("circle");
let room_type = (_a = document.getElementById("title")) === null || _a === void 0 ? void 0 : _a.innerHTML;
let r = room_type === null || room_type === void 0 ? void 0 : room_type.split(" ", 1);
room_type = r[0];
let slider_array;
let menu = document.getElementById("advantages_menu");
let adv;
if (room_type == "Classic") {
    slider_section.style.backgroundImage = `url(${classic_room_images[0]})`;
    slider_array = classic_room_images;
    document.getElementById("body_txt").innerHTML = "Classic room Lorem ipsum dolor sit amet consectetur. Dui pellentesque id molestie nunc erat sit dolor dolor posuere. Facilisis rutrum mauris amet senectus vitae molestie amet eget. Id ante ut congue vel adipiscing arcu fames. Auctor at id nisl metus amet senectus est. Donec tortor nulla consequat gravida. Velit in commodo id leo turpis.";
    for (let i = 0; i < classic_room_advantages.length; i++) {
        adv = document.createElement("li");
        adv.innerHTML = classic_room_advantages[i];
        menu.appendChild(adv);
    }
}
else if (room_type == "Superior") {
    slider_section.style.backgroundImage = `url(${superior_room_images[0]})`;
    slider_array = superior_room_images;
    document.getElementById("body_txt").innerHTML = "Superior room Lorem ipsum dolor sit amet consectetur. Dui pellentesque id molestie nunc erat sit dolor dolor posuere. Facilisis rutrum mauris amet senectus vitae molestie amet eget. Id ante ut congue vel adipiscing arcu fames. Auctor at id nisl metus amet senectus est. Donec tortor nulla consequat gravida. Velit in commodo id leo turpis.";
    for (let i = 0; i < superior_room_advantages.length; i++) {
        adv = document.createElement("li");
        adv.innerHTML = superior_room_advantages[i];
        menu.appendChild(adv);
    }
}
else {
    slider_section.style.backgroundImage = `url(${deluxe_room_images[0]})`;
    slider_array = deluxe_room_images;
    document.getElementById("body_txt").innerHTML = "deluxe room Lorem ipsum dolor sit amet consectetur. Dui pellentesque id molestie nunc erat sit dolor dolor posuere. Facilisis rutrum mauris amet senectus vitae molestie amet eget. Id ante ut congue vel adipiscing arcu fames. Auctor at id nisl metus amet senectus est. Donec tortor nulla consequat gravida. Velit in commodo id leo turpis.";
    for (let i = 0; i < deluxe_room_advantages.length; i++) {
        adv = document.createElement("li");
        adv.innerHTML = deluxe_room_advantages[i];
        menu.appendChild(adv);
    }
}
let circle_firstcolor = "black";
let circle_secondcolor = "#706F6F";
let circlee;
let sliderNb = 1;
let sliderInterval;
function slider_fnc(sliderNb, slider_array) {
    sliderInterval = setInterval(function () {
        if (sliderNb == 3)
            sliderNb = 0;
        slider_section.style.backgroundImage = `url(${slider_array[sliderNb]})`;
        circlee = circles_array[sliderNb];
        circlee.style.fill = circle_firstcolor;
        for (let i = 0; i < circles_array.length; i++) {
            if (i == sliderNb)
                continue;
            circlee = circles_array[i];
            circlee.style.fill = circle_secondcolor;
        }
        sliderNb++;
    }, 3500);
}
slider_fnc(sliderNb, slider_array);
function change_imge(cir) {
    clearInterval(sliderInterval);
    let c = cir.id;
    c = c.slice(1);
    c = parseInt(c);
    slider_section.style.backgroundImage = `url(${slider_array[c]})`;
    circlee = circles_array[c];
    circlee.style.fill = circle_firstcolor;
    for (let i = 0; i < circles_array.length; i++) {
        if (i == c)
            continue;
        circlee = circles_array[i];
        circlee.style.fill = circle_secondcolor;
    }
    slider_fnc(c + 1, slider_array);
}
