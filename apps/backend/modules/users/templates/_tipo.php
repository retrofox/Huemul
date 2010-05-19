<?php $permissions = $sf_guard_user->getPermissions(); ?>
<?php if($permissions->count() < 1) : ?>
<ul><li><span style="color: red">sin definir</span></li></ul>
<?php else: ?>
<ul>
  <?php
  foreach ($permissions as $permission) : ?>
    <?php if($permission->getId() == 1) echo '<li>Interno</li>'; ?>
    <?php if($permission->getId() == 4) echo '<li>Externo</li>'; ?>
  <?php endforeach; ?>
</ul>
<?php endif; ?>