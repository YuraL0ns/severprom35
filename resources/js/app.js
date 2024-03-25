import './bootstrap';


document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('menu-button').addEventListener('mouseenter', function() {
      document.getElementById('menu-container').style.display = 'block';
    });
  
    document.getElementById('menu-container').addEventListener('mouseleave', function(e) {
      if (!e.relatedTarget || !e.relatedTarget.closest('#menu-container')) {
        document.getElementById('menu-container').style.display = 'none';
      }
    });
  });