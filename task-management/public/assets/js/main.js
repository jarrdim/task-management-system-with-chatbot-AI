AOS.init();

//nav
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("top-id").style.opacity = 1;


    } else {
        document.getElementById("top-id").style.transition = "all 1.5s ease";
        document.getElementById("top-id").style.opacity = "0";

    }
    prevScrollpos = currentScrollPos;
}

var swiper = new Swiper(".swiper-banner", {
    slidesPerView: 1,
    spaceBetween: 25,
    autoplay: false,
    initialSlide: 0,
    loop: true,
    loopFillGroupWithBlank: false,
    centerSlide: true,
    fade: true,
    grabCursor: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
//search
/*
const select = document.getElementById('select');
const list = document.getElementById('list');
const selectText = document.getElementById('selectText');
const options = document.querySelectorAll('.options');
const inputField = document.getElementById('js-input-field');
select.addEventListener('click', function () {
    list.classList.toggle('open');
    //list.classList.add('open');
})
for (var option of options) {
    option.onclick = function () {
        selectText.innerHTML = this.innerHTML;
        inputField.placeholder = "Search In " + selectText.innerHTML;
    }
}
*/


//min search
/*
const search = document.querySelector(".js-search")
const searchicon = document.querySelector(".js-icon")
const replace = document.querySelector(".js-replace");
search.style.opacity = 0;
search.style.transition = "all 1s ease";
searchicon.addEventListener('click', function () {

    if (search.style.opacity == 0) {
        search.style.opacity = 1;
        replace.innerHTML = "<i class='bi bi-x '></i>";
    } else {
        search.style.opacity = 0;
        replace.innerHTML = "<i class='bi bi-search '></i>";
    }
});

*/
var swiper = new Swiper(".swiper-category", {
    slidesPerView: 3,
    spaceBetween: 5,
    initialSlide: 0,
    loop: false,
    loopFillGroupWithBlank: false,
    centerSlide: true,
    fade: true,
    grabCursor: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        0: {
            slidesPerView: 0,
        },
        200: {
            slidesPerView: 1,
        },
        284: {
            slidesPerView: 1,
        },
        314: {
            slidesPerView: 2,
        },
        520: {
            slidesPerView: 2,
        },
        576: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 3,
        },
        810: {
            slidesPerView: 3,
        },
        950: {
            slidesPerView: 5,
        },
    },


});
//featured ads

var swiper = new Swiper(".swiper-olx", {
    slidesPerView: 3,
    spaceBetween: 5,
    initialSlide: 0,
    autoplay: false,
    loop: true,
    loopFillGroupWithBlank: false,
    centerSlide: true,
    fade: true,
    grabCursor: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        0: {
            slidesPerView: 0,
        },
        200: {
            slidesPerView: 1,
        },
        284: {
            slidesPerView: 1,
        },
        314: {
            slidesPerView: 2,
        },
        520: {
            slidesPerView: 2,
        },
        576: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 2,
        },
        810: {
            slidesPerView: 3,
        },
        950: {
            slidesPerView: 5,
        },
    },


});



//what clients say

var swiper = new Swiper(".client-content", {
    slidesPerView: 1,
    spaceBetween: 10,
    initialSlide: 0,
    loop: true,
    loopFillGroupWithBlank: false,
    centerSlide: true,
    fade: true,
    grabCursor: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },



});

//list page

//product page

//image replace
const allHoverimages = document.querySelectorAll(".product-content-mg img");
const imgcontainer = document.querySelector(".container-img");
//console.log(imgcontainer);
window.addEventListener('DOMContentLoaded', () => {
    allHoverimages[0].parentElement.classList.add('active');
});
allHoverimages.forEach((image) => {
    image.addEventListener('click', () => {
        imgcontainer.querySelector('img').src = image.src;
    });

});



//zoom
const container = document.querySelector(".container-img");
const image = document.querySelector(".img-container");
const lens = document.querySelector(".lens");
const result = document.querySelector(".result");

const containerRect = container.getBoundingClientRect();
const resultRect = result.getBoundingClientRect();
const lensRect = lens.getBoundingClientRect();
const imageRect = image.getBoundingClientRect();
container.addEventListener('mousemove', zoomImage)

function zoomImage(e) {
    //console.log("zoom image", e.clientX, e.clientY);
    const {
        x,
        y
    } = getMousePos(e);
    lens.style.left = x + "px";
    lens.style.top = y + "px";

    // var fx = resultRect.width / lensRect.width;
    //var fy = resultRect.height/ lensRect.height;
    var fx = lensRect.width / lensRect.width;
    var fy = lensRect.height / lensRect.height;


    lens.style.backgroundSize = `${imageRect.width * fx}px ${imageRect.height * fy}px`;
    lens.style.backgroundPosition = `-${x * fx}px -${y * fy}px`;
    lens.style.backgroundImage = `url(${image.src})`;

    console.log(lens);

}

function getMousePos(e) {

    var x = e.clientX - containerRect.left - lensRect.width / 2;
    var y = e.clientY - containerRect.top - lensRect.height / 2;

    var minX = 0;
    var minY = 0;
    var maxX = containerRect.width - lensRect.width;
    var maxY = containerRect.height - lensRect.height;

    if (x <= minX) {
        x = minX;
    } else if (x >= maxX) {
        x = maxX;
    }
    if (y <= minY) {
        y = minY;
    } else if (y >= maxY) {
        y = maxY;
    }


    return {
        x,
        y
    }

}
//END OF ZOOM






//for tooltip
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


//persisting tabs
var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab") : "#nav-profile";

function show_tab(tab_name) {
    var firstTabEl = document.querySelector(tab_name);
    var firstTab = new bootstrap.Tab(firstTabEl);

    firstTab.show();
}

function set_tab(tab_name) {
    //tab = tab_name;

    sessionStorage.setItem("tab", tab_name);

}

window.onload = function () {

    show_tab(tab);


};