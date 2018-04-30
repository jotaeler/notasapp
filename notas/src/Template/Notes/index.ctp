<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Note[]|\Cake\Collection\CollectionInterface $notes
 */
?>
<!--nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Note'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav-->

<!--
<?php if (isset($username)) {?>
    <a href="/notas/users/logout" class="button">Logout</a>
<?php } ?>

<?php if (!isset($username)) {?>
    <a href="/notas/users/login" class="button">Login</a>
<?php } ?>
-->
<div class="notes index large-9 medium-8 columns content">
    <h3>Public Notes <i class="fa fa-unlock" aria-hidden="true"></i></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notes as $note): ?>
            <tr>
                <td><?= h($note->title) ?></td>
                <td><?= h($note->content) ?></td>
                <td><?= h($note->user->username) ?></td>
                <td class="actions">
                    <?= $this->Html->link('View <i class="fa fa-eye" aria-hidden="true"></i>', ['action' => 'view', $note->id], ['escape' => false]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
