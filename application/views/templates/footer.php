</div> <!-- end content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var toggleBtn = document.getElementById('sidebarToggle');
  var sidebar = document.getElementById('sidebar');
  var content = document.getElementById('content');

  if (toggleBtn && sidebar && content) {
    toggleBtn.addEventListener('click', function () {
      sidebar.classList.toggle('collapsed');
      content.classList.toggle('expanded');
    });
  }
});
</script>

</body>
</html>
