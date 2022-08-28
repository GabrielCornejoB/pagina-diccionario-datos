window.onload = function() {
    const menu_btn = document.querySelector(".hamburger-menu");
    const nav2 = document.querySelector(".navbar-2");
    menu_btn.addEventListener("click", function() {
        menu_btn.classList.toggle("is-active");
        nav2.classList.toggle("is-active");
    });
}