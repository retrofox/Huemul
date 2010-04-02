<h1>Items List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Group</th>
      <th>Title</th>
      <th>Description</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($items as $item): ?>
    <tr>
      <td><a href="<?php echo url_for('items/edit?id='.$item->getId()) ?>"><?php echo $item->getId() ?></a></td>
      <td><?php echo $item->getGroupId() ?></td>
      <td><?php echo $item->getTitle() ?></td>
      <td><?php echo $item->getDescription() ?></td>
      <td><?php echo $item->getCreatedAt() ?></td>
      <td><?php echo $item->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('items/new') ?>">New</a>
