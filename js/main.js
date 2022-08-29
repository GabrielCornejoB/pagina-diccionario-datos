window.onload = function() {
    const menu_btn = document.querySelector(".hamburger-menu");
    const nav2 = document.querySelector(".navbar-2");
    menu_btn.addEventListener("click", function() {
        menu_btn.classList.toggle("is-active");
        nav2.classList.toggle("is-active");
    });
}
function disableScroll() {
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
        window.onscroll = function() {
            window.scrollTo(scrollLeft, scrollTop);
        };
    let style = document.createElement("style");
    style.innerHTML = `body {overflow-y: hidden;}`;
    document.head.appendChild(style);
}
function enableScroll() {
    window.onscroll = function() {};
    let style = document.createElement("style");
    style.innerHTML = `body {overflow-y: scroll;}`;
    document.head.appendChild(style);
}
function toggle_info(div_name) {
    let div =  document.getElementsByClassName(div_name)[0];
    if (div.style.display === 'none') {
        div.style.display = 'grid';
        disableScroll();
    }
    else {
        div.style.display = 'none';
        enableScroll();
    }
}