let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

document.querySelector('#login-btn').onclick = () =>{
  document.querySelector('.login-form-container').classList.toggle('active');
}

document.querySelector('#close-login-form').onclick = () =>{
  document.querySelector('.login-form-container').classList.remove('active');
}

window.onscroll = () =>{

  menu.classList.remove('fa-times');
  navbar.classList.remove('active');

  if(window.scrollY > 0){
    document.querySelector('.header').classList.add('active');
  }else{
    document.querySelector('.header').classList.remove('active');
  };

};

document.querySelector('.home').onmousemove = (e) =>{

  document.querySelectorAll('.home-parallax').forEach(elm =>{

    let speed = elm.getAttribute('data-speed');

    let x = (window.innerWidth - e.pageX * speed) / 90;
    let y = (window.innerHeight - e.pageY * speed) / 90;

    elm.style.transform = `translateX(${y}px) translateY(${x}px)`;

  });

};


document.querySelector('.home').onmouseleave = (e) =>{

  document.querySelectorAll('.home-parallax').forEach(elm =>{

    elm.style.transform = `translateX(0px) translateY(0px)`;

  });

};

var swiper = new Swiper(".vehicles-slider", {
  grabCursor: true,
  centeredSlides: true,  
  spaceBetween: 20,
  loop:true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable:true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".featured-slider", {
  grabCursor: true,
  centeredSlides: true,  
  spaceBetween: 20,
  loop:true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable:true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".review-slider", {
  grabCursor: true,
  centeredSlides: true,  
  spaceBetween: 20,
  loop:true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable:true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});




// "arabalar2.html" sayfası için kodlar
const starCheckbox = document.getElementById("star1");
const carBox = document.querySelector(".box");
const carInfo = {
    name: carBox.querySelector("h3").textContent,
    price: carBox.querySelector(".price").textContent,
    features: carBox.querySelector("p").textContent
};
starCheckbox.addEventListener("click", function() {
    if (starCheckbox.checked) {
        localStorage.setItem("favoriteCar", JSON.stringify(carInfo));
    } else {
        localStorage.removeItem("favoriteCar");
    }
});

// "favoriler.html" sayfası için kodlar
const favoriteCar = JSON.parse(localStorage.getItem("favoriteCar"));
if (favoriteCar) {
    const favoriteBox = document.createElement("div");
    favoriteBox.innerHTML = `
        <img src="image/car-5.png" style="width: 100%" height="auto">
        <h3>${favoriteCar.name}</h3>
        <div class="price">${favoriteCar.price}</div>
        <p>${favoriteCar.features}</p>
    `;
    document.body.appendChild(favoriteBox);
}




/*let blueBtn = document.getElementById("blue")
let blackBtn = document.getElementById("black")
let redBtn = document.getElementById("red")
let bikeBtn = document.getElementById("bike")

redBtn.onclick = function(){
bike.style.backgroundImage = "url(image/rs200yellow.png)";
}
blueBtn.onclick = function(){
bike.style.backgroundImage = "url(image/rs200tr1.png)";
}
blackBtn.onclick = function(){
bike.style.backgroundImage = "url(image/car-6.png)";
}
*/
  