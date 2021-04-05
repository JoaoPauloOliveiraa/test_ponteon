$(document).ready(function(){
    $("#state").change(function(){
      if($.trim($("#state").val()) == ''){
        $("#city").prop('disabled', true);
      }
      else{
        $("#city").prop('disabled', false);
        
        var estado_id = $(this).val();

        $.ajax({
 
          url: '/cidades/'+estado_id,
          type: 'GET',
          dataType: 'json',
          success: function(data){

          $('select[name=city]').empty();
          $.each(data,function(key,value){

              $('select[name=city]').append('<option value="'+value.nome+'">'+value.nome+'</option>');
                   
          });
   
          }
      })
      
      }
    });
 });