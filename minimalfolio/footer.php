<footer class="site-footer">
    <!-- Footer content here -->
  </footer>
  <?php wp_footer(); ?>



<div class="custom-cursor"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Don't show on mobile
  if (/Mobi|Android|iPhone|iPad|iPod|Opera Mini|IEMobile|BlackBerry/i.test(navigator.userAgent)) return;

  document.body.classList.add('custom-cursor-active');
  const cursor = document.querySelector('.custom-cursor');
  let mouseX = 0, mouseY = 0;
  let currentX = 0, currentY = 0;
  const speed = 0.6;

  function animate() {
    currentX += (mouseX - currentX) * speed;
    currentY += (mouseY - currentY) * speed;
    if (cursor) {
      cursor.style.transform = `translate(${currentX}px, ${currentY}px)`;
    }
    requestAnimationFrame(animate);
  }

  document.addEventListener('mousemove', function(e) {
    mouseX = e.clientX;
    mouseY = e.clientY;
  });

  // Hover effect on interactive elements
  const addHover = () => cursor.classList.add('cursor-hover');
  const removeHover = () => cursor.classList.remove('cursor-hover');

  function updateInteractiveListeners() {
    const elements = document.querySelectorAll('a, button, input, textarea, select, [role="button"], .hover-target');
    elements.forEach(el => {
      el.addEventListener('mouseenter', addHover);
      el.addEventListener('mouseleave', removeHover);
    });
  }
  updateInteractiveListeners();

  animate();
});
</script>




</body>
</html>
