let isOpen = false;

const sidebar = document.getElementById('sidebar');
const menuBtn = document.getElementById('menu')

menuBtn.addEventListener('click', function() {
  if (sidebar.classList.contains('absolute')) {
    openSidebar()
  } else {
    closeSidebar();
  }
})

sidebar.addEventListener('click', function(e) {
  console.dir(e.target)
})

const openSidebar = () => {
  sidebar.classList.add('left-0');
  sidebar.classList.remove('-left-full')
}

const closeSidebar = () => {
  sidebar.classList.add('-left-full');
  sidebar.classList.remove('left-0')
}