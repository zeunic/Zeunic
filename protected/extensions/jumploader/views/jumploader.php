<?php

$appletOptions = array();

// Extensions
$allowedExtensions = Yii::app()->jumploader->allowedExtensions;
$_tempExt = array();

if( count( $allowedExtensions ) )
{
	foreach($allowedExtensions as $allowedExt)
	{
		$_tempExt[] = '('.$allowedExt.')';
	}
}
else
{
	$_tempExt[] = '(*)';
}

$_allowedExtensionsString = implode('|', $_tempExt);

$appletOptions['uc_fileNamePattern'] = "^.+\.(?i)({$_allowedExtensionsString})$";
$appletOptions['vc_fileNamePattern'] = "^.+\.(?i)({$_allowedExtensionsString})$";

// Max files allowed
$appletOptions['uc_maxFiles'] = Yii::app()->jumploader->maxFiles;

// Single file upload
$appletOptions['uc_maxFileLength'] = Yii::app()->jumploader->maxFileSize != '-1' ? Yii::app()->jumploader->convertToBytes(Yii::app()->jumploader->maxFileSize) : Yii::app()->jumploader->maxFileSize;

// Total file upload
$appletOptions['uc_maxLength'] = Yii::app()->jumploader->maxUploadSize != '-1' ? Yii::app()->jumploader->convertToBytes(Yii::app()->jumploader->maxUploadSize) : Yii::app()->jumploader->maxUploadSize;

// Upload URL
$appletOptions['uc_uploadUrl'] = Yii::app()->jumploader->uploadUrlAction;

// Language
$loadLanguageFile = '';
if( Yii::app()->jumploader->language != '' )
{
	$loadLanguageFile = 'messages_' . Yii::app()->jumploader->language . '.zip';
	$appletOptions['ac_messagesZipUrl'] = Yii::app()->jumploader->assetsUrl . '/messages/' . $loadLanguageFile;
}

// Debug Mode
if( Yii::app()->jumploader->debugMode !== false )
{
	$appletOptions['gc_loggingLevel'] = Yii::app()->jumploader->debugMode;
}

$otherJarFilesString = '';

// Enable Media Util?
if( Yii::app()->jumploader->enableImagesManipulation )
{
	$otherJarFilesString .= ','.Yii::app()->jumploader->assetsUrl . '/mediautil_z.jar';
}

// Enable
if( Yii::app()->jumploader->enableMetaData )
{
	$otherJarFilesString .= ','.Yii::app()->jumploader->assetsUrl . '/sanselan_z.jar';
}

// Enable FTP Upload
if( Yii::app()->jumploader->enableFtpUpload )
{
	$otherJarFilesString .= ','.Yii::app()->jumploader->assetsUrl . '/ftp_z.jar';
}

//$otherJarFilesString = rtrim( $otherJarFilesString, ',' );

Yii::app()->jumploader->appletOptions = array_merge($appletOptions, Yii::app()->jumploader->appletOptions);
Yii::app()->jumploader->appletOptions = array_merge( Yii::app()->jumploader->appletOptions, Yii::app()->jumploader->defaultAppletOptions );

?>

<applet 
	name="<?php echo Yii::app()->jumploader->appletName; ?>" 
	code="jmaster.jumploader.app.JumpLoaderApplet.class" 
	archive="<?php echo Yii::app()->jumploader->assetsUrl; ?>/jumploader_z.jar<?php echo $otherJarFilesString; ?>"
	width="<?php echo Yii::app()->jumploader->width; ?>" 
	height="<?php echo Yii::app()->jumploader->height; ?>" mayscript>
	
	<?php if( count( Yii::app()->jumploader->appletOptions ) ): ?>
		<?php foreach( Yii::app()->jumploader->appletOptions as $key => $value ): ?>
			<param name="<?php echo $key; ?>" value="<?php echo Yii::app()->jumploader->convertBooleanValue($value); ?>"/>
		<?php endforeach; ?>	
	<?php endif; ?>
	
</applet>
