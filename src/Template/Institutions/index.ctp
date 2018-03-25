<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institution[]|\Cake\Collection\CollectionInterface $institutions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Performances'), ['controller' => 'Performances','action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="institutions index large-9 medium-8 columns content">
    <h3><?= __('Institutions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('institution_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('names') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($institutions as $institution): ?>
            <tr>
                <td><?= $this->Number->format($institution->institution_id) ?></td>
                <td><?= h($institution->names) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $institution->institution_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $institution->institution_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $institution->institution_id], ['confirm' => __('Are you sure you want to delete # {0}?', $institution->institution_id)]) ?>
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
