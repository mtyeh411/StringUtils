<?php
 
/**
 * Get translated magic words, if available
 *
 * @param string $lang Language code
 * @return array
 */
function efStringUtilsWords( $lang ) {
    $words = array();
 
    /**
     * English
     */
    $words['en'] = array(
        'lowercase' => array( 0, 'lowercase' ),
        'uppercase' => array( 0, 'uppercase' ),
        'replace'   => array( 0, 'replace' ),
        'ireplace'  => array( 0, 'ireplace' )
    );
 
    # English is used as a fallback, and the English synonyms are
    # used if a translation has not been provided for a given word
    return ( $lang == 'en' || !isset( $words[$lang] ) )
        ? $words['en']
        : array_merge( $words['en'], $words[$lang] );
}
