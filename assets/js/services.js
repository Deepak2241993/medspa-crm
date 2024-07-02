$(document).ready(function(){

$('.subservice').hide();
$('.newservice').show();
$('.showdata').hide();
$('#showusage').show();
$('#addservice').hide();
$('#lasertraetmenthide').hide();

$('#addfillerservice').hide();
$('#showfillerusage').show();
$('.fillertable').hide();

$('.forAccutite').hide();
$('.forMorpheus').hide();
/*$('#afterup').change(function()
{
	var sid = $(this).val();
	$.ajax({
                        url:baseurl+'services/partcularsubservice',
                        method: 'post',
                        data: {sid: sid},
                        success: function(response){
                            //var len = response.length;
                            $('#subserviceforres').html(response);
                            $('.subservice').show(); 
                        }
                    });
});*/

//    For Neurotoxin Service
$('#addservice').click(function()
    {
       $('.showdata').hide();
       $('#addservice').hide();
       $('#showusage').show();
       $('.newservice').show(); 
    });

$('#showusage').click(function()
    {
       $('.showdata').show();
       $('#addservice').show();
       $('#showusage').hide();
       $('.newservice').hide(); 
    });

//    For Filler Service
    
    $('#addfillerservice').click(function()
    {
       $('.fillerform').show();
       $('#addfillerservice').hide();
       $('#showfillerusage').show();
       $('.fillertable').hide(); 
    });

$('#showfillerusage').click(function()
    {
       $('.fillerform').hide();
       $('#addfillerservice').show();
       $('#showfillerusage').hide();
       $('.fillertable').show(); 
    });


//  For RFAL Service

      $('#rfaldevice').change(function()
    {
      var id = $(this).val();
      if(id == 13)
      {
       $('.forMorpheus').hide();
       $('.forAccutite').show();
      }
      else if(id == 14)
      {
       $('.forAccutite').hide();
       $('.forMorpheus').show();
      }
      else
      {
       $('.forAccutite').hide();
       $('.forMorpheus').hide();
      } 
    });


//  For laser Service

      $('#laser2').change(function()
    {
      var area = $(this).val();
      if(area == "other")
      {
       $('#lasertraetmenthide').show();
      }
      else
      {
        $('#lasertraetmenthide').hide();
      } 
    });

    //  For Contoura Service
/*
      $('#contoura2').change(function()
    {
      var area = $(this).val();
      if(area == "other")
      {
       $('#lasertraetmenthide').show();
      }
      else
      {
        $('#lasertraetmenthide').hide();
      } 
    });
*/



});