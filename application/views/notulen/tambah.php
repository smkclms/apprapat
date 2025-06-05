<?php $this->load->view('templates/header', ['title' => 'Tambah Notulen']); ?>

<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Tambah Notulen</h4>
        </div>
        <div class="card-body">

          <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

          <form method="post" action="<?php echo site_url('notulen/tambah'); ?>">
            <div class="mb-3">
              <label for="id_rapat" class="form-label">Pilih Kegiatan Rapat</label>
              <select name="id_rapat" id="id_rapat" class="form-control" required>
                <option value="">-- Pilih Rapat --</option>
                <?php foreach($rapat_list as $rapat): ?>
                  <option value="<?php echo $rapat->id_rapat; ?>" <?php echo set_select('id_rapat', $rapat->id_rapat); ?>>
                    <?php echo htmlspecialchars($rapat->judul); ?> (<?php echo $rapat->tanggal; ?>)
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="isi_notulen" class="form-label">Isi Notulen</label>
              <textarea name="isi_notulen" id="isi_notulen" class="form-control" rows="6" required><?php echo set_value('isi_notulen'); ?></textarea>
            </div>

            <div class="d-flex justify-content-between">
              <a href="<?php echo site_url('notulen'); ?>" class="btn btn-secondary">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('templates/footer'); ?>
