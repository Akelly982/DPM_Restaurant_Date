const navBureger = function() {
    
    // Get class elements
    let burger = document.querySelector('.burger');
    let nav = document.querySelector('nav');
    let header = document.querySelector('header');

    // Click function
    burger.addEventListener('click', function() {

        // Toggle nav
        burger.classList.toggle('burger_act');
        nav.classList.toggle('nav_act');
        header.classList.toggle('header_act');

        // Adding class for body


    });

}
navBureger()