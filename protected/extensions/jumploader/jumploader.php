<?php
/**
 * Jumploader Class file
 *
 * @author Vadim Gabriel <vadimg88[at]gmail[dot]com>
 * @link http://www.vadimg.com/
 * @copyright Vadim Gabriel
 * @license http://www.yiiframework.com/license/
 * 
 */

/**
 * 
Requirements
--------------
Yii 1.1.x or above

Description
--------------
This extension allows you to add a java applet for uploading files. It uses the famous java applet called [jumploader](http://www.jumploader.com)
It utilizes dozen of features such as:

*  Multi file uploading.
*  Image manipulation (cropping, resizing, rotating, watermarking, etc..).
*  Image metadata manipulation.
*  JavaScript callbacks (events such as upload complete, file added, file removed, file uploaded, etc...).
*  Internationalization / Multilingual (Supports dozens of languages out of the box such as french, german, danish, spanish and more).   
*  Limit for number of allowed files to upload.
*  Limit the size of each file uploaded and size of total uploaded files.
*  Custom attributes
*  Partitioned upload
*  Resume broken uploads
*  GUI customization
*  Zipped upload
*  Scaled images upload
*  Document processing
*  Upload to FTP server

Installation
--------------
Extract the archive under 'application/extensions'. Then configure your application configuration file and add the following code into the
components array.

~~~
[php]
	'components'=>array(
 		.....
 		'jumploader' => array(
 					'class' => 'ext.jumploader.jumploader',
 			),
 	 ),
~~~

You are no good to go and use the widget 'jumploaderWidget' anywhere you want to.

Usage
--------------

In order to use the widget all you need to do to display the java applet is to paste the following code anywhere in your view:

~~~
[php]
$this->widget('ext.jumploader.jumploaderwidget');
~~~

That will display the widget with it's default settings set. But the default settings wouldn't work for everyone and you will need to customize it to your needs.

So the customization is simple, We have added several properties used by the applet as the components class members so customizing the commonly used properties will be easier.

So assume we have the above widget code, and we want to specify the controller action the java applet will call in order to process the uploaded files, We need to specify the following property in the widget:


~~~
[php]
$this->widget('ext.jumploader.jumploaderwidget', array( 'uploadUrlAction' => $this->createUrl('controllerID/actionID') ));
~~~

Note: All properties that we set in the widget array can be set globally in the jumploader component configuration in the application configuration file. So the above property can be omitted if we had set the 'uploadUrlAction' in the application configuration as follows:

~~~
[php]
	'components'=>array(
 		.....
 		'jumploader' => array(
 					'class' => 'ext.jumploader.jumploader',
					'uploadUrlAction' => 'controllerID/actionID',
 			),
 	 ),
~~~

Here is an example of a widget with some commonly used properties set:

~~~
[php]
$this->widget('ext.jumploader.jumploaderwidget', array( 
													'uploadUrlAction' => $this->createUrl('controllerID/actionID'), // The uploader action that will handle the uploaded files, each file will send a request to this action
													'uploadDirectory' => Yii::getPathOfAlias('webroot.uploads'), // The uploaded directory, Basically this is only relevant if you use the Yii::app()->jumploader->uploadFiles() method that serves as a simple uploading method.
													'width'=>900, // sets the applet width
													'allowedExtensions' => array( 'jpg', 'jpeg', 'gif', 'png' ), // array of allowed extensions to upload (without the prefix dot ( . ) )
													'height'=>600, // sets the applet height
													'debugMode' => 'DEBUG', // enable debug allowed options are 'INFO', 'DEBUG', 'WARN', 'ERROR', 'FATAL', You can views those logs in the Java console. Defaults to false.
													'language' => 'fr', // Set the applet language, Currently there is a limited number of supported languages, Check the 'application/extensions/jumploader/jlassets/messages/ directory for the list of available languages.
													'maxFiles' => 5, // Number of maximum allowed files to upload. If the member refreshes the page this will be reset even if he previously uploaded. defaults to '-1' which means unlimited.
													'maxFileSize' => '17KB', // string that represents the maximum size of a single file uploaded, Examples: '10MB', '1024KB', '2GB' etc. Defaults to '-1' which means unlimited.
													'maxUploadSize' => '33KB', // string that represents the maximum size of total files uploaded, Examples: '10MB', '1024KB', '2GB' etc. Defaults to '-1' which means unlimited.
													));
~~~

The above example is a simple example of using the applet, Though sometimes you would want to add custom attributes that will be used within the applet. You can achieve that by setting the 'appletOptions' parameter as an array with key=>value pairs as parameters, Example:

~~~
[php]
$this->widget('ext.jumploader.jumploaderwidget', array( 
													'uploadUrlAction' => $this->createUrl('controllerID/actionID'), // The uploader action that will handle the uploaded files, each file will send a request to this action
													'uploadDirectory' => Yii::getPathOfAlias('webroot.uploads'), // The uploaded directory, Basically this is only relevant if you use the Yii::app()->jumploader->uploadFiles() method that serves as a simple uploading method.
													'width'=>900, // sets the applet width
													'height'=>600, // sets the applet height
													'debugMode' => 'DEBUG', // enable debug allowed options are 'INFO', 'DEBUG', 'WARN', 'ERROR', 'FATAL', You can views those logs in the Java console. Defaults to false.
													'language' => 'fr', // Set the applet language, Currently there is a limited number of supported languages, Check the 'application/extensions/jumploader/jlassets/messages/ directory for the list of available languages.
													'maxFiles' => 5, // Number of maximum allowed files to upload. If the member refreshes the page this will be reset even if he previously uploaded. defaults to '-1' which means unlimited.
													'maxFileSize' => '17KB', // string that represents the maximum size of a single file uploaded, Examples: '10MB', '1024KB', '2GB' etc. Defaults to '-1' which means unlimited.
													'maxUploadSize' => '33KB', // string that represents the maximum size of total files uploaded, Examples: '10MB', '1024KB', '2GB' etc. Defaults to '-1' which means unlimited.
													'appletOptions' => array(
														 					'uc_imageEditorEnabled' => false,
																			'uc_deleteTempFilesOnRemove' => true,
																			),
													));
~~~

The above code adds two applet parameters 'uc_imageEditorEnabled' and 'uc_deleteTempFilesOnRemove', The former disables the ability to edit images within the applet prior uploading which is set to true by default, While the later enables the option to delete the temporary files uploaded from the temporary files directory on the server.

In some cases you would want to upload the files to a remove FTP server. Enabling the feature is as simple as setting a property to a boolean value of false. The following code sets the property 'enableFtpUpload' to a boolean value 'true' that will add another *.jar file that handles FTP uploads.

To complete the FTP upload scenario all we need to do is to specify the property 'uploadUrlAction' to an FTP protocol. Example:

*  [More Information](http://jumploader.com/doc_ftp.html)

~~~
[php]
$this->widget('ext.jumploader.jumploaderwidget', array( 
													'uploadUrlAction' => 'ftp://user:pass@ftp.server.com/upload/dir?passive', // Here we have set an FTP protocol to handle the uploaded files. 
													'enableFtpUpload' => true,
													));
~~~

If we need or want to enter metadata for an uploaded file we can do that by setting the property 'enableMetaData' to true.

*  [More Information](http://jumploader.com/doc_metadata.html)

~~~
[php]
$this->widget('ext.jumploader.jumploaderwidget', array( 
													'enableMetaData' => true,
													));
~~~

Then we will need to specify the required metadata properties by adding those properties to the 'appletOptions' array we have discussed earlier. 


If we upload images and we want to make a thumbnail out of each on then we can do that using this applet with simple applet configuration. In the following code we set the applet to scale the images into three different images in three different sizes. 

*  [More Information](http://jumploader.com/doc_scale_images.html)

~~~
[php]
$this->widget('ext.jumploader.jumploaderwidget', array( 
													'uploadUrlAction' => $this->createUrl('controllerID/actionID'), // The uploader action that will handle the uploaded files, each file will send a request to this action
													'uploadDirectory' => Yii::getPathOfAlias('webroot.uploads'), // The uploaded directory, Basically this is only relevant if you use the Yii::app()->jumploader->uploadFiles() method that serves as a simple uploading method.
													'width'=>900, // sets the applet width
													'height'=>600, // sets the applet height
													'debugMode' => 'DEBUG', // enable debug allowed options are 'INFO', 'DEBUG', 'WARN', 'ERROR', 'FATAL', You can views those logs in the Java console. Defaults to false.
													'language' => 'fr', // Set the applet language, Currently there is a limited number of supported languages, Check the 'application/extensions/jumploader/jlassets/messages/ directory for the list of available languages.
													'maxFiles' => 5, // Number of maximum allowed files to upload. If the member refreshes the page this will be reset even if he previously uploaded. defaults to '-1' which means unlimited.
													'maxFileSize' => '17KB', // string that represents the maximum size of a single file uploaded, Examples: '10MB', '1024KB', '2GB' etc. Defaults to '-1' which means unlimited.
													'maxUploadSize' => '33KB', // string that represents the maximum size of total files uploaded, Examples: '10MB', '1024KB', '2GB' etc. Defaults to '-1' which means unlimited.
													'appletOptions' => array(
														 					'uc_imageEditorEnabled' => false,
																			'uc_uploadScaledImages' => true,
																			'uc_uploadScaledImagesNoZip' => true,
																			'uc_scaledInstanceNames' => 'small,med,large',
																			'uc_scaledInstanceDimensions' => '100x100xcrop,200x200xcrop,400x400xmax',
																			'uc_scaledInstanceQualityFactors' => '700,800,900',
																			'uc_deleteTempFilesOnRemove' => true,
																			'uc_directoriesEnabled' => true,
																			),
													));
~~~

We have set the property 'uc_uploadScaledImages' to true, To let the applet know we would like to scale images. By default scaled images are zipped into a zip archive so we set the property 'uc_uploadScaledImagesNoZip' to false to upload each scaled image as a separate image file.
  
The property 'uc_scaledInstanceNames' is a string representing the scaled image names (comma separated) in the above example we scale each image into three different images in three different sizes 'small', 'med', 'large' respectively. 

The property 'uc_scaledInstanceDimensions' is a string representing the sizes for each scaled image. In our example we have set '100x100' for the 'small' image, '200x200' for the 'med' image and '400x400' for the 'large' image. You can specify for each scaled size if the scaling should be applied using 'crop', 'min' or 'max' (please read the above link for more information regarding those values).

The property 'uc_scaledInstanceQualityFactors' is a string representing the quality of each scaled image.

We have also added 'uc_directoriesEnabled' to enable dragging an entire directory for upload.

The above code should work as is and should process each image as three images and set them to the server for further processing. 

In some cases you would want to specify a JS callback that will be triggered at some point, That can be done by specifying one of the 'ac_fire*' properties to 'true' and adding a callback based on the property key name.

So for example if we have the following widget configuration:

~~~
[php]
$this->widget('ext.jumploader.jumploaderwidget', array( 
													'uploadUrlAction' => 'ftp://user:pass@ftp.server.com/upload/dir?passive', // Here we have set an FTP protocol to handle the uploaded files. 
													'ac_fireUploaderStatusChanged' => true,
													));
~~~

We will need to add a callback entitled 'uploaderStatusChanged' with a parameter which is the uploader object. That callback is triggered for each uploaded file.

~~~
[javascript]
<script type='text/javascript'>
function uploaderStatusChanged( uploader ) {
		// Here we check if the status is 0 which means that the uploading of all files
		// finished, if it's 0 then alert that the upload process is completed.
		if( uploader.getStatus() == 0 )
		{
			alert('Upload Complete!');
		}
	}
</script>
~~~

[List of available callbacks](http://jumploader.com/api/jmaster/jumploader/model/api/config/AppletConfig.html)

Those are just some of the available options and a few examples for using the jumploader applet as an extension.

Eventually you need to actually save the files uploaded, So the extension provides a simple method that you can call in your action to process each uploaded file and save it under the directory set in the 'uploadDirectory' property in the application component or widget.

So if we want to use the built in upload files handler all we need to do is to create an action as follows:

~~~
[php]
public function actionupload()
{
	Yii::app()->jumploader->uploadFiles(); 
	
}
~~~

Note that all that method does is run through the $_FILES array and use 'move_uploaded_file' to move the file from the temporary directory to the final destination directory. 

You can basically do the same thing with your own code or use some sort of rules or even CUploadFile to upload the files (though certain customization is required and this extension does not support it by default).

Finally if you want to debug what the java applet sends to the action just use something like the following in your action

~~~
[php]
public function actionupload()
{
	var_dump($_FILES);
	var_dump($_GET);
	var_dump($_POST);
	
}
~~~

You can then view those dumped super globals through the java console.

####Note

There are lots of options you can specify in the 'appletOptions' array, You can check the [Jumpload API](http://jumploader.com/api/) or browse through their [Demos](http://jumploader.com/demo.html) to see how to fully customize the widget.

 */
