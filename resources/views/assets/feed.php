<!-- Good NEWS -->
<fieldset class="border border-dark rounded p-3 my-3 shadow" name="event">
    <legend class="w-50 pl-2">GOOD NEWS</legend>
    <div class="alert alert-success">
        Jason scouted Marie-Claire Lavallee.
        <div class="float-right btn-sm btn-success" onclick="$(this).parent().remove()">&#10006;</div>
        <div class="float-right small mx-2">3 minutes ago</div>
    </div>

    <div class="alert alert-success">
        17 newly discovered aspiring models!
        <div class="float-right btn-sm btn-success" onclick="$(this).parent().remove()">&#10006;</div>
    </div>
</fieldset>

<!-- So - So NEWS -->
<fieldset class="border border-dark rounded p-3 my-3 shadow" name="event">
    <legend class="w-50 pl-2">SO - SO NEWS</legend>
    <div class="alert alert-danger">
        Marie-Claire Lavallee is refused.
        <div class="float-right btn-sm  btn-danger" onclick="$(this).parent().remove()">&#10006;</div>
    </div>
    <div class="alert alert-primary">
        Peter Duval is invited!
        <div class="float-right btn-sm  btn-primary" onclick="$(this).parent().remove()">&#10006;</div>
    </div>
    <div class="alert alert-primary">
        8 new applicants waiting for your votes!
        <div class="float-right btn-sm  btn-primary" onclick="$(this).parent().remove()">&#10006;</div>
    </div>
</fieldset>

<!-- BAD NEWS -->
<fieldset class="border border-dark rounded p-3 my-3 shadow" name="event">
    <legend class="w-50 pl-2">NOT GOOD NEWS</legend>
    <div class="alert alert-secondary">
        Marie-Jeanne Desanges is contracted.
        <div class="float-right btn-sm  btn-secondary" onclick="$(this).parent().remove()">&#10006;</div>
    </div>

    <div class="alert alert-secondary">
        Marie-Jeanne Desanges is contracted.
        <div class="float-right btn-sm  btn-secondary" onclick="$(this).parent().remove()">&#10006;</div>
    </div>
</fieldset>


<!-- Scripts for home page feeding -->
<script>
// retrieving all applications related to the logged scout
$('document').ready(function(){
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/getRelevantApplications",
        method: 'POST',
        success: function(result){
            var test = JSON.parse(result);
            console.log(test.length);
        }
    });
});



</script>
