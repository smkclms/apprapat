<h3>Log Aktivitas</h3>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Waktu</th>
      <th>User</th>
      <th>Aktivitas</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($logs as $log): ?>
      <tr>
        <td><?php echo $log->waktu; ?></td>
        <td><?php echo htmlspecialchars($log->nama ?: 'Tamu'); ?></td>
        <td><?php echo htmlspecialchars($log->aktivitas); ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
