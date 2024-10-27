"use strict";

// Eye in password

const passwordField = document.getElementById("passwordField");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", function () {
  const type =
    passwordField.getAttribute("type") === "password" ? "text" : "password";
  passwordField.setAttribute("type", type);

  // Change eye icon based on password visibility
  togglePassword.innerHTML = type === "password" ? "&#x1F441;" : "&#x1F441;";
});

// const passwordField = document.getElementById("passwordField");
// const togglePassword = document.getElementById("togglePassword");

// togglePassword.addEventListener("click", function () {
//   const type =
//     passwordField.getAttribute("type") === "password" ? "text" : "password";
//   passwordField.setAttribute("type", type);

//   // Change eye icon based on password visibility
//   togglePassword
//     .querySelector("ion-icon")
//     .setAttribute("name", type === "password" ? "eye-off" : "eye");
//   togglePassword
//     .querySelector("ion-icon")
//     .classList.toggle("eye-closed", type === "password");
//   togglePassword
//     .querySelector("ion-icon")
//     .classList.toggle("eye-open", type !== "password");
// });

///////////////////////////////////////////////////////////
// Make mobile navigation work
const btnNavEl = document.querySelector(".btn-mobile-nav");
const headerEl = document.querySelector(".header");

btnNavEl.addEventListener("click", function () {
  headerEl.classList.toggle("nav-open");
});

///////////////////////////////////////////////////////////
// Smooth scrolling animation
/*
const allLinks = document.querySelectorAll("a:link");
// console.log(allLinks);
allLinks.forEach(function (link) {
  link.addEventListener("click", function (e) {
    e.preventDefault();
    const href = link.getAttribute("href");
    // console.log(href);

    // Scroll back to top
    if (href === "#") {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    }

    // Scroll to other links
    if (href !== "#" && href.startsWith("#")) {
      const sectionEl = document.querySelector(href);
      // console.log(sectionEl);
      sectionEl.scrollIntoView({ behavior: "smooth" });
    }

    // Close mobile navigation
    if (link.classList.contains("main-nav-link")) {
      headerEl.classList.toggle("nav-open");
    }
  });
});
*/

///////////////////////////////////////////////////////////
// Sticky navigation

const sectionHeroEl = document.querySelector(".section-hero");

const obs = new IntersectionObserver(
  function (entries) {
    const ent = entries[0];

    if (ent.isIntersecting === false) {
      console.log(ent);

      document.body.classList.add("sticky");
    }

    if (ent.isIntersecting === true) {
      console.log(ent);

      document.body.classList.remove("sticky");
    }
  },
  {
    // In the viewport
    // 80px because height is 8rem in css
    root: null,
    threshold: 0,
    rootMargin: "-80px",
  }
);
obs.observe(sectionHeroEl);

///////////////////////////////////////////////////////////
// Fixing flexbox gap property missing in some Safari versions
function checkFlexGap() {
  var flex = document.createElement("div");
  flex.style.display = "flex";
  flex.style.flexDirection = "column";
  flex.style.rowGap = "1px";

  flex.appendChild(document.createElement("div"));
  flex.appendChild(document.createElement("div"));

  document.body.appendChild(flex);
  var isSupported = flex.scrollHeight === 1;
  flex.parentNode.removeChild(flex);
  console.log(isSupported);

  if (!isSupported) document.body.classList.add("no-flexbox-gap");
}
checkFlexGap();

// Optional: You can use JavaScript to handle additional functionality
document.addEventListener("DOMContentLoaded", function () {
  var radioButtons = document.querySelectorAll('input[type="radio"]');

  radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener("change", function () {
      // Optional: You can add additional logic here
      console.log("Selected value:", this.value);
    });
  });
});

// function checkRadio(radio) {
//   // Uncheck all radio buttons with the same name
//   var radios = document.getElementsByName(radio.name);
//   radios.forEach(function (r) {
//     r.checked = false;
//   });

//   // Check the clicked radio button
//   radio.checked = true;
// }

// var radioButtons = document.querySelectorAll('input[type="radio"]');

