<?php
global $gBitSystem, $gBitThemes;

$pRegisterHash = [
	"package_name" => "ckeditor",
	"package_path" => dirname( dirname( __FILE__ ) )."/",
];

// fix to quieten down VS Code which can't see the dynamic creation of these ...
define( "CKEDITOR_PKG_NAME", $pRegisterHash["package_name"] );
define( "CKEDITOR_PKG_URL", BIT_ROOT_URL . basename( $pRegisterHash["package_path"] ) . "/" );
define( "CKEDITOR_PKG_PATH", BIT_ROOT_PATH . basename( $pRegisterHash["package_path"] ) . "/" );
define( "CKEDITOR_PKG_INCLUDE_PATH", BIT_ROOT_PATH . basename( $pRegisterHash["package_path"] ) . "/includes/");
define( "CKEDITOR_PKG_CLASS_PATH", BIT_ROOT_PATH . basename( $pRegisterHash["package_path"] ) . "/includes/classes/");
define( "CKEDITOR_PKG_ADMIN_PATH", BIT_ROOT_PATH . basename( $pRegisterHash["package_path"] ) . "/admin/");

$gBitSystem->registerPackage( $pRegisterHash );

if( $gBitSystem->isPackageActive( "ckeditor" ) && $gBitUser->isRegistered() && $gBitUser->hasPermission( "p_liberty_enter_html" ) ){
	if( defined( "IS_LIVE" ) && IS_LIVE ) {
		$gBitThemes->loadJavascript( CKEDITOR_PKG_PATH."ckeditor.js", false, 600, false );
	} else {
		$gBitThemes->loadJavascript( CKEDITOR_PKG_PATH."ckeditor.js", false, 600, false );
	}
}
