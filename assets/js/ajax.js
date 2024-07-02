
$('#ttype2').change(function(){ 
   var sid = $(this).val();
   //$('#typesub2').empty('');
   var url=document.URL;
   $.ajax({
     url:url+'/allsubservices',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {sid: sid},
     dataType: 'json',
     success: function(response){ //debugger
       var len = response.length;
    
       if(len > 0){
          // Read values
          $('#typesub2').show();
          $.each(response,function(key,value){

                 $("#ttypesub2").append('<option value="'+value.ssid+'">'+value.sub_service_name+'</option>');

              });          
 
       }else{
         $('#typesub2').hide();
        // $('#typesub').empty('');
       }
 
     }
  });
 });


function myFunction1(){
  debugger;
  var sid = $(this).val();
   //$('#typesub2').empty('');
   var url=document.URL;
   $.ajax({
     url:url+'/allsubservices',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {sid: sid},
     dataType: 'json',
     success: function(response){ //debugger
       var len = response.length;
    
       if(len > 0){
          // Read values
          $('#typesub2').show();
          $.each(response,function(key,value){

                 $("#ttypesub2").append('<option value="'+value.ssid+'">'+value.sub_service_name+'</option>');

              });          
 
       }else{
         $('#typesub2').hide();
        // $('#typesub').empty('');
       }
 
     }
  });

}


// $(".close-primary-section").click(function(e){  debugger;
// $("#servbody_remove").html('');

//  });

 