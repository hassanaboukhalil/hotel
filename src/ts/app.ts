
///////////////////////////////////////////////////////////////////////////////// header section
let slider_images : string[] = ["images/hotel_img1.png","images/hotel_img2.png","images/hotel_img3.png","images/hotel_img4.png","images/hotel_img5.png"]
let header_section = <HTMLElement>document.getElementById("header_section");
let circles = <HTMLCollection>document.getElementsByClassName("circle")
// header_section.style.backgroundImage = `url(${slider_images[0]})`
let circle_color1 = "black"
let circle_color2 = "#706F6F"
let circle;
let circle1;
let circle2;
let header_img = document.getElementById("header_img") as HTMLImageElement
let c0 = document.getElementById("c0").style.transition = "all 0.8s";
let c1 = document.getElementById("c1").style.transition = "all 0.8s";
let c2 = document.getElementById("c2").style.transition = "all 0.8s";
let c3 = document.getElementById("c3").style.transition = "all 0.8s";
let c4 = document.getElementById("c4").style.transition = "all 0.8s";

// header_img.style.transition = "all 0.2s"

// circle.style.fill = "circle_color1"; 
let slider_nb = 1
let slider_interval: number | undefined;
// let slider_interval2: number | undefined;
// let slider_interval3: number | undefined;

// let op = "1";

function slider_fn(slider_nb : number){
    slider_interval = setInterval(function(){
        if(slider_nb == 5)slider_nb = 0;
        // header_section.style.backgroundImage = `url(${slider_images[slider_nb]})`
        // header_img.src = `${slider_images[slider_nb]}`
        // header_img.style.opacity = "0.5";
        header_img.src = slider_images[slider_nb]
        // setTimeout(opacity_changing,1)
        // slider_interval2 = setTimeout(opacity_changing,3400)
        // slider_interval3 = setTimeout(opacity_changing,100)
        // setTimeout(opacity_changing,1)
        // setTimeout(opacity_changing,2900)
        // header_img.style.opacity = "1"
        // header_img.style.opacity = "0.5"
        circle = <HTMLElement>circles[slider_nb]

        circle.style.fill = circle_color1;

        if(slider_nb-1 < 0){
            circle = <HTMLElement>circles[4]
        }
        else{
            circle = <HTMLElement>circles[slider_nb-1]
        }
        circle.style.fill = circle_color2;
        // circle.style.transition = "all 0.5s";
        slider_nb++;
    },3500)
}

// function opacity_changing(){
//     if(op == "1"){
//         op = "0.5"
//     }
//     else{
//         op = "1"
//     }
//     header_img.style.opacity = op
// }

slider_fn(slider_nb);
// slider_interval2 = setTimeout(opacity_changing,3400)

function change_img(cir : any){
    clearInterval(slider_interval);
    // clearInterval(slider_interval2)
    // clearInterval(slider_interval3)

    let c : any = cir.id;
    c = c.slice(1)
    c = parseInt(c);
    // header_section.style.backgroundImage = `url(${slider_images[c]})`
    // header_img.src = `${slider_images[slider_nb]}`
    header_img.src = slider_images[c]
    header_img.style.opacity = "1"
    circle = <HTMLElement>circles[c]
    circle.style.fill = circle_color1;
    for(let i = 0 ; i < circles.length ; i++){
        if(i == c)continue
        circle = <HTMLElement>circles[i]
        circle.style.fill = circle_color2;
    }
    
    slider_fn(c+1);
    // slider_interval2 = setTimeout(opacity_changing,3400)



    // circle = <HTMLElement>circles[c]
    // circle.style.fill = circle_color1;
    // for(let i = 0 ; i < circles.length ; i++){
    //     if(i == c)continue
    //     circle = <HTMLElement>circles[i]
    //     circle.style.fill = circle_color2;
    // }
    // slider_fn(c+1);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////








