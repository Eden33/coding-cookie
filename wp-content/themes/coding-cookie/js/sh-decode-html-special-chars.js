/* 
 * Fix a bug in 'SyntaxHighlighter Evolved'-Wordpress plugin.
 * 
 * Bug description:
 * 
 * User input '[xml]<Test/>[/xml]' will be stored html encoded in the database.
 * This means `post_content` will be set to '[xml]&lt;Test/&gt;[/xml]'.
 * 
 * Anyway 'SyntaxHighlighter Evolved' may filter the `post_content` with 
 * 'htmlspecialchars' before returning it to the client. 
 * 
 * By doing so invalid markup is returned to the client:
 * &amp;lt;Test /&amp;gt;
 * 
 * Anyway to render &lt; and $gt; correctly on client side this markup 
 * is needed:
 * $lt;Test/&gt;
 * 
 * This client side script fixes this issue.
 * 
 * @author edi
 */

jQuery( document ).ready(function( $ ) {
    if(SyntaxHighlighter) {
        SyntaxHighlighter.highlight();
        $('.syntaxhighlighter').find('*').each(function() { 
            var current = $(this);
            if(current.is('code')) {
                current.html(replaceAll('\&amp;', '&', current.html()));
            }
        });
    } 
});
function replaceAll(find, replace, str) {
    return str.replace(new RegExp(find, 'g'), replace);
}


