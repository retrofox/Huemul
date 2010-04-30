<?php $profile = $procedure->getCreator()->getProfile(); ?>
<?php if($profile->getMugshot() != null) : ?>
<img src="<?php echo $profile->getImageSrc('mugshot', 'tiny') ?>" alt="<?php echo __('Mugshot') ?>" class="mugshot" />
<?php else : ?>
<img src="/images/default-mugshot_32x32.png" alt="<?php echo __('Mugshot') ?>" class="mugshot"/>
<?php endif; ?>