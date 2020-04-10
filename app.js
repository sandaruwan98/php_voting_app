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


//*opening animations -------------------------------

const hero = document.querySelector(".hero");
const slider = document.querySelector(".slider");
const nav = document.querySelector(".navbar");


const tl = new TimelineMax();

tl
    .fromTo(hero, 0.8, { height: "0%" }, { height: "80%", ease: Power2.easeInOut })
    .fromTo(hero, 1, { width: "100%", height: "80%" }, { width: "80%", height: "100%", ease: Power2.easeInOut })
    .fromTo(slider, 1, { x: "-100%" }, { x: "0%", ease: Power2.easeInOut }, "-=1.2")
    .fromTo(nav, 0.5, { y: -30, opacity: 0 }, { y: 0, opacity: 1 }, "-=0.5");
// .fromTo(body, 0.5, { background: "white" }, { background: linear-gradient(to top, #914cd1, #4eacff) });

setTimeout(() => {
    document.body.style.background = "linear-gradient(to top, #914cd1 , #4eacff )";
    document.body.style.backgroundAttachment = "fixed";
}, 1600);