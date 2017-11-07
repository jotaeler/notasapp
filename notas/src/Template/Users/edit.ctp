<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit username') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('name');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save changes')) ?>
    <?= $this->Form->end() ?>
</div>
