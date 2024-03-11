let lib_imgs = [
    "url('./images/lib_images/football_game.jpg')",
    "url('./images/lib_images/event.jpg')",
    "url('./images/lib_images/food-making.jpg')",
    "url('./images/lib_images/pool-game.jpg')",
    "url('./images/lib_images/tennis-game.jpg')"
];



let direction;
let choosen_image : string;
let choosen_nb : number;
let lib_slider = document.getElementById("lib_dg") as HTMLDivElement
function scroll_lib_slider(obj : HTMLImageElement){
    direction = obj.id;
    if(direction == "right"){
        if(choosen_nb == undefined){
            choosen_nb = 1;
            choosen_image = lib_imgs[choosen_nb]
        }
        else{
            choosen_nb++;
            if(choosen_nb > lib_imgs.length-1){
                choosen_nb = 0;
            }
            choosen_image = lib_imgs[choosen_nb]
        }
    }
    else if(direction == "left"){
        if(choosen_nb == undefined){
            choosen_nb = lib_imgs.length-1;
            choosen_image = lib_imgs[choosen_nb]
        }
        else{
            choosen_nb--;
            if(choosen_nb == -1){
                choosen_nb = lib_imgs.length-1;
            }
            choosen_image = lib_imgs[choosen_nb]
        }
    }
    lib_slider.style.backgroundImage = choosen_image;
}