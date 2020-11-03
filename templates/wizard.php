<?php
/**
 * @var array $_
 * @var \OCP\IL10N $l
 * @var \OCP\Defaults $theme
 */
?>
<div id="firstrunwizard">

<div class="firstrunwizard-header">

<!--<a id="closeWizard" class="close">
	<img class="svg" src="<?php //p(image_path('core', 'actions/view-close.svg')); ?>">
</a>-->
<div class="logo">
	<p class="hidden-visually">
		<?php p($theme->getName()); ?>
	</p>
</div>

<h1><?php p($theme->getSlogan()); ?></h1>
<!--<p><?php //p($l->t('Access & share your files, calendars, contacts, mail & more from any device, on your terms'));?></p>-->

</div>

<div class="firstrunwizard-content">

<h2><?php p($l->t('Get the apps to sync your files'));?></h2>
<a target="_blank" href="<?php p($_['desktop']); ?>">
	<img src="<?php p(image_path('core', 'desktopapp.svg')); ?>"
		alt="<?php p($l->t('Desktop client'));?>" />
</a>
<a target="_blank" href="<?php p($_['android']); ?>">
	<img src="<?php p(image_path('core', 'googleplay.svg')); ?>"
		alt="<?php p($l->t('Android app'));?>" style="height:60px"/>
</a>
<a target="_blank" href="<?php p($_['ios']); ?>">
	<img src="<?php p(image_path('core', 'appstore.svg')); ?>"
		alt="<?php p($l->t('iOS app'));?>" style="height:60px"/>
</a>


<!--<h2><?php //p($l->t('Connect your desktop apps to %s', array($theme->getName()))); ?></h2>
<a target="_blank" class="button" href="<?php //p(link_to_docs('user-sync-calendars')) ?>">
	<img class="appsmall appsmall-calendar svg" alt=""
		src="<?php //p(image_path('core', 'places/calendar-dark.svg')); ?>" />
	<?php //p($l->t('Connect your calendar'));?>
</a>
<a target="_blank" class="button" href="<?php //p(link_to_docs('user-sync-contacts')) ?>">
	<img class="appsmall appsmall-contacts svg" alt=""
		src="<?php //p(image_path('core', 'places/contacts-dark.svg')); ?>" />
	<?php //p($l->t('Connect your contacts'));?>
</a>
<a target="_blank" class="button" href="<?php //p(link_to_docs('user-webdav')); ?>">
	<img class="appsmall svg" alt=""
		src="<?php //p(image_path('files', 'folder.svg')); ?>" />
	<?php //p($l->t('Access files via WebDAV'));?>
</a>-->

<br/>

<div id="checklist">
    <?php
        $defaults = \OC::$server->getThemingDefaults();
    ?>
    <p>
        <input type="checkbox" name="checkbox-agb" id="checkbox-agb" class="checkbox checkbox-confirm" <?php if($_['agb'])p('checked'); ?> value="0"/>
        <label for="checkbox-agb"><?php print_unescaped($l->t('I accept the <a target="_blank" href="%s">Terms of Use</a> for hBOX', array($defaults->getLegalNotice()))); ?>*</label>
    </p>
    <p>
        <input type="checkbox" name="checkbox-privacy" id="checkbox-privacy" class="checkbox checkbox-confirm" <?php if($_['privacy'])p('checked'); ?> value="0"/>
        <label for="checkbox-privacy"><?php print_unescaped($l->t('I accept the <a target="_blank" href="%s">Data Privacy</a> for hBOX', array($_['privacyURL']))); ?>*</label>
    </p>
	<p>
		<input type="checkbox" name="checkbox-cookie" id="checkbox-cookie" class="checkbox checkbox-confirm optional" <?php if($_['cookie'])p('checked'); ?> value="0"/>
		<label for="checkbox-cookie"><?php print_unescaped($l->t('This website uses <a target="_blank" href="%s">cookies</a> to ensure you get the best experience.', array($_['privacyURL'])));?></label>
	</p>
    <p>
        <input type="checkbox" name="checkbox-mail" id="checkbox-mail" class="checkbox checkbox-confirm optional" <?php if($_['mail'])p('checked'); ?> value="0"/>
        <label for="checkbox-mail"><?php print_unescaped($l->t('I agree to receive Mails and Newsletters')); ?></label>
    </p>
    <div id="div-confirm">
        <button class="primary" id="btn-confirm" <?php if(!$_['agb'] || !$_['privacy'])p('disabled'); ?>><?php print_unescaped($l->t('Confirm')); ?></button>
    </div>
    <br/>
    <div id="div-error">
        <span id="checklist_msg" class="msg"></span>
    </div>
</div>


<!--<p class="footnote">
<?php //print_unescaped($l->t('There’s more information in the <a target="_blank" href="%s">documentation</a> and on our <a target="_blank" href="%s">website</a>.', array($theme->getDocBaseUrl(), $theme->getBaseUrl()))); ?><br>
<?php //print_unescaped($l->t('If you like Nextcloud, <a href="mailto:?subject=Nextcloud &body=Nextcloud is a great open software to sync and share your files. You can freely get it from https://nextcloud.com"> recommend it to your friends</a> and <a href="https://nextcloud.com/contribute/" target="_blank">contribute back</a>!')); ?>
</p>-->

</div>
