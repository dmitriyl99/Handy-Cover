document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('scroll', function(event) {
        let mainImage = document.querySelector('.main-image');
        let navbar = document.querySelector('.navbar');
        let headerContacts = document.querySelector('.header-contacts');
        let navbarBrand = document.querySelector('.navbar-brand');
        console.log(navbar);
        if (mainImage !== null) {
            if ($(window).width() <= '992') {
                navbar.classList.remove('bg-transparent');
                navbar.classList.add('bg-white');
                navbar.classList.add('shadow');
                headerContacts.classList.remove('text-white');
                navbarBrand.classList.remove('text-white');
                return;
            }
            var mainImageBottom = mainImage.getBoundingClientRect().bottom + 420;
            if (navbar.classList.contains('bg-white') && window.pageYOffset < mainImageBottom) {
                navbar.classList.remove('bg-white');
                navbar.classList.add('bg-transparent');
                navbar.classList.remove('shadow');
                headerContacts.classList.add('text-white');
                navbarBrand.classList.add('text-white');
            } else if (window.pageYOffset > mainImageBottom) {
                navbar.classList.remove('bg-transparent');
                navbar.classList.add('bg-white');
                navbar.classList.add('shadow');
                headerContacts.classList.remove('text-white');
                navbarBrand.classList.remove('text-white');
        }
        }
    });
});