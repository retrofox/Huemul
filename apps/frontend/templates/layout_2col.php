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


      <div id="container">
        <?php include_partial('global/header') ?>

        <section id="sidebar">
          <?php if (!include_slot('sidebar')) : ?>
          <h3>Slot</h3>
          <?php endif; ?>
        </section>

        <section id="content">
          <?php echo $sf_content ?>
        </section>
      </div>

      <?php include_partial('global/footer') ?>
    </div>
    
  </body>
</html>