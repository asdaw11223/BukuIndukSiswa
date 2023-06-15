
<?= $this->extend('auth/template/index'); ?>

<?= $this->section('content'); ?>


<form action="<?= url_to('forgot') ?>" method="post" class="form" id="a-form">
	<?= csrf_field() ?>
    
    <h2 class="form_title title" style="color: #181818;"><?=lang('Auth.forgotPassword')?></h2>
    
	<?= view('Myth\Auth\Views\_message_block') ?>

	<p><?=lang('Auth.enterEmailForInstructions')?></p>


	<input type="email" class="form__input <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>">
	<div class="invalid-feedback" style="width: 350px;">
		<?= session('errors.email') ?>
	</div>
	
	<button type="submit" class="form__button button submit"><?=lang('Auth.sendInstructions')?></button>

  </form>
  

<?= $this->endSection(); ?>