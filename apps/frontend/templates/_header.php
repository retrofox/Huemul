<div id='header'>
  <?php echo image_tag('i_top_logo.jpg') ?>

  <h2>Sistema Huemul: Obras Privadas</h2>
  <h3>Dirección de Desarrollo urbano y catastro</h3>
  
  <nav id="menu">
    <ul>
    <?php if ($sf_user->isAuthenticated()):?>
      <li><?php echo link_to(__('Procedures'), '@homepage')?> </li>
      <li><?php echo link_to(__('Profile'), 'profile/edit')?> </li>
      <li><?php echo link_to(__('Account'), 'users/edit')?> </li>
      <li><?php echo link_to(__('Logout'), '@sf_guard_signout')?> </li>
    <?php else: ?>
      <li><?php echo link_to('Entrar', '@sf_guard_signin')?></li>
    <?php endif; ?>
    </ul>
  </nav>
</div>