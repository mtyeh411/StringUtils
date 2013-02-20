<?php
 
if ( !defined( 'MEDIAWIKI' ) ) {
    die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}
 
$wgExtensionFunctions[] = 'wfSetupStringUtils';
 
$wgExtensionCredits['parserhook'][] = array(
    'name' => 'StringUtils',
    'version' => '1.0',
    'url' => 'http://www.mediawiki.org/wiki/Extension:StringUtils',
    'author' => 'Andreas Weyer',
    'description' => 'Manipulate strings.'
);  
 
$wgHooks['LanguageGetMagic'][]       = 'wfStringUtilsLanguageGetMagic';
 
class ExtStringUtils { 
    function toUpperCase( &$parser, $string = '' ) {
        return strtoupper($string);
    }
    function toLowerCase( &$parser, $string = '' ) {
        return strtolower($string);
    }
    function stringReplace( &$parser, $search = '', $replace = '', $subject = '' ) {
        return str_replace($search, $replace, $subject);
    }
    function stringIReplace( &$parser, $search = '', $replace = '', $subject = '' ) {
        return str_ireplace($search, $replace, $subject);
    }
}
 
function wfSetupStringUtils() {
    global $wgParser, $wgMessageCache, $wgExtStringUtils, $wgMessageCache, $wgHooks;
 
    $wgExtStringUtils = new ExtStringUtils;
 
    $wgParser->setFunctionHook( 'uppercase', array( &$wgExtStringUtils, 'toUpperCase' ) );
    $wgParser->setFunctionHook( 'lowercase', array( &$wgExtStringUtils, 'toLowerCase' ) );
    $wgParser->setFunctionHook( 'replace',   array( &$wgExtStringUtils, 'stringReplace' ) );
    $wgParser->setFunctionHook( 'ireplace',  array( &$wgExtStringUtils, 'stringIReplace' ) );
}
 
function wfStringUtilsLanguageGetMagic( &$magicWords, $langCode = 0 ) {
    require_once( dirname( __FILE__ ) . '/StringUtils.i18n.php' );
    foreach( efStringUtilsWords( $langCode ) as $word => $trans )
        $magicWords[$word] = $trans;
    return true;
}
