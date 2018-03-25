<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Performance $performance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Performance'), ['action' => 'edit', $performance->performance_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Performance'), ['action' => 'delete', $performance->performance_id], ['confirm' => __('Are you sure you want to delete # {0}?', $performance->performance_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Performances'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Performance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="performances view large-9 medium-8 columns content">
    <h3><?= h($performance->performance_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Course Names') ?></th>
            <td><?= h($performance->course_names) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution') ?></th>
            <td><?= $performance->has('institution') ? $this->Html->link($performance->institution->institution_id, ['controller' => 'Institutions', 'action' => 'view', $performance->institution->institution_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Performance Id') ?></th>
            <td><?= $this->Number->format($performance->performance_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('General Grades') ?></th>
            <td><?= $this->Number->format($performance->general_grades) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course Grades') ?></th>
            <td><?= $this->Number->format($performance->course_grades) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course Avgs') ?></th>
            <td><?= $this->Number->format($performance->course_avgs) ?></td>
        </tr>
    </table>
</div>
