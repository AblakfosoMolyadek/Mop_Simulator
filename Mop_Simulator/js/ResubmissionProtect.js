console.log("Resubmission protect is activated.");

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}