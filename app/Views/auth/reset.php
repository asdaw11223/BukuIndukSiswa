<?= $this->extend('auth/template/index'); ?>

<?= $this->section('content'); ?>


<form action="<?= url_to('reset-password') ?>" method="post" class="form" id="a-form">
	<?= csrf_field() ?>
    
    <h2 class="form_title title" style="color: #181818;"><?=lang('Auth.resetYourPassword')?></h2>
    
	<?= view('Myth\Auth\Views\_message_block') ?>

	<p><?=lang('Auth.enterCodeEmailPassword')?></p>

		<input type="text" class="form__input <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>"
				name="token" placeholder="<?=lang('Auth.token')?>" value="<?= old('token', $token ?? '') ?>">
		<div class="invalid-feedback" style="width: 350px;">
			<?= session('errors.token') ?>
		</div>

		<input type="email" class="form__input <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
				name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
		<div class="invalid-feedback" style="width: 350px;">
			<?= session('errors.email') ?>
		</div>

	<br>

		<input type="password" class="form__input <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
				name="password" placeholder="<?=lang('Auth.newPassword')?>">
		<div class="invalid-feedback" style="width: 350px;">
			<?= session('errors.password') ?>
		</div>

		<input type="password" class="form__input <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
				name="pass_confirm" placeholder="<?=lang('Auth.newPasswordRepeat')?>">
		<div class="invalid-feedback" style="width: 350px;">
			<?= session('errors.pass_confirm') ?>
		</div>
	

	<button type="submit" class="form__button button submit"><?=lang('Auth.resetPassword')?></button>

  </form>
  

<?= $this->endSection(); ?>