$(function() {
    var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "BASIC2",
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
        "Scheme",
    ];
    $( "#tags" ).autocomplete({
        source: availableTags,
        minLength:0
    }).bind('focus', function(){ $(this).autocomplete("search"); } );
    $('#tags').trigger("focus"); 
});