<?php use_helper('I18N') ?>
<?php
  use_stylesheet('mooDoo.2/generator.global.css');
  use_stylesheet('mooDoo.2/generator.default.css');
  use_stylesheet('mooDoo.2/generator.list.css');
  use_stylesheet('backend/items.css');
?>

<h1><?php echo __('Items List'); ?></h1>

<div class="sf_admin_list" id="items-container">
  <?php foreach ($itemsGroup as $group) : ?>
  <table>
    <thead>
      <tr>
        <th colspan="3"><?php echo $group[0]->getGroup() ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($group as $item) : ?>
      <tr>
        <td><a href="<?php echo url_for('items/edit?id='.$item->getId()) ?>"><?php echo $item->getId() ?></a></td>
        <td><?php echo $item->getTitle() ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php endforeach; ?>
</div>