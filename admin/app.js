// const headline = document.querySelector(".headline");




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


