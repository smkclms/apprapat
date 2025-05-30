<?php $this->load->view('templates/header', ['title' => 'Tambah Rapat']); ?>

<h3>Tambah Rapat</h3>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Datepicker CSS & JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Bahasa Indonesia untuk Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js"></script>

<!-- Flatpickr CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<form method="post" action="<?php echo site_url('rapat/tambah'); ?>">
  <div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control" value="<?php echo set_value('judul'); ?>" required />
  </div>

  <div class="mb-3">
    <label>Agenda</label>
    <textarea name="agenda" class="form-control" rows="3" required><?php echo set_value('agenda'); ?></textarea>
  </div>

  <div class="mb-3">
    <label>Tempat</label>
    <input type="text" name="tempat" class="form-control" value="<?php echo set_value('tempat', isset($rapat->tempat) ? $rapat->tempat : ''); ?>" />
  </div>

  <div class="mb-3">
    <label>Pemimpin Rapat</label>
    <input type="text" name="pemimpin_rapat" class="form-control" value="<?php echo set_value('pemimpin_rapat', isset($rapat->pemimpin_rapat) ? $rapat->pemimpin_rapat : ''); ?>" />
  </div>

  <div class="mb-3">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" value="<?php echo set_value('tanggal'); ?>" required />
  </div>
  <div class="mb-3">
    <label>Jam Mulai</label>
    <input type="text" id="jam_mulai" name="jam_mulai" class="form-control" value="<?php echo set_value('jam_mulai'); ?>" required />
  </div>

  <div class="mb-3">
    <label>Jam Selesai</label>
    <input type="text" id="jam_selesai" name="jam_selesai" class="form-control" value="<?php echo set_value('jam_selesai'); ?>" />
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?php echo site_url('rapat'); ?>" class="btn btn-secondary">Batal</a>
</form>

<script>
  $(document).ready(function(){
    $('#tanggal').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      todayHighlight: true,
      language: 'id' // pastikan file bahasa Indonesia sudah di-load jika perlu
    });
  });

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
