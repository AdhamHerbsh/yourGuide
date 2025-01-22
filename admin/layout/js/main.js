$(document).ready(function(){







$('.up-ava').change(function(){

  $('#sb-bt').css('visibility', 'visible');
});




    $('#open-add-page').click(function(){
      $('#add-page').show();
    })

        $('#close').click(function(){
          $('#add-page').css('display', 'none');
        })



// ajax
$('#a-btn-option').click(function(){


  $.ajax({
    url: 'insert_user.php',
    method : 'POST',
    data:  $('#form-info').serialize(),
    success: function(data)
    {
      $('.err-msg').html(data);
    }
  });



});




});
