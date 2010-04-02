<h1><?php echo __('Revisions List'); ?></h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Number</th>
      <th>Parent</th>
      <th>Procedure</th>
      <th>Revision state</th>
      <th>Creator</th>
      <th>Block</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($revisions as $revision): ?>
    <tr>
      <td><a href="<?php echo url_for('revisions/edit?id='.$revision->getId()) ?>"><?php echo $revision->getId() ?></a></td>
      <td><?php echo $revision->getNumber() ?></td>
      <td><?php echo $revision->getParentId() ?></td>
      <td><?php echo $revision->getProcedureId() ?></td>
      <td><?php echo $revision->getRevisionStateId() ?></td>
      <td><?php echo $revision->getCreatorId() ?></td>
      <td><?php echo $revision->getBlock() ?></td>
      <td><?php echo $revision->getCreatedAt() ?></td>
      <td><?php echo $revision->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('revisions/new') ?>">New</a>
