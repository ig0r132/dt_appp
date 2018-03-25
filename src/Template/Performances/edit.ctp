<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Performance $performance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $performance->performance_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $performance->performance_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Performances'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="performances form large-9 medium-8 columns content">
    <?= $this->Form->create($performance) ?>
    <fieldset>
        <legend><?= __('Edit Performance') ?></legend>
        <?php
            echo $this->Form->control('general_grades');
            echo $this->Form->control('course_grades');
            echo $this->Form->control('course_names');
            echo $this->Form->control('course_avgs');
            echo $this->Form->control('institution_id', ['options' => $institutions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
