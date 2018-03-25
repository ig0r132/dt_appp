<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institution $institution
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Institution'), ['action' => 'edit', $institution->institution_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Institution'), ['action' => 'delete', $institution->institution_id], ['confirm' => __('Are you sure you want to delete # {0}?', $institution->institution_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="institutions view large-9 medium-8 columns content">
    <h3><?= h($institution->institution_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Names') ?></th>
            <td><?= h($institution->names) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Id') ?></th>
            <td><?= $this->Number->format($institution->institution_id) ?></td>
        </tr>
    </table>
</div>
