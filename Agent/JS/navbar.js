let state = false;

const navbar = document.getElementById("sidebar");
const menuBtn = document.getElementById("menu");

menuBtn.addEventListener("click", function () {
  if (navbar.classList.contains("absolute")) {
    openNavbar();
    state = true;
  } else {
    closeNavbar();
  }
});

// Add a click event listener to the document
document.addEventListener("click", function (event) {
  if (event.target != menuBtn && !menuBtn.contains(event.target)) {
    if (event.target != navbar && !navbar.contains(event.target)) {
      closeNavbar();
    }
  }
});

const openNavbar = () => {
  navbar.classList.add("left-0");
  navbar.classList.remove("-left-full");
};

const closeNavbar = () => {
  navbar.classList.add("-left-full");
  navbar.classList.remove("left-0");
};
