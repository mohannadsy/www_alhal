<?php
include('include/nav.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<style>
    body {
    font-size: 0.8em;
}

.bold-text {
    font-weight: bold;
}
</style>
<div class="ui-widget">
  <input placeholder="ui-state-highlight" />
</div>
<div class="ui-widget">
    <input placeholder="bold-text" />
</div>
<div>hello</div>

<table class="table table-bordered" contenteditable='true' style="width:500px">
    <thead>
        <tr>
            <th contenteditable='false'>المادة</th>
            <th contenteditable='false'>الوحدة</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="ui-widget">5
                
            </td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php
include('include/footer.php');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gumby/2.6.0/js/libs/jquery-2.0.2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    (function( $ ) {
    
    // Custom autocomplete instance.
    $.widget( "app.autocomplete", $.ui.autocomplete, {
        
        // Which class get's applied to matched text in the menu items.
        options: {
            highlightClass: "ui-state-highlight"
        },
        
        _renderItem: function( ul, item ) {

            // Replace the matched text with a custom span. This
            // span uses the class found in the "highlightClass" option.
            var re = new RegExp( "(" + this.term + ")", "gi" ),
                cls = this.options.highlightClass,
                template = "<span class='" + cls + "'>$1</span>",
                label = item.label.replace( re, template ),
                $li = $( "<li/>" ).appendTo( ul );
            
            // Create and return the custom menu item content.
            $( "<a/>" ).attr( "href", "#" )
                       .html( label )
                       .appendTo( $li );
            
            return $li;
            
        }
        
    });
    
    // Demo data for autocomplete source.
    var tags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ];
    
    // Create autocomplete instances.
    $(function() {
        
        $( "input:first" ).autocomplete({
            source: tags    
        });

        $( "input:last" ).autocomplete({
            highlightClass: "bold-text",
            source: tags
        });
        
  });
    
})( jQuery );
</script>
