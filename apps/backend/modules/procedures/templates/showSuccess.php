<?php use_helper('I18N', 'Date') ?>
<?php
use_stylesheet('mooDoo.2/generator.global.css');
use_stylesheet('mooDoo.2/generator.default.css');
use_stylesheet('mooDoo.2/generator.list.css');
use_stylesheet('backend/procedure.css');
?>

<div class="head">
  <h1><?php echo '['.$procedure->getId().'] '.__('Procedure Detail'); ?></h1>
  <p><?php echo __('Creator'); ?>: <strong><?php echo $procedure->getCreator() ?></strong></p>
  <p><?php echo __('Created at'); ?>: <strong><?php echo format_date($procedure->getCreatedAt(), 'f') ?></strong></p>
</div>


<?php
$last_rev = $procedure->getLastRevision();
$state = $last_rev->getRevisionStateId() ;
?>

<div class="sf_admin_list" id="items-container">

  <section class="col-left">
    <table>
      <thead>
        <tr class="title">
          <th class="title"><?php echo __('Revisions') ?></th>
        </tr>
      </thead>

      <tfoot>
        <tr>
          <th >&nbsp;</th>
        </tr>
      </tfoot>

      <tbody>
        <?php foreach ($procedure->getRevisions() as $revision) : ?>
        <tr>
          <td>
            <div class="blk-revision">
              <h2><?php echo $revision->getNumber() ?></h2>
              <h3><?php echo $revision->getCreator() ?></h3>
              <div class="sidebar-right">
                <div class="state_<?php echo $revision->getRevisionStateId() ?>"><?php echo $revision->getState() ?></div>
                <div class="date"><?php echo format_date($revision->getCreatedAt(), 'd') ?></div>
                <div class="block"><?php echo __($revision->getBlock() ? 'blocked' : 'unlocked' )?></div>

                  <?php if($procedure->getLastRevision()->get('id') == $revision->get('id')) : ?>
                <div class="actions">
                  <ul>
                    <?php if ($revision->getFile() != null) : ?>
                    <li><a href="/uploads/revisions/<?php echo $revision->getFile() ?>" title="view file"><?php echo __('Download'); ?></a></li>
                    <?php endif; ?>

                    <?php if($state == 5) : ?>
                    <li><?php echo link_to('Crear revisión', 'revisions/createControlRevision?revision_id='.$last_rev->getId()) ?></li>

                    <?php elseif($state == 8) : ?>
                    <li><?php echo link_to('Controlar', 'revisions/control?id='.$last_rev->getId()) ?></li>

                    <?php endif; ?>

                  </ul>
                </div>
                  <?php endif; ?>
              </div>
              <div class="description"><?php echo ($revision->getRawValue()->getDescription() != '' ? $revision->getRawValue()->getDescription() : '<p>Sin comentarios.</p>') ?></div>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>


  </section>

  <section class="col-right">
    <div class="board">
      <section class="options">
        <h1><?php echo __('Options'); ?></h1>
        <ul>
          <li><?php echo link_to('Ver todos los trámites', 'procedures/index') ?></li>
          <?php if($state == 5) : ?>
          <li><?php echo link_to('Crear revisión de control', 'revisions/createControlRevision?revision_id='.$last_rev->getId()) ?></li>
          <?php elseif($state == 8) : ?>
          <li><?php echo link_to('Controlar revisión', 'revisions/control?id='.$last_rev->getId()) ?></li>
          <?php endif; ?>
        </ul>
      </section>

      <section class="suggestions">
        <h1><?php echo __('Suggestions'); ?></h1>
        <div class="tip">
          <?php if($state == 5) : ?>
          <p>El trámite actual cuenta con una revisión que requiere ser controlada. Es necesario <?php echo link_to('crear', 'revisions/createControlRevision?revision_id='.$last_rev->getId()) ?> una revisión de control.</p>
          <?php elseif($state == 8) : ?>
          <p>El usuario <?php echo $last_rev->getCreator() ?> ha creado una revisión de control que todavía no ha sido cerrada. Es conventiente trabajar en la misma antes de realizar alguna otra acción.</p>
          <?php endif; ?>
        </div>
      </section>
    </div>

  </section>

</div>