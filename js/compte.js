$(document).ready(function(){
    $('.checkdisp').prop( "disabled", true );
    $('#setimg').prop( "disabled", true );
        $('#dispname').css("display", "");
        $('#editname').css("display", "none");
    $('textarea').prop("readonly", true);
    $('.hide1').css("pointer-events", "none");
    $('.hide2').css("pointer-events", "none");
    $('.hide3').css("pointer-events", "none");
    $('.visible1').css("pointer-events", "none");
    $('.visible2').css("pointer-events", "none");
    $('.visible3').css("pointer-events", "none");
    $('.hide1').click(function(){
        $('.hide1').css("display", "none");
        $('.column1').css("display", "none");
    });
    $('.visible1').click(function(){
        $('.hide1').css("display", "");
    });
    $('.visible1').click(function(){
        $('.visible1').css("display", "none");
        $('.column1').css("display", "");
    });
    $('.hide1').click(function(){
        $('.visible1').css("display", "");
    });
    $('.hide2').click(function(){
        $('.hide2').css("display", "none");
        $('.column2').css("display", "none");
    });
    $('.visible2').click(function(){
        $('.hide2').css("display", "");
    });
    $('.visible2').click(function(){
        $('.visible2').css("display", "none");
        $('.column2').css("display", "");
    });
    $('.hide2').click(function(){
        $('.visible2').css("display", "");
    });
    $('.hide3').click(function(){
        $('.hide3').css("display", "none");
        $('.column3').css("display", "none");
    });
    $('.visible3').click(function(){
        $('.hide3').css("display", "");
    });
    $('.visible3').click(function(){
        $('.visible3').css("display", "none");
        $('.column3').css("display", "");
    });
    $('.hide3').click(function(){
        $('.visible3').css("display", "");
    });
    //
    $('.edit').click(function(){
        $('textarea').prop("readonly", false);
    $('#setimg').prop( "disabled", false );
        $('.edit').css("display", "none");
        $('.save').css("display", "");
        $('#dispname').css("display", "none");
        $('#editname').css("display", "");
        $('#bio-edit').css("display", "");
		$('#bio-disp').css("display", "none");
        $('.hide1').css("pointer-events", "");
        $('.hide2').css("pointer-events", "");
        $('.hide3').css("pointer-events", "");
        $('.visible1').css("pointer-events", "");
        $('.visible2').css("pointer-events", "");
        $('.visible3').css("pointer-events", "");
        $('.checkdisp').prop( "disabled", false );
        $('#max-width').css("background-color", "rgba(0, 0, 0, 0.8)");
    });
    $('.save').click(function(){
        $('textarea').prop("readonly", true);
		$('.save').css("display", "none");
        $('.edit').css("display", "");
		$('#bio-edit').css("display", "none");
		$('#bio-disp').css("display", "");
        $('.hide1').css("pointer-events", "none");
        $('.hide2').css("pointer-events", "none");
        $('.hide3').css("pointer-events", "none");
        $('.visible1').css("pointer-events", "none");
        $('.visible2').css("pointer-events", "none");
        $('.visible3').css("pointer-events", "none");
        $('#max-width').css("background-color", "");
    });
});