<?php use_helper('I18N', 'Date') ?>
<?php include_partial('procedures/assets') ?>
<?php include_partial('procedures/assets.list') ?>

<div id="sf_admin_container" class="admin_list">

  <h1><?php echo __('Procedures List', array(), 'messages') ?></h1>

  <?php include_partial('procedures/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('procedures/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <ul class="menu">
      <li class="filters"><a class="opt_filter"><?php echo __('Filter'); ?></a></li>
      <li><?php echo link_to(__('Pendientes', array(), 'sf_admin'), 'procedure_collection', array('action' => 'filter'), array('query_string' => 'procedure_filters[pendientes]=1', 'method' => 'post')) ?></li>
      <li><?php echo link_to(__('Nuevos', array(), 'sf_admin'), 'procedure_collection', array('action' => 'filter'), array('query_string' => 'procedure_filters[state]=5,procedure_filters[revisions_count]=2', 'method' => 'post')) ?></li>
      <li><?php echo link_to(__('Para Autorizar', array(), 'sf_admin'), 'procedure_collection', array('action' => 'filter'), array('query_string' => 'procedure_filters[state]=7', 'method' => 'post')) ?></li>
      <li><?php echo link_to(__('Autorizados', array(), 'sf_admin'), 'procedure_collection', array('action' => 'filter'), array('query_string' => 'procedure_filters[state]=4', 'method' => 'post')) ?></li>
      <li><?php echo link_to(__('Quitar filtros', array(), 'sf_admin'), 'procedure_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?></li>
    </ul>

    <?php include_partial('procedures/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('procedure_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('procedures/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('procedures/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('procedures/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('procedures/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
