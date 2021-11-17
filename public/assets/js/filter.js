$(document).ready(function() {
    $(document).on('change', '.awarding-body-check-box', function () {

        var awardingBodyIds = [];

        $('.awarding-body-check-box').each(function () {
            if ($(this).is(":checked")) {
                awardingBodyIds.push($(this).attr('name'));
                // $('#catFilters').append(`<div class="alert fade show alert-color _add-secon" role="alert"> ${$(this).attr('attr-name')}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> </div>`);
            }else{
                var removeIndex = awardingBodyIds.indexOf($(this).attr('name'));
                // awardingBodyIds = jQuery.grep(awardingBodyIds, function(value) {
                //     return value != removeIndex;
                // });

                awardingBodyIds = awardingBodyIds.filter(function(elem){
                    return elem != removeIndex;
                });

            }
        });

        // $('._t-item').text('(' + ids.length + ' items)');

        // if (counter == 0) {
        //     $('.causes_div').empty();
        //     $('.causes_div').append('No Data Found');
        // } else {
        //     fetchCauseAgainstCategory(ids);
        // }
        console.log(awardingBodyIds)
        getCoursesByAwardingId(awardingBodyIds)
    });
});



function getCoursesByAwardingId(id){

    $('.right-container').empty();

    // $serializeArray = serialize(id)

    $.ajax({
        type: 'GET',
        url: 'getCourses/' + id,
        success: function (response) {
            var response = JSON.parse(response);
            console.log(response);

            if (response.length == 0) {
                $('.right-container').append('No Data Found');
            } else {
                response.forEach(element => {
                    $('.right-container').append(`<div class="card" style="width: 300px; height: 350px; margin: 10px; border: 1px solid #ccc">
                <img class="card-img-top" src="storage/${element.image }" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-3">${element.name }  <a href="#" class="float-right d-inline-flex share"><i class="fas fa-share-alt text-primary"></i></a></h5>
                    <button type="button" class="btn btn-primary">View Now</button>
                </div>
            </div>`);
                });
            }
        }
    });
}
