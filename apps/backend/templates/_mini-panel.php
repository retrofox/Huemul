<section class="mini-panel">
  <div><?php echo $sf_user->getGuardUser() ?></div>
  <nav>
    <?php echo link_to(__('Logout'), 'sfGuardAuth/signout') ?> | <?php echo $sf_user->getCulture() ?>
  </nav>
</section>