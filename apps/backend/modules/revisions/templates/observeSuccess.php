<?php use_helper('I18N', 'Date') ?>
<?php
use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.global.css');
use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.default.css');
use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.list.css');
use_stylesheet('backend/procedure.css');
?>

<?php
use_stylesheet('frontend/item.css');
?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>

<div class="head">
  <h1><?php echo '['.$procedure->getId().'] '.__('Procedure Detail'); ?></h1>
  <p><?php echo __('User'); ?>: <strong><?php echo $procedure->getCreator() ?></strong></p>
  <p><?php echo __('Created at'); ?>: <strong><?php echo format_date($procedure->getCreatedAt(), 'f') ?></strong></p>
  <p>Formulario: <strong><?php echo $procedure->getFormu() ?></strong></p>
  <p>Cantidad total de Items: <strong><?php echo $procedure->getFormu()->getItems()->count() ?></strong></p>
</div>


<?php $state = $revision->getRevisionStateId(); ?>
<div class="sf_admin_list" id="items-container">
  <section class="col-left">

    <table>

      <tbody>
        <tr>
          <td>
            <div class="blk-revision">
              <h2><?php echo $revision->getNumber() ?></h2>
              <h3><?php echo $revision->getCreator() ?></h3>
              <p>
                <span class="date"><?php echo format_date($revision->getCreatedAt(), 'd') ?></span> |
                <span class="block"><?php echo __($revision->getBlock() ? 'blocked' : 'unlocked' )?></span>
              </p>
              <div class="sidebar-right">
                <div class="state_<?php echo $revision->getRevisionStateId() ?>"><?php echo $revision->getState() ?></div>

              </div>
              <div class="description"><?php echo ($revision->getRawValue()->getDescription() != '' ? $revision->getRawValue()->getDescription() : '<p>Sin comentarios.</p>') ?></div>
            </div>
          </td>
        </tr>
        <?php foreach ($revision->getComunication() as $msg) : ?>
        <tr>
          <td>
            <strong><?php echo $msg ?></strong> | <?php echo $msg->getAuthor() ?><br />
              <?php echo $msg->getRawValue()->getMessage() ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>


    <br />
    <h2>Agregar observación</h2>
    <form id="msg-form" action="<?php echo url_for('revisions/revisionComment'.($form->getObject()->isNew() ? 'Create' : 'Update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <table>
        <?php echo $form ?>
        <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>
        <tr>
          <td colspan="2"><input type="submit" value="<?php echo __('Save'); ?>" /></td>
        </tr>

      </table>
    </form>
    
  </section>

  <section class="col-right">
    <div class="board">
      <section class="options">
        <h1><?php echo __('Options'); ?></h1>
        <ul>
          <?php if($state == 5) : ?>
          <li><?php echo link_to('Crear revisión de control', 'revisions/createControlRevision?revision_id='.$revision->getId()) ?></li>
          <?php elseif($state == 8) : ?>
          <li><?php echo link_to('Controlar revisión', 'revisions/control?id='.$revision->getId()) ?></li>
          <?php endif; ?>
          <li><?php echo link_to('ir a trámite', 'procedures/show?id='.$revision->get('procedure_id')) ?></li>
          <li><?php echo link_to('Ver todos los trámites', 'procedures/index') ?></li>
        </ul>
      </section>
    </div>
  </section>
</div>