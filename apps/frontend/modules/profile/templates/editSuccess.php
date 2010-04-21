<?php use_helper('I18N') ?>



<?php slot('sidebar') ?>
<section class="menu_sidebar">
  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS') ?></h2></li>
      <li><?php echo link_to(__('Edit profile'), 'profile/edit') ?></li>
      <li><?php echo link_to(__('Change password'), 'users/edit') ?></li>
      <li><?php echo link_to(__('Mugshot'), 'profile/editMugshot')?> </li>
    </ul>
  </nav>
</section>

<?php $profile = $sf_user->getGuardUser()->getProfile(); ?>
<?php if($profile->getMugshot() != null) : ?>
<img src="<?php echo $profile->getImageSrc('mugshot', 'thumb') ?>" alt="Mug shot!" />
<?php else : ?>
<img src="/images/default-mugshot.png" alt="Mug shot!" />
<?php endif; ?>
<?php end_slot(); ?>

<?php include_partial('form', array('form' => $form)) ?>
