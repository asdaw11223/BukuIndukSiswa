
<?= $this->extend('auth/template/index'); ?>

<?= $this->section('content'); ?>


  <form action="<?= url_to('login') ?>" method="post" class="form" id="a-form">
    <?= csrf_field() ?>
    
    <h2 class="form_title title" style="color: #181818;"><?=lang('Auth.loginTitle')?></h2>
    
    <?= view('Myth\Auth\Views\_message_block') ?>

    
<?php if ($config->validFields === ['email']): ?>
							<input type="email" class="form__input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
<?php else: ?>
							<input type="text" class="form__input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
<?php endif; ?>

							<input type="password" name="password" class="form__input <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>

<?php if ($config->allowRemembering): ?>
							<label class="form__check-label">
								<input type="checkbox" name="remember" class="form__check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
								<?=lang('Auth.rememberMe')?>
							</label>
<?php endif; ?>

              <button type="submit" class="form__button button submit"><?=lang('Auth.loginAction')?></button>
                </br>
              <?php if ($config->allowRegistration) : ?>
                        <p><a href="<?= url_to('register') ?>" class="link"><?=lang('Auth.needAnAccount')?></a></p>
              <?php endif; ?>
              <?php if ($config->activeResetter): ?>
                        <p><a href="<?= url_to('forgot') ?>" class="link"><?=lang('Auth.forgotYourPassword')?></a></p>
              <?php endif; ?>
  </form>
  

<?= $this->endSection(); ?>