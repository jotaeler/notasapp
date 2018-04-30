<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Change Password') ?></legend>
        <?php
            echo $this->Form->input('oldPassword',['type' => 'password' , 'label'=>'Old password']);
            echo $this->Form->input('password1',['type'=>'password' ,'label'=>'Password']);
            echo $this->Form->input('password2',['type'=>'password' ,'label'=>'Repeat Password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>