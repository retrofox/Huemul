<?php $revision = $procedure->getLastRevision() ?>

<?php if($revision->getGroups()->count() > 0) : ?>
<table class="items_control">
  <tbody>

    <tr>
        <?php foreach ($revision->getGroups() as $itemGroup) : ?>
      <th><?php echo $itemGroup->getGroup()->getNameAcronym() ?></th>
        <?php endforeach; ?>
    </tr>

    <?php /* ?>
    <tr>
        <?php foreach ($revision->getGroups() as $itemGroup) : ?>
      <td class="item_ok"><?php echo ($revision->getItemsGroupOK($itemGroup->get('group_id')) ? $revision->getItemsGroupOK($itemGroup->get('group_id'))->count : 0 )?></td>
      <td class="item_error"><?php echo ($revision->getItemsGroupError($itemGroup->get('group_id')) ?
     * $revision->getItemsGroupError($itemGroup->get('group_id'))->count : 0 )?></td>
      <td class="item_nc"><?php echo ($revision->getItemsGroupSC($itemGroup->get('group_id')) ? $revision->getItemsGroupSC($itemGroup->get('group_id'))->count : 0 )?></td>
        <?php endforeach; ?>
    </tr>
     *
     */
    ?>

    <tr>
      <?php foreach ($revision->getGroups() as $itemGroup) : ?>
      <td class="item_<?php echo $revision->getGroupState($itemGroup->get('group_id')) ?>  "><span></span>
        <!-- input type="radio" checked class="opt-<?php //echo $revision->getGroupState($itemGroup->get('group_id')) ?>" /-->


      </td>
      <?php endforeach; ?>
    </tr>

  </tbody>
</table>
<?php endif;