<?php $this->load->view('templates/header', ['title' => 'Edit Rapat']); ?>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Datepicker -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js"></script>

<!-- Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-info text-white">
      <h5 class="mb-0"><i class="fas fa-edit"></i> Edit Rapat</h5>
    </div>
    <div class="card-body">

      <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

      <form method="post" action="<?php echo site_url('rapat/edit/'.$rapat->id_rapat); ?>">

        <div class="form-group">
          <label><i class="fas fa-heading"></i> Judul</label>
          <input type="text" name="judul" class="form-control" value="<?php echo set_value('judul', $rapat->judul); ?>" required />
        </div>

        <div class="form-group">
          <label><i class="fas fa-list-alt"></i> Agenda</label>
          <textarea name="agenda" class="form-control" rows="3" required><?php echo set_value('agenda', $rapat->agenda); ?></textarea>
        </div>

        <div class="form-group">
          <label><i class="fas fa-map-marker-alt"></i> Tempat</label>
          <input type="text" name="tempat" class="form-control" value="<?php echo set_value('tempat', isset($rapat->tempat) ? $rapat->tempat : ''); ?>" />
        </div>

        <div class="form-group">
          <label><i class="fas fa-user-tie"></i> Pemimpin Rapat</label>
          <input type="text" name="pemimpin_rapat" class="form-control" value="<?php echo set_value('pemimpin_rapat', isset($rapat->pemimpin_rapat) ? $rapat->pemimpin_rapat : ''); ?>" />
        </div>

        <div class="form-group">
          <label><i class="fas fa-calendar-alt"></i> Tanggal</label>
          <input type="date" name="tanggal" class="form-control" value="<?php echo set_value('tanggal', $rapat->tanggal); ?>" required />
        </div>

        <div class="form-group">
          <label><i class="fas fa-clock"></i> Jam Mulai</label>
          <input type="text" id="jam_mulai" name="jam_mulai" class="form-control" value="<?php echo set_value('jam_mulai'); ?>" required />
        </div>

        <div class="form-group">
          <label><i class="fas fa-clock"></i> Jam Selesai</label>
          <input type="text" id="jam_selesai" name="jam_selesai" class="form-control" value="<?php echo set_value('jam_selesai'); ?>" />
        </div>

        <div class="form-group">
          <label><i class="fas fa-info-circle"></i> Status</label>
          <select name="status" class="form-control" required>
            <?php
              $status_options = ['pending', 'berlangsung', 'selesai'];
              $current_status = set_value('status', $rapat->status);
              foreach ($status_options as $status) {
                $selected = ($status == $current_status) ? 'selected' : '';
                echo "<option value=\"$status\" $selected>" . ucfirst($status) . "</option>";
              }
            ?>
          </select>
        </div>

        <div class="form-group mt-3">
          <button type="submit" class="btn btn-info">
            <i class="fas fa-save"></i> Simpan Perubahan
          </button>
          <a href="<?php echo site_url('rapat'); ?>" class="btn btn-secondary">
            <i class="fas fa-times"></i> Batal
          </a>
        </div>

      </form>
    </div>
  </div>
</div>

<script>
  flatpickr("#jam_mulai", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
    minuteIncrement: 5
  });

  flatpickr("#jam_selesai", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
    minuteIncrement: 5
  });
</script>

<?php $this->load->view('templates/footer'); ?>
