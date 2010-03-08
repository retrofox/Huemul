<?php use_helper('I18N') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>

    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id='wrapper'>
      <div id='header'>
        <?php echo image_tag('i_top_logo.jpg') ?>

        <h2>Sistema Huemul: Obras Privadas</h2>
        <h3>Dirección de Desarrollo urbano y catastro</h3>
        <?php if ($sf_user->isAuthenticated()):?>
        <div id="menu">
          <ul>
            <li><?php echo link_to(__('Procedures'), '@homepage')?> </li>
            <li><?php echo link_to(__('Profile'), 'profile/edit')?> </li>
            <li><?php echo link_to(__('Logout'), '@sf_guard_signout')?> </li>
          </ul>
        </div>
        <?php else: ?>
        <div id="menu">
          <ul>
            <li><?php echo link_to('Entrar', '@sf_guard_signin')?></li>
          </ul>
        </div>
        <?php endif; ?>
      </div>
      <div id='content'>
        <?php echo $sf_content ?>
      </div>
      <div id='footer'>
        <p>Desarrollado por <a href="http://www.xifox.net" target="_blank" class="xifox">XiFOX.net</a></p>
      </div>
    </div>
    <div id="wrapper_footer"></div>
  </body>
</html>