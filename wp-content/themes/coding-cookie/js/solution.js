/* 
 * Javascript util to dynamically hide and display "answer elements" on page.
 * 
 * Used on the following pages: 
 * <ul>
 *      <li>
 *          http://www.codingcookie.com/compare-requests-with-tcpdump/
 *      </li>
 * </ul>
 * 
 * @author edi
 */
jQuery(function ($) {
    
    /**
     * Each "query element" has a "answer element".
     * 
     * As there can be more "query and answer elements on one page" they are indexed.
     * 
     * "query element" example: 
     * <span id="solution-1" class="cc-solution">Click me to display the solution.</span>
     * 
     * "answer element" answer:
     * <span id="solution-1-text">The Answer</span>
     */
    $(".cc-solution").each(function() {
        //get the id of the "query element" and derive "answer element" id
        var id = this.id;
        var answerId = "#" + id + "-text";
        
        var answerElementCount = $(answerId).length;
        if(answerElementCount === 1) {
            
            $(answerId).css('display','none');
        
            //register click handler to toggle answer "onClick"
            $(this).click(function() {
                var state = $(answerId).css('display');
                switch(state) {
                    case 'none' : 
                        $(answerId).css('display', 'block');  
                        break;
                    case 'block' : 
                        $(answerId).css('display', 'none');                      
                        break;
                    default: 
                        console.log("solution.js - unknown state: " + state + "!");
                        break;
                }          
            });
        } else {
            console.log("solution.js - element id " + answerId + " -> unexpected element count: " + answerElementCount + "!" );
        }
    });
});