
<!-- Good NEWS -->
<fieldset class="border border-dark rounded p-3 my-3 shadow bg-white" id="goodApplications">
    <legend class="w-25 pl-2">
        <i class="fas fa-grin-hearts text-success" style="font-size: 30px;"></i>
        <i class="fas fa-grin-hearts text-success" style="font-size: 30px;"></i>
        <i class="fas fa-grin-hearts text-success" style="font-size: 30px;"></i>
    </legend>


</fieldset>

<!-- So - So NEWS -->
<fieldset class="border border-dark rounded p-3 my-3 shadow bg-white" id="soSoApplications">
    <legend class="w-25 pl-2">
        <i class="fas fa-bullhorn text-warning" style="font-size: 30px;"></i>
        <i class="fas fa-bullhorn text-warning" style="font-size: 30px;"></i>
        <i class="fas fa-bullhorn text-warning" style="font-size: 30px;"></i>
    </legend>

</fieldset>

<!-- BAD NEWS -->
<fieldset class="border border-dark rounded p-3 my-3 shadow bg-white" id="badApplications">
    <legend class="w-25 pl-2">
        <i class="fas fa-frown text-danger" style="font-size: 30px;"></i>
        <i class="fas fa-frown text-danger" style="font-size: 30px;"></i>
        <i class="fas fa-frown text-danger" style="font-size: 30px;"></i>
    </legend>

</fieldset>

<!-- for Information NEWS -->
<fieldset class="border border-dark rounded p-3 my-3 shadow bg-white" id="infoApplications">
    <legend class="w-25 pl-2">
        <i class="fas fa-info-circle text-info" style="font-size: 30px;"></i>
        <i class="fas fa-info-circle text-info" style="font-size: 30px;"></i>
        <i class="fas fa-info-circle text-info" style="font-size: 30px;"></i>
    </legend>

</fieldset>

<!-- Scripts for home page feeding -->
<script>

$('document').ready(function(){
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/getRelevantApplications",
        method: 'POST',
        success: function(result){
            var test = JSON.parse(result);
            var green = 0;
            var yellow = 0;
            var red = 0;
            var blue = 0;
            $.each(test, function(index, value){
                switch (value.step_id) {
                    case 'APR':
                    case 'CON':
                    case 'INV':
                    case 'WAN':
                        $('#goodApplications').append("<div class='alert alert-success'>"+
                                                        "Jason scouted Marie-Claire Lavallee."+
                                                        "<div class='float-right btn-sm btn-success'"+
                                                        ">&#10006;</div>"+
                                                        "<div class='float-right small mx-2'>3 minutes ago"+
                                                        "</div></div>");
                        break;
                    case 'NIN':
                    case 'RIV':
                    case 'SCT':
                    case 'UNC':
                    case 'VOT':
                        $('#soSoApplications').append("<div class='alert alert-warning'>"+
                                "Jason scouted Marie-Claire Lavallee."+
                                "<div class='float-right btn-sm btn-warning'"+
                                ">&#10006;</div>"+
                                "<div class='float-right small mx-2'>3 minutes ago"+
                                "</div></div>");
                        break;
                    case 'DIP':
                    case 'REF':
                        $('#badApplications').append("<div class='alert alert-danger'>"+
                                "Jason scouted Marie-Claire Lavallee."+
                                "<div class='float-right btn-sm btn-danger'"+
                                ">&#10006;</div>"+
                                "<div class='float-right small mx-2'>3 minutes ago"+
                                "</div></div>");
                        break;
                    default:
                        $('#infoApplications').append("<div class='alert alert-info'>"+
                                "Jason scouted Marie-Claire Lavallee."+
                                "<div class='float-right btn-sm btn-info'"+
                                ">&#10006;</div>"+
                                "<div class='float-right small mx-2'>3 minutes ago"+
                                "</div></div>");
                        break;
                }
                //$('#answers').children('ul').append("<li>"+value+"</li>");
            });
        }
    });
});



</script>
