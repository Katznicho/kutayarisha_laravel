$(function () {
    $('.image__remove').click(function () {
        //alert('clicked')
        $("#content-wrap").addClass('platform');
        $("..image__remove").addClass('platform');

    })
})


//show or hide password
$(function(){
    $('#hideorshowpassword').click(function(){
        const type = $('#password').attr('type');

        if(type == 'password'){
            $("password").removeAttr("type");
           $('#password').attr("type", 'text');
           $("#hideorshowpassword").removeClass('fas fa-eye-slash');
           $("#hideorshowpassword").addClass("fas fa-eye")

        }
        else{
           $("password").removeAttr("type");
           $('#password').attr("type", 'password');
           $("#hideorshowpassword").removeClass("fas fa-eye")
           $("#hideorshowpassword").addClass('fas fa-eye-slash');


        }


    })
})
