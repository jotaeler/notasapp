<!--
<div class="users view large-10 medium-9 columns">
  <?php foreach ($notes as $note) {?>
    <div class="large-5 columns strings">
        <h6 class="subheader"><?= __($note->title) ?></h6>
        <?= h($note->content) ?>
        <br></br>
    </div>
  <?php } ?>
</div>
-->

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Note[]|\Cake\Collection\CollectionInterface $notes
 */
?>
<div class="notes index large-9 medium-8 columns content">
    <h3>My Notes</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col"><?= $this->Paginator->sort('private') ?></th>
                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notes as $note): ?>
            <tr>
                <td><?= h($note->title) ?></td>
                <td><?= h($note->content) ?></td>
                <td><?= $note->private ? '<i class="fa fa-lock" aria-hidden="true"></i>' : '<i class="fa fa-unlock" aria-hidden="true"></i>' ?></td>
                <td class="actions">
                    <?= $this->Html->link('View <i class="fa fa-eye" aria-hidden="true"></i>', ['action' => 'view', $note->id], ['escape' => false]) ?>
                    <?= $this->Form->postLink('Delete <i class="fa fa-times" aria-hidden="true"></i>', ['action' => 'del', $note->id], ['confirm' => __('Are you sure you want to delete # {0}?', $note->id), 'escape' => false]) ?>
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
