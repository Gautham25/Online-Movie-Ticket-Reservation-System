$(document).ready(function(){
    var path = '/book-myshow/ajax_validations/ajax_book_myshow.php';

$("#login-page #signin").click(function(e){
    // e.preventDefault();
    var user_name = $("#login-page #username").val();
   var password = $("#login-page #password").val();
    if(user_name==''){
        alert('Enter Username');
        return false;
    }
    if(password==''){
        alert('Enter Password');
        return false;}
    });
    // pathArray = window.location.pathname.split( '/' );
    // host = pathArray[0];
    // $.ajax({
    //    url:host+'/book_myshow/ajax_validations/ajax_selectmovie_result.php?d_id='+d_id,
    //    success:function(data){
    //        $('#select-theatre').html(data);
    //        $('#select-theatre').css('display', 'block');
    //    }
    // });
});
