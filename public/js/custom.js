
let url = window.location.origin;
console.log('base_url is : ' + url);

$(document).ready(function () {

    let province_id;
    $('#province').on('change', function () {
        province_id = $(this).find('option:selected').val();
        $.get(url + "/get_city/" + province_id, function (data, status) {
           // console.log(data);
                $("#city").empty();
                for (i = 0; i < data.length; i++) {
                    $("#city").append($("<option/>").val(data[i]['id']).text(data[i]['name']));
                }
            }
        )
    });


});


function submitform() {
    document.myform.submit();
}



