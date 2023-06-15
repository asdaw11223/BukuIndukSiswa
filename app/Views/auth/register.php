<?= $this->extend('auth/template/index'); ?>

<?= $this->section('content'); ?>
    
  <form action="<?= url_to('register') ?>" method="post" class="form" id="a-form">
    <?= csrf_field() ?>
    <h2 class="form_title title" style="color: #181818;"><?=lang('Auth.register')?></h2>

    <?= view('Myth\Auth\Views\_message_block') ?>

    
        <input type="email" class="form__input <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
        <small id="emailHelp" class="form-text text-muted" style="width: 350px;"><?=lang('Auth.weNeverShare')?></small>

        <input type="text" class="form__input <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">

        <input type="password" name="password" class="form__input <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">

        <input type="password" name="pass_confirm" class="form__input <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
    
    <button type="submit" class="form__button button submit"><?=lang('Auth.register')?></button>

    </br>
    
    <p><?=lang('Auth.alreadyRegistered')?> <a class="link" href="<?= url_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
  </form>

<?= $this->endSection(); ?>