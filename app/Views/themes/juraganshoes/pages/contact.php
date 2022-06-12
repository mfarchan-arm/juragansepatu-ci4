<?= $this->extend('themes\juraganshoes\template'); ?>

<?= $this->section('konten'); ?>
<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/themes/juraganshoes/images/bg_1.jpg'); ?>');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span> <span>Hubungi Kami</span></p>
        <h1 class="mb-0 bread">Hubungi Kami</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section contact-section bg-dark">
  <div class="container">
    <div class="row d-flex mb-5 contact-info" >
      <div class="w-100"></div>
      <div class="col-md-3 d-flex"  >
        <div class="info p-4" style="background-color: #828282;">
          <p><span>Alamat</span> <?php echo get_settings('store_address'); ?></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info p-4" style="background-color: #828282;">
          <p><span>No. HP</span> <?php echo get_settings('store_phone_number'); ?></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info p-4" style="background-color: #828282;">
          <p><span>Email:</span> <?php echo get_settings('store_email'); ?></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info p-4" style="background-color: #828282;">
          <p><span>Website</span> www.juragansepatu.com</p>
        </div>
      </div>
    </div>
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">
      <form action="<?php echo base_url('pages/send_message'); ?>" class="bg-white p-5 contact-form" method="POST">
          <?php if ($flash) : ?>
            <div class="text-success text-center" style="margin-bottom: 25px;"><?php echo $flash; ?></div>
          <?php endif; ?>
          <?php $validation = \Config\Services::validation() ?>
          <div class="form-group">
            <input type="text" name="name" class="form-control" value="<?= (logged_in() ?  user()->name : ''); ?>" placeholder="Nama" required>
            <div class="form-error text-danger font-weight-bold"> <?= $validation->getError('name'); ?></div>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" value="<?= (logged_in() ?  user()->email : ''); ?>" placeholder="Email" required>
            <div class="form-error text-danger font-weight-bold"> <?= $validation->getError('email'); ?></div>
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" value="" placeholder="Subjek pesan" required>
            <div class="form-error text-danger font-weight-bold"> <?= $validation->getError('subject'); ?></div>
          </div>
          <div class="form-group">
            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Pesan" required></textarea>
            <div class="form-error text-danger font-weight-bold"> <?= $validation->getError('message'); ?></div>
          </div>
          <div class="form-group">
            <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
          </div>
        </form>

      </div>

      <div class="col-md-6 d-flex">
        <div style="width: 100%">
          <iframe width="100%" height="600" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.2384231925157!2d102.2997022!3d-3.7582006999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36b1a0124c2879%3A0x6b1c30c8969a58ff!2sPerumnas%20UNIB!5e0!3m2!1sid!2sid!4v1654478037097!5m2!1sid!2sid" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>