class jumploader extends CApplicationComponent
{
	/**
	 * @var string the published assets URL used by this extension
	 */
	public $assetsUrl = '';
	/**
	 * @var integer The applet width
	 */
	public $width = 600;
	/**
	 * @var integer the applet height
	 */
	public $height = 400;
	/**
	 * @var string the applet name
	 */
	public $appletName = 'jumpLoaderApplet';
	/**
	 * @var string the maximum allowed size for all uploaded files
	 * Format is 10MB, 5KB, 2GB etc...
	 * default '-1' means unlimited
	 */
	public $maxUploadSize = '-1';
	/**
	 * @var string the maximum allowed size for a single file
	 * Format is 10MB, 5KB, 2GB etc...
	 * default '-1' means unlimited
	 */
	public $maxFileSize = '-1';
	/**
	 * @var int maximum number of files allowed to upload
	 * default '-1' means unlimited
	 */
	public $maxFiles = '-1';
	/**
	 * @var string Upload location, This should be an absolute url
	 * to a controller action that handles the uploaded files
	 */
	public $uploadUrlAction = 'site/upload';
	/**
	 * @var string uploaded path, the location the uploaded files will be saved at
	 * This is used if you use the  {@link Yii::app()->jumploader->uploadFiles()} method.
	 */
	public $uploadDirectory = '';
	/**
	 * @var array allowed extensions to be uploaded
	 */
	public $allowedExtensions = array( 'jpg', 'jpe', 'jpeg', 'gif', 'png', 'tif', 'tiff' );
	/**
	 * @var array the applet configurations. Please see the jumploader API documentation for the complete
	 * list of properties available.
	 */
	public $appletOptions = array();
	/**
	 * @var array default applet options - this shouldn't be used, instead use the @see appletOptions above
	 */
	public $defaultAppletOptions = array();
	/**
	 * @var string language locale to be used within the applet
	 * This should be the first two letters of the language for example: en, fr, he etc..
	 * Jumploader supports several languages by default please visit the jumploader sites to see which ones are available.
	 */
	public $language = '';
	/**
	 * @var string/boolean if false no debug will be logged.
	 * You can specify string representations for logging levels such as:
	 * INFO - log info events
	 * DEBUG - log debug events
	 * WARN - log warn events
	 * ERROR - log error events
	 * FATAL - log fatal events
	 * You can view the logs in the Java Console
	 */
	public $debugMode = false;
	/**
	 * @var boolean if you would like to use image manipulation such as cropping, resizing and the editor you 
	 * need to set this property to true and add the required applet parameters.
	 */
	public $enableImagesManipulation = false;
	/**
	 * @var boolean if you would like to include the image metadata with the request then you need to specify this
	 * property to true and add the required applet parameters.
	 */
	public $enableMetaData = false;
	/**
	 * @var boolean If you want to support ftp upload then set this property to true and add the required applet
	 * parameters.
	 */
	public $enableFtpUpload = false;
	
