var scrollToTopBtn = document.querySelector("#scrollToTopBtn");

window.addEventListener("scroll", function () {
  if (window.pageYOffset > 100) {
    scrollToTopBtn.classList.add("active");
  } else {
    scrollToTop;
    scrollToTopBtn.classList.remove("active");
  }
});

scrollToTopBtn.addEventListener("click", function () {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// toggle mobile menu
var menuToggle = document.querySelector("#menuToggle");
var nav = document.querySelector("nav");

menuToggle.addEventListener("click", function () {
  nav.classList.toggle("active");
});
