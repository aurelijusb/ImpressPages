<?php if (!$loggedIn) {?>
    <?php if ($registrationEnabled) { ?>
        <?php echo $registrationForm->render(); ?>
    <?php } else { ?>
        <?php echo $this->renderWidget('IpText', array('text' => $this->par('User.text_disabled_registration_error'))); ?>
    <?php } ?> 
<?php } ?>