	/**
	 * Component initialization
	 */
	public function init()
	{
		// Publish assets folder
		Yii::setPathOfAlias('_jumploader', Yii::getPathOfAlias('ext.jumploader'));
		$this->assetsUrl = Yii::app()->assetManager->publish( Yii::getPathOfAlias('_jumploader.jlassets') );
		
		// Set default applet options
		$this->defaultAppletOptions['vc_disableLocalFileSystem'] = false;
		$this->defaultAppletOptions['vc_mainViewFileTreeViewVisible'] = true;
		$this->defaultAppletOptions['vc_mainViewFileListViewVisible'] = true;
		$this->defaultAppletOptions['vc_lookAndFeel'] = 'system';
	}
	
	/**
	 * Simple function that uploads the files into the uploadDirectory
	 * This is just as an example of how this should be used. 
	 *
	 * @throws CException
	 * @return  void
	 */
	public function uploadFiles()
	{
		// Upload Files
		if( !count($_FILES) )
		{
			throw new CException(Yii::t('extension.jumploader', 'There were no files uploaded.'), 500);
		}
		
		foreach( $_FILES as $key => $file )
		{
			if(!move_uploaded_file( $file['tmp_name'], Yii::getPathOfAlias('webroot.uploads') . '/' . $_POST['fileName'] . '-' . $file['name'] ))
			{
				throw new CException(Yii::t('extension.jumploader', 'Could not upload the files.'), 500);
			}
		}
		echo 'success';
		return;
	}
	
