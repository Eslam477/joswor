var main_menu_ul = document.querySelector('.main_menu').children;
for (i = 0; i < main_menu_ul.length; i++) {
    main_menu_ul[i].className += " nav-item";
    main_menu_ul[i].children[0].className += 'nav-link'
}

