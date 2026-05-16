// $header$

CKEDITOR.editorConfig = function( config ) {

/* Start of BITWEAVER toolbar sets */
config.toolbar_Supported = [
	['Source','-','Preview'],
	['Cut','Copy','Paste','PasteText','PasteFromLibreOffice','-','Print'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	'/',
	['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
	['NumberedList','BulletedList','-','Outdent','Indent'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Link','Unlink','Anchor'],
	['Table','HorizontalRule','SpecialChar'],
	'/',
	['Styles','Format','Font','FontSize'],
	['TextColor','BGColor'],
	['Maximize','ShowBlocks','-','About']
];

config.toolbar_Beginner = [
	['Bold','Italic','Underline'],
	['NumberedList','BulletedList'],
	['Link','Unlink','Anchor'],
	['Table','HorizontalRule','SpecialChar'],
	['Maximize','-','About']
];

config.toolbar_Intermediate = [
	['Cut','Copy','Paste','PasteText','PasteFromLibreOffice'],
	['Undo','Redo','-','Find','Replace','-','SelectAll'],
	'/',
	['Bold','Italic','Underline'],
	['NumberedList','BulletedList','-','Outdent','Indent'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Link','Unlink','Anchor'],
	['Table','HorizontalRule','SpecialChar'],
	'/',
	['TextColor','BGColor'],
	['Maximize','-','About']
];

config.toolbar_Advanced = [
	['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
	['NumberedList','BulletedList','-','Outdent','Indent'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Link','Unlink','Anchor'],
	['Table','HorizontalRule','SpecialChar'],
	'/',
	['Source','-','Preview'],
	['Cut','Copy','Paste','PasteText','PasteFromLibreOffice'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	'/',
	['Styles','Format','Font','FontSize'],
	['TextColor','BGColor'],
	['Maximize','ShowBlocks','-','About']
];

/* END of BITWEAVER toolbar sets */

// Lock resize function to bitweaver window.
config.resize_minHeight = 300;
config.resize_dir = 'vertical';
config.autoParagraph = false;
config.enterMode = CKEDITOR.ENTER_P;

}; // End CKEDITOR.editorConfig function
