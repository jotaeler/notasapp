<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor, introduzca su usuario y contraseña') ?></legend>
        <?= $this->Form->input('username', ['class'=> '', 'placeholder' => 'Enter username','required', 'autocomplete'=>'off']) ?>
        <?= $this->Form->input('password', ['class'=> '', 'placeholder' => 'Enter password','required','autocomplete'=>'off']) ?>
    </fieldset>
<?= $this->Form->button(__('Entrar')); ?>
<?= $this->Form->end() ?>
</div>
