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
          <section class="menu_sidebar">
            <nav>
              <ul>
                <li><h2><?php echo __('OPTIONS') ?></h2></li>
                <li><?php echo link_to(__('Add new procedure'), 'procedures/new') ?></li>
                <li><?php echo link_to(__('Procedures List'), 'procedures/index') ?></li>
              </ul>
            </nav>
          </section>
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