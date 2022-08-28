window.onload = function() {
    const menu_btn = document.querySelector(".hamburger-menu");
    const nav2 = document.querySelector(".navbar-2");
    menu_btn.addEventListener("click", function() {
        menu_btn.classList.toggle("is-active");
        nav2.classList.toggle("is-active");
    });
}
function toggle_attrs_info (div_name) {
    console.log("Hola");
    let div =  document.getElementsByClassName(div_name)[0];
    if (div.style.display === 'none') {
        div.style.display = 'grid';
    }
    else {
        div.style.display = 'none';
    }
}