// radioButtons.forEach(function (radioButton) {
//   radioButton.addEventListener("click", function () {
//     // Uncheck all radio buttons
//     radioButtons.forEach(function (rb) {
//       rb.checked = false;
//     });

//     // Check the clicked radio button
//     this.checked = true;
//   });
// });

// document.addEventListener("DOMContentLoaded", function () {
//   const cursorCircle = document.getElementById("cursor-circle");

//   document.addEventListener("mousemove", function (e) {
//     const x = e.clientX;
//     const y = e.clientY;

//     cursorCircle.style.transform = `translate(${x}px, ${y}px)`;
//   });
// });

// carousel
/*
let currentIndex = 0;

function showSlide(index) {
  const carousel = document.querySelector(".carousel");
  const dots = document.querySelector(".carousel-dots");
  const totalSlides = document.querySelectorAll(".carousel-item").length;
  index = (index + totalSlides) % totalSlides;
  currentIndex = index;
  const translateValue = -index * 100 + "%";
  carousel.style.transform = "translateX(" + translateValue + ")";

  // Update active dot
  const dotList = dots.querySelectorAll(".dot");
  dotList.forEach((dot, i) => {
    dot.classList.toggle("active", i === index);
  });
}

function prevSlide() {
  showSlide(currentIndex - 1);
}

function nextSlide() {
  showSlide(currentIndex + 1);
}

// Create dots dynamically
const carousel = document.querySelector(".carousel");
const totalSlides = document.querySelectorAll(".carousel-item").length;
const dotsContainer = document.querySelector(".carousel-dots");
for (let i = 0; i < totalSlides; i++) {
  const dot = document.createElement("li");
  dot.className = "dot";
  dot.addEventListener("click", () => showSlide(i));
  dotsContainer.appendChild(dot);
}

// Show the initial slide
showSlide(currentIndex);
*/

// Cart
/* Set rates + misc */

// var taxRate = 0.05;
// var shippingRate = 15.0;
// var fadeTime = 300;

// /* Assign actions */
// $(".product-quantity input").change(function () {
//   updateQuantity(this);
// });

// $(".product-removal button").click(function () {
//   removeItem(this);
// });

// /* Recalculate cart */
// function recalculateCart() {
//   var subtotal = 0;

//   /* Sum up row totals */
//   $(".product").each(function () {
//     subtotal += parseFloat($(this).children(".product-line-price").text());
//   });

//   /* Calculate totals */
//   var tax = subtotal * taxRate;
//   var shipping = subtotal > 0 ? shippingRate : 0;
//   var total = subtotal + tax + shipping;

//   /* Update totals display */
//   $(".totals-value").fadeOut(fadeTime, function () {
//     $("#cart-subtotal").html(subtotal.toFixed(2));
//     $("#cart-tax").html(tax.toFixed(2));
//     $("#cart-shipping").html(shipping.toFixed(2));
//     $("#cart-total").html(total.toFixed(2));
//     if (total == 0) {
//       $(".checkout").fadeOut(fadeTime);
//     } else {
//       $(".checkout").fadeIn(fadeTime);
//     }
//     $(".totals-value").fadeIn(fadeTime);
//   });
// }

// /* Update quantity */
// function updateQuantity(quantityInput) {
//   /* Calculate line price */
//   var productRow = $(quantityInput).parent().parent();
//   var price = parseFloat(productRow.children(".product-price").text());
//   var quantity = $(quantityInput).val();
//   var linePrice = price * quantity;

//   /* Update line price display and recalc cart totals */
//   productRow.children(".product-line-price").each(function () {
//     $(this).fadeOut(fadeTime, function () {
//       $(this).text(linePrice.toFixed(2));
//       recalculateCart();
//       $(this).fadeIn(fadeTime);
//     });
//   });
// }

// /* Remove item from cart */
// function removeItem(removeButton) {
//   /* Remove row from DOM and recalc cart total */
//   var productRow = $(removeButton).parent().parent();
//   productRow.slideUp(fadeTime, function () {
//     productRow.remove();
//     recalculateCart();
//   });
// }
