<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Performance[]|\Cake\Collection\CollectionInterface $performances
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Performances'), ['controller' => 'Performances','action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Performance'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="performances index large-9 medium-8 columns content">
    <h3><?= __('Search result') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('performance_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('general_grades') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_grades') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_names') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_avgs') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_names') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result): ?>
            <tr>
                <td><?= $this->Number->format($result->performance_id) ?></td>
                <td><?= $this->Number->format($result->general_grades) ?></td>
                <td><?= $this->Number->format($result->course_grades) ?></td>
                <td><?= h($result->course_names) ?></td>
                <td><?= $this->Number->format($result->course_avgs) ?></td>
                <td><?= $result->has('institution') ? $this->Html->link($result->institution->names, ['controller' => 'Institutions', 'action' => 'view', $result->institution->institution_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $result->performance_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $result->performance_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $result->performance_id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->performance_id)]) ?>
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
