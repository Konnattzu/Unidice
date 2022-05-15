$(document).ready(function(){
    $('#likefill').click(function(){		
        $('#likefill').css("display", "none");		
        $('#likempty').css("display", "");		
        console.log('yo');	
    });	
    $('#likempty').click(function(){		
        $('#likefill').css("display", "");		
        $('#likempty').css("display", "none");	
    });	
    $('#favfill').click(function(){		
        $('#favfill').css("display", "none");		
        $('#favempty').css("display", "");	
    });	
    $('#favempty').click(function(){		
        $('#favfill').css("display", "");		
        $('#favempty').css("display", "none");	
    });				
});