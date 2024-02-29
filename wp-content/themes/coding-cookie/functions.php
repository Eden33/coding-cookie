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

    wp_enqueue_script('sh-decode-html-special-chars',
            get_stylesheet_directory_uri() . '/js/sh-decode-html-special-chars.js', array('jquery'), false, true);
}

add_action( 'wp_enqueue_scripts', 'cc_enqueue_scripts' );
 
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
</div>
<div class="powered">
    <span>Author: </span>
    <a title="Eduard Gopp on Linkedin" href="https://www.linkedin.com/in/eduard-gopp/" target="_blank">Eduard Gopp</a>
</div>
<?php
}

function exclude_single_posts_home($query) {
  if ($query->is_home() && $query->is_main_query()) {
    // 343: http://localhost:8080/bridge-pattern/
    $query->set('post__not_in', array(343)); 
  }
}

add_action('pre_get_posts', 'exclude_single_posts_home');
