$(function(){
    console.log("JQuery loaded")
    $.get( "action.php", { action: "find", entity: "person", name:"chuch" })
        .done(function( data ) {
            console.log( "Data Loaded: " + data );
        });
})