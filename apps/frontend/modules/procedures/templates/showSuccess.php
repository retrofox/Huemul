<?php use_helper('I18N', 'Date') ?>

<?php slot('sidebar') ?>

<hr />

<section class="menu_sidebar">
  <?php include_partial('procedures/procedure', array('procedure' => $procedure)) ?>
  <nav>
    <ul>
      <li><?php echo link_to(__('Add new revision'), 'revisions/new?procedure_id='.$procedure->get('id')) ?></li>
    </ul>
  </nav>
</section>

<?php end_slot(); ?>

<h1><?php echo __('Revisions List'); ?></h1>

<table>
  <thead>
    <tr>
      <th><?php echo __('Number'); ?></th>
      <th><?php echo __('State'); ?></th>
      <th><?php echo __('Created at'); ?></th>
      <th><?php echo __('Attach'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($procedure->getRevisions() as $revision): ?>
    <tr>
      <td><?php echo $revision->get('number') ?></td>
      <td class="state_<?php echo (!is_null($revision->getRevisionStateId()) ? $revision->getRevisionStateId() : 'empty')?>"><?php include_partial('procedures/state', array('revision' => $revision)) ?></td>
      <td><?php echo format_date($revision->get('created_at'), 'f') ?></td>
      <td>
        <?php if ($revision->getFile() != null) : ?>
        <a href="/uploads/revisions/<?php echo $revision->getFile() ?>" title="view file"><?php echo __('Download'); ?></a>
        <?php else :  ?>
        &mdash;
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>