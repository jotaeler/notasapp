<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Note $note
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Notes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notes form large-9 medium-8 columns content">
    <?= $this->Form->create($note) ?>
    <fieldset>
        <legend>Add Note</legend>
        <?php
            echo $this->Form->input('title',['class'=> '', 'placeholder' => 'Type the tittle of the note','required']);
            echo $this->Form->textarea('content', ['class'=> '', 'placeholder' => 'Some text...','required', 'label'=>'Content']);
            //echo $this->Form->control('private', [options => ]);
            echo $this->Form->radio('private', [
                ['value'=> '0' , 'text' => 'Public'],
                ['value'=> '1' , 'text' => 'Private']
            ], ['required']);
        ?>
    </fieldset>
    <?= $this->Form->button('Submit') ?>
    <?= $this->Form->end() ?>
</div>
