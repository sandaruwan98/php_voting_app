// const headline = document.querySelector(".headline");



//* auto typing effect ------------------------------
const typo = document.querySelector(".typo");
const words = ["Lakshan", "Sandaruwan", "Jayasinghe"];
let leters = "";
let count = 0;
let index = 0;
let interval = 300;
(function type() {
    if (count === words.length) {
        count = 0;
    }
    current = words[count];
    leters = current.slice(0, ++index);
    typo.textContent = "I am " + leters;
    if (leters.length === current.length) {
        count++;
        index = 0;
        // setInterval("", 300);
        interval = 1000;
    }
    setTimeout(type, interval);
    interval = 300;
}()
);



//* logout menu pop up ------------------------------
//using Jquery

const logmenu1 = document.querySelector(".logmenu1");
const menubtns = document.querySelectorAll(".menubtn");
const menutrigger = document.querySelector(".menutrigger");

menutrigger.addEventListener('click', () => {
    var nav = $(".navbar");
    $(".logmenu1").css("top", nav.css("height"));
    logmenu1.classList.toggle('open');
    menubtns.forEach(bt => {
        bt.classList.toggle('fade');
    });
});


//*scroll triggering animations -------------------------------
function scrollAppear() {
    var animtextL = document.querySelector(".intro-l");
    var animtextR = document.querySelector(".intro-r");
    var textposition = animtextL.getBoundingClientRect().top;
    var screenPosition = window.innerHeight / 1.3;
    if (textposition < screenPosition) {
        animtextL.classList.add("intro-appear");
        animtextR.classList.add("intro-appear");
        $(typo).css({
            "opacity": "1",
            "transform": "translateX(0)"
        });
    }
}

window.addEventListener('scroll', scrollAppear)


