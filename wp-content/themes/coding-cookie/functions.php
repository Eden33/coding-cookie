<?php
/**
 * Coding Cookie functions.php
 * 
 * @author Eduard Gopp <eduard.gopp@gmail.com>
 */

/**
 * Enqueue custom scripts.
 * 
 * @autor edi
 */
function cc_enqueue_scripts() {
    /**
     * 'cc-solution' is currently used in this articles: 
     * <ul>
     *  <li>
     *      http://www.codingcookie.com/compare-requests-with-tcpdump/
     *  </li>
     * </ul>
     */
    wp_enqueue_script( 'cc-solution', get_stylesheet_directory_uri() . '/js/solution.js', array( 'jquery' ), false, true );  
}

add_action( 'wp_enqueue_scripts', 'cc_enqueue_scripts' );

