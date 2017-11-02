<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editar usuario') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('name');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar cambios')) ?>
    <?= $this->Form->end() ?>
</div>