<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor, introduzca su usuario y contraseña') ?></legend>
        <?= $this->Form->control('usuario') ?>
        <?= $this->Form->control('contraseña') ?>
    </fieldset>
<?= $this->Form->button(__('Entrar')); ?>
<?= $this->Form->end() ?>
</div>
