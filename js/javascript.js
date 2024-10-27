"use strict";

document.addEventListener("DOMContentLoaded", function () {
  // Eye in password
  const passwordField = document.getElementById("passwordField");
  const togglePassword = document.getElementById("togglePassword");

  if (passwordField && togglePassword) {
    togglePassword.addEventListener("click", function () {
      const type =
        passwordField.getAttribute("type") === "password" ? "text" : "password";
      passwordField.setAttribute("type", type);

      // Change eye icon based on password visibility
      togglePassword.innerHTML = type === "password" ? "&#x1F441;" : "&#x1F441;";
    });
  }

  // Make mobile navigation work
  const btnNavEl = document.querySelector(".btn-mobile-nav");
  const headerEl = document.querySelector(".header");

  if (btnNavEl && headerEl) {
    btnNavEl.addEventListener("click", function () {
      headerEl.classList.toggle("nav-open");
    });
  }

  // Sticky navigation
  const sectionHeroEl = document.querySelector(".section-hero");

  if (sectionHeroEl) {
    const obs = new IntersectionObserver(
      function (entries) {
        const ent = entries[0];

        if (ent.isIntersecting === false) {
          document.body.classList.add("sticky");
        }

        if (ent.isIntersecting === true) {
          document.body.classList.remove("sticky");
        }
      },
      {
        root: null,
        threshold: 0.5, // Adjust the threshold value if needed
        rootMargin: "-80px",
      }
    );
    obs.observe(sectionHeroEl);
  }

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
  var radioButtons = document.querySelectorAll('input[type="radio"]');
  radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener("change", function () {
      // Optional: You can add additional logic here
      console.log("Selected value:", this.value);
    });
  });
});
