
const navbar = document.getElementById('navbar');
const menuBtn = document.getElementById('menu')
const close = document.getElementById('close')

menuBtn.addEventListener('click', function() {
  if (navbar.classList.contains('fixed')) {
    openNavbar()
  } else {
    closeNavbar();
  }
})

close.addEventListener('click', function(e) {
  closeNavbar()
})

const openNavbar = () => {
  navbar.classList.add('flex');
  navbar.classList.remove('hidden')
}

const closeNavbar = () => {
  navbar.classList.add('hidden');
  navbar.classList.remove('flex')
}