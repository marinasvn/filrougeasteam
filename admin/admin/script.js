$(document).ready(function() {
     $("#add").click(function() {
         $("#addUserForm").css('display','block');
     });
     $("#connect").click(function() {
         $("#connectForm").css('display','block');
     });
            
     $("#fermerAddUserForm").click(function() {
         $("#addUserForm").css('display','none');
     });
     $("#fermerConnectForm").click(function() {
         $("#connectForm").css('display','none');
    });
            
});


$(document).ready(function() {
    $(".edit").click(function() {
         var clicked = $(this).parent('.article').find('article:first-child');
          clicked.css('display','none');
         $(this).css('display','none');
        
         $(this).parent('.article').find('article:last-child').css('display', 'block');
     });
});


$(document).ready(function() {
    $(".editCat").click(function() {
        var clicked = $(this).parent('div').find('.hiddenFormCat');
        clicked.css('display','block');
        
    });
});





