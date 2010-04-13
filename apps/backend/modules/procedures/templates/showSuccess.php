<?php use_helper('I18N', 'Date') ?>
<?php
use_stylesheet('mooDoo.2/generator.global.css');
use_stylesheet('mooDoo.2/generator.default.css');
use_stylesheet('mooDoo.2/generator.list.css');
use_stylesheet('backend/procedure.css');
?>

<div class="head">
  <h1><?php echo '['.$procedure->getId().'] '.__('Procedure Detail'); ?></h1>
  <p><?php echo __('User'); ?>: <strong><?php echo $procedure->getCreator() ?></strong></p>
  <p><?php echo __('Created at'); ?>: <strong><?php echo format_date($procedure->getCreatedAt(), 'f') ?></strong></p>
  <p>Formulario: <strong><?php echo $procedure->getFormu() ?></strong></p>
  <p>Cantidad total de Items: <strong><?php echo $procedure->getFormu()->getItems()->count() ?></strong></p>
</div>


<?php
//$revision = $procedure->getLastRevision();
//$state = $revision->getRevisionStateId() ;
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
        <?php foreach ($procedure->getRevisions() as $revision) : $state = $revision->getRevisionStateId(); ?>
        <tr>
          <td>
            <div class="blk-revision">
              <h2><?php echo $revision->getNumber() ?></h2>
              <h3><?php echo $revision->getCreator() ?></h3>
              <p class="info">
                <span class="date"><?php echo format_date($revision->getCreatedAt(), 'd') ?></span> | 
                <span class="block"><?php echo __($revision->getBlock() ? 'blocked' : 'unlocked' )?></span>
              </p>
              <div class="sidebar-right">
                <div class="state_<?php echo $revision->getRevisionStateId() ?>"><?php echo $revision->getState() ?></div>
                

                  <?php //if($procedure->getLastRevision()->get('id') == $revision->get('id')) : ?>
                <div class="actions">
                  <ul>
                    <?php if ($revision->getFile() != null) : ?>
                    <li><a href="/uploads/revisions/<?php echo $revision->getFile() ?>" title="view file"><?php echo __('Download'); ?></a></li>
                    <?php endif; ?>

                    <?php if($state == 5) : ?>
                    <li><?php echo link_to('Crear revisión de control', 'revisions/createControlRevision?revision_id='.$revision->getId()) ?></li>

                    <?php elseif($state == 8) : ?>

                    <li><?php echo link_to('Controlar', 'revisions/control?id='.$revision->getId()) ?></li>
                    
                    <?php elseif($state == 7) : ?>
                    <li><?php echo link_to(__('View'), 'revisions/control?id='.$revision->getId()) ?></li>
                    <li><?php echo link_to('Finalizar Trámite', 'revisions/complete?id='.$revision->get('id')) ?></li>
                    <?php endif; ?>
                    <li><?php echo link_to('Observar (<strong>'.$revision->getComunication()->count().'</strong>)', 'revisions/observe?id='.$revision->getId()) ?></li>

                  </ul>
                </div>
                  <?php //endif; ?>
              </div>
              <div class="description"><?php echo ($revision->getRawValue()->getDescription() != '' ? $revision->getRawValue()->getDescription() : '<p>Sin descripción.</p>') ?></div>
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
          <li><?php echo link_to('Crear revisión de control', 'revisions/createControlRevision?revision_id='.$revision->getId()) ?></li>
          <?php elseif($state == 8) : ?>
          <li><?php echo link_to('Controlar revisión', 'revisions/control?id='.$revision->getId()) ?></li>
          <?php endif; ?>
        </ul>
      </section>

      <section class="suggestions">
        <h1><?php echo __('Suggestions'); ?></h1>
        <div class="tip">
          <?php if($state == 5) : ?>
          <p>El trámite actual cuenta con una revisión que requiere ser controlada. Es necesario <?php echo link_to('crear', 'revisions/createControlRevision?revision_id='.$revision->getId()) ?> una revisión de control.</p>
          <?php elseif($state == 8) : ?>
          <p>El usuario <?php echo $revision->getCreator() ?> ha creado una revisión de control que todavía no ha sido cerrada. Es conventiente trabajar en la misma antes de realizar alguna otra acción.</p>
          <?php endif; ?>
        </div>
      </section>
    </div>

  </section>

</div>