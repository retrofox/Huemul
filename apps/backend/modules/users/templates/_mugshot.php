<?php $profile = $sf_guard_user->getProfile(); ?>
<?php if($profile->getMugshot() != null) : ?>
<img src="<?php echo $profile->getImageSrc('mugshot', 'tiny') ?>" alt="Mug shot!" />
<?php else : ?>
<img src="/images/default-mugshot_32x32.png" alt="Mug shot!" />
<?php endif; ?>