	/**
	 * Convert a string such as '10MB', '100KB', '2GB' into an integer of bytes
	 *
	 * @param string the string that needs to be converted into bytes
	 * @return int/boolean
	 */
	public function convertToBytes($string) 
	{
		if (preg_match('/([0-9\.]+)?([a-z]*)/i', $string, $matches)) 
		{
		 $number = $matches[1];
		 $suffix = $matches[2];
		 $suffixes = array(""=> 0, "Bytes"=>0, "KB"=>1, "MB"=>2, "GB"=>3, "TB"=>4, "PB"=>5);
			 if (isset($suffixes[$suffix]))
			 {
			  $bytes = round($number * pow(1024, $suffixes[$suffix]));
			  return $bytes;
			 } 
			 else 
			 {
			  return false;
			 }
		 } 
		else 
		{
		 return false;
		}
	}
	
	/**
	 * Set the applet options
	 * 
	 * @param array The applet options
	 * @return object
	 */
	public function setAppletOptions( $options=array() )
	{
		if(!count($options))
		{
			return $this;
		}
		
		foreach($options as $key => $value)
		{
			$this->appletOptions[ $key ] = $value;
		}
		
		return $this;
	}
	
	/**
	 * Convert a boolean value to a string if true then 'true' if false then 'false'
	 *
	 * @param mixed the value that needs to be converted if boolean to string
	 * @return mixed
	 */
	public function convertBooleanValue( $value )
	{
		if( is_bool( $value ) )
		{
			return $value === true ? 'true' : 'false';
		}
		else if( intval($value) == $value )
		{
			return $value;
		}
		else
		{
			return $value;
		}
	}
	
	
	
}