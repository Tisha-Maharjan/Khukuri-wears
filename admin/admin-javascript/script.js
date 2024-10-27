


const toggleButton = document.getElementById('toggleButton');
const sidebar = document.querySelector('.sidebar');

toggleButton.addEventListener('click', function() {
  sidebar.classList.toggle('open');
  if (sidebar.classList.contains('open')) {
    sidebar.classList.remove('closed');
  } else {
    sidebar.classList.add('closed');
  }
});
