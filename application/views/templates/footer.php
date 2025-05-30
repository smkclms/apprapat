<script>
console.log('Toggle script loaded');
document.addEventListener('DOMContentLoaded', function () {
  const toggleBtn = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebar');
  const content = document.getElementById('content');

  console.log({ toggleBtn, sidebar, content });

  if (!toggleBtn || !sidebar || !content) {
    console.warn('Elemen toggle tidak ditemukan', { toggleBtn, sidebar, content });
    return;
  }

  toggleBtn.addEventListener('click', function () {
    sidebar.classList.toggle('collapsed');
    content.classList.toggle('expanded');
  });
});
</script>
