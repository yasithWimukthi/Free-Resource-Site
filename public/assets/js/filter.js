/**
 * send a ajax request when user click on the awarding body checkboxes
 * courses are filtered according to the selected awarding bodies in the left side navigation bar
 */

$(document).ready(function() {
    $(document).on('change', '.awarding-body-check-box', function () {

        var awardingBodyIds = [];

        $('.awarding-body-check-box').each(function () {
            if ($(this).is(":checked")) {
                awardingBodyIds.push($(this).attr('name'));
            }else{
                var removeIndex = awardingBodyIds.indexOf($(this).attr('name'));

                awardingBodyIds = awardingBodyIds.filter(function(elem){
                    return elem != removeIndex;
                });

            }
        });

        console.log(awardingBodyIds)
        getCoursesByAwardingId(awardingBodyIds)
    });
});


function getCoursesByAwardingId(id){

    $('.right-container').empty();
    $('.course-container').empty();

    $.ajax({
        type: 'GET',
        url: '/getCourses',
        data:{id:id},
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

                    $('.course-container').append(`
                                         <div class="form-check custom-control custom-checkbox mb-3">
                                            <input
                                                class="form-check-input custom-control-input course-check-box"
                                                type="checkbox"
                                                id="${element.name}-course-check-box"
                                                name="${element.id}"
                                            >
                                            <label class="form-check-label custom-control-label" for="${element.name}-course-check-box">${element.name }</label>
                                        </div>
                    `)
                });
            }
        }
    });
}

/**
 * send a ajax request when user click on the course name checkboxes
 * courses are filtered according to the selected courses in the left side navigation bar
 */

$(document).ready(function() {
    $(document).on('change', '.course-check-box', function () {

        var courseIds = [];

        $('.course-check-box').each(function () {
            if ($(this).is(":checked")) {
                courseIds.push($(this).attr('name'));
            }else{
                var removeIndex = courseIds.indexOf($(this).attr('name'));

                courseIds = courseIds.filter(function(elem){
                    return elem != removeIndex;
                });

            }
        });

        console.log(courseIds)
        getCoursesByCourseId(courseIds)
    });
});


function getCoursesByCourseId(id){
    $('.right-container').empty();

    $.ajax({
        type: 'GET',
        url: '/getCoursesById',
        data:{id:id},
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
