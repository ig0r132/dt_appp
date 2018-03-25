<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institution $institution
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $institution->institution_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $institution->institution_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="institutions form large-9 medium-8 columns content">
    <?= $this->Form->create($institution) ?>
    <fieldset>
        <legend><?= __('Edit Institution') ?></legend>
        <?php
            echo $this->Form->control('names');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
