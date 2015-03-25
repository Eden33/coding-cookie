<?php
/**
 * Coding Cookie functions.php
 * 
 * @author Eduard Gopp <eduard.gopp@gmail.com>
 */

/**
 * Enqueue custom scripts.
 * 
 * @sine 1.0
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

/**
 * @since 1.0
 * @author edi
 */
function cc_wp_head() {
    
    // add search engine meta description to author-page: 
    // http://www.codingcookie.com/author/edi
    if(is_author('edi')) {
        $about_the_author = 'Hi, my name is Eduard Gopp and I am a software developer from Austria. The goal of my website is to share knowledge and experience.';
        echo '<meta name="description" content="'.$about_the_author.'"/>';
        echo '<meta property="og:description" content="'.$about_the_author.'" />';
    }
}

add_action('wp_head', 'cc_wp_head');   
   
/**
 * Override catchbox footer function to inject custom footer content.
 * 
 * @since 1.0
 * @author edi
 */
function catchbox_footer_content() {
?>
<div class="copyright">Copyright © <?= date("Y"); ?>
    <a href="http://<?= $_SERVER['SERVER_NAME']; ?>" title="Coding Cookie">
        <span>Coding Cookie</span>
    </a>
    . All Rights Reserved.
    <a href="http://<?= $_SERVER['SERVER_NAME']; ?>/legal-notice/" title="Legal notice">
        <span> Legal Notice</span>
    </a>
</div>
<div class="powered">
    <span>Author: </span>
    <a title="Eduard Gopp on Linkedin" href="https://uk.linkedin.com/pub/eduard-gopp/a1/715/35" target="_blank">Eduard Gopp</a>
</div>
<?php
}