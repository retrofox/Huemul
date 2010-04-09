<nav class="menu">
  <ul>
    <li class="current"><a href="#">Inicio</a></li>
    <li>
      <a href="#"><?php echo __('Procedures'); ?></a>
      <ul>
        <li>
          <?php echo link_to(__('List'), 'procedures/index') ?>
          <?php echo link_to(__('Revisions'), 'revisions/index') ?>
        </li>
      </ul>
    </li>
    <li>
      <a href="#"><?php echo __('Configuration'); ?></a>
      <ul>
        <li>
          <a href="#"><?php echo __('Users'); ?></a>
          <ul>
            <li><?php echo link_to(__('List'), 'users/index') ?></li>
            <li><?php echo link_to(__('Groups'), 'groups/index') ?></li>
            <li><?php echo link_to(__('Permissions'), 'permissions/index') ?></li>
          </ul>
        </li>
        
        <li>
          <a href="#"><?php echo __('Forms'); ?></a>
          <ul>
            <li><?php echo link_to(__('List'), 'formus/index') ?></li>
            <li><?php echo link_to(__('New form'), 'formus/new') ?></li>
          </ul>
        </li>
        <li>
          <a href="#"><?php echo __('Items'); ?></a>
          <ul>
            <li>
              <li><?php echo link_to(__('List'), 'items/index') ?></li>
              <li><?php echo link_to(__('New'), 'items/new') ?></li>
              <li><?php echo link_to(__('Types States'), 'revision_states/index') ?></li>
            </li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</nav>