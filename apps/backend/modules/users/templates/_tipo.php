<?php $permissions = $sf_guard_user->getPermissions(); ?>
<ul>
<?php if($permissions->count() < 1) : ?>
<li><span style="color: red">sin definir</span></li>
<?php else: ?>
<?php
$internos=false;
foreach ($permissions as $permission) : ?>
     <?php 
        if($permission->getId() == 4) echo '<li>Externo</li>';
        else $internos=true;
       ?>
<?php endforeach; ?>
<?php if($internos) echo '<li>Interno</li>'; ?>
<?php endif; ?>
</ul>