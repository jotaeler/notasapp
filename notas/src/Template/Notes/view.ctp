<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Note $note
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Note'), ['action' => 'edit', $note->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Note'), ['action' => 'delete', $note->id], ['confirm' => __('Are you sure you want to delete # {0}?', $note->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Note'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
-->
<div class="notes view large-9 medium-8 columns content">
    <h3>Note detail</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row">Title</th>
            <td><?= h($note->title) ?></td>
        </tr>
        <tr>
            <th scope="row">User</th>
            <td><?= h($note->user->username) ?></td>
        </tr>
        <tr>
            <th scope="row">Created</th>
            <td><?= h($note->created) ?></td>
        </tr>
        <tr>
            <th scope="row">Modified</th>
            <td><?= h($note->modified) ?></td>
        </tr>
        <tr>
            <th scope="row">Private</th>
            <td><?= $note->private ? '<i class="fa fa-lock" aria-hidden="true"></i>' : '<i class="fa fa-unlock" aria-hidden="true"></i>' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4>Content</h4>
        <?= $this->Text->autoParagraph(h($note->content)); ?>
    </div>
</div>
