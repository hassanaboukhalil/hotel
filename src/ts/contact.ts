

function myFunction(x : any) {
    if (x.matches) { // If media query matches
        let header_sc = document.getElementById("header_section");
        let header_height = (window.getComputedStyle(header_sc,null)).height;
        //
        let nav = document.getElementsByClassName("navbar")[0];
        let nav_height = (window.getComputedStyle(nav,null)).height;
        //
        let txts_and_map_part = document.getElementById("txts_and_map")
        txts_and_map_part.style.height = parseInt(header_height.replace("px", "")) - parseInt(nav_height.replace("px", "")) + "px";
    }
}

var x = window.matchMedia("(min-width: 992px)")
myFunction(x) // Call listener function at run time
// x.addListener(myFunction) // Attach listener function on state changes