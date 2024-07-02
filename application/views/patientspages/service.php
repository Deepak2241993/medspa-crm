<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Service onn Patient</h4> 
    <?php if($this->session->flashdata('msg')){
          echo $this->session->flashdata('msg');
         
         
           
     }?>
    <!--///////////////////my editing here///////////////////////////////-->
        <!--<div class="form-group row">-->
        <!--<label for="inputEmail3" class="col-sm-2 col-form-label">Visit  </label>-->
        <!--<div class="col-sm-6" >-->
          <?php $array1 = array('0'=>1, '1'=>2, '2'=>3, '3'=>4, '4'=>5);
                      //   echo "<pre>";
                      // print_r($array1);
                      // echo "<br><br>";
                $array2 = $patid['p_visit_id'];

                 //echo "<pre>"; print_r($array2);
                // echo "<br><br>";

                $c = array_intersect($array1, $array2);
                $result = array_diff($array1, $c);
               //  echo "<pre>";print_r($c);
                // echo "<br><br>";

                 //echo "<pre>";print_r($result);
                // echo "<br><br>";
                // die;
                ?>
           
            <!--<select class="form-control visits" id="visits"  name="visits">-->
            <!--    <option hidden="">Select Visit</option>-->
                <?php
                //$array2 = array(1, 2, 3);
                // foreach($result as $val){
                //      echo'<option value="'.$val.'"> Visit '.$val.'</option>';    
                // }
                //var_dump(array_values($array1));
                ?>
            <!--</select>-->
            
    <!--    </div>-->
    <!--</div>-->

    <!--///////////////////my editing here///////////////////////////////-->
    
    <!-- Editing here in for loop -->
<div class="m-t-25" id="visitServices">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Service Name </label>
        <div class="col-sm-6">
            <!--<select class="form-control" id="afterup" name="sname" onchange="location = this.value;">-->
            <input type="hidden" name="visitId" id="visitId">
            <select class="form-control" id="afterup" name="sname">
                <option hidden value="">Select Service</option>
                <?php
                foreach($sdata as $ser)
                {
                ?>
                <option value="<?=base_url()?>patients/serviceOnPatient/<?= $patid['id']?>/<?= $ser->id?>/<?= $p_id[0]['pid']?>"><?=$ser->service_name?></option>
                <?php
                 }
                ?>
            </select>
        </div>
    </div>
</div>
    <!-- Editing here in for loop -->
    
</div>
</div>
</div>
</div>

<div class="clodelist"></div>

<script>
    // $(document).ready(function(){
    //     $("#visitServices").hide() ;
    //     $("#visits").change(function(){
    //     $("#visitServices").show() ;
    //     $("#visits select option[value='visit1']").blur(function(){
    //                 $("#visitServices").show() ;
    //     })
    //     })
    // })
    
  $(document).ready(function() {
    /*$('.visits').val('visit1');
    $('.visits').on('change', function() {
        console.log('click');
        if($(this).val() == 'visit1') {
            $('#visitServices').show();
            
        }
        else if ($(this).val() == 'visit3' || $(this).val() == 'visit2') {
            $('#visitServices').hide();
            
            
        }
    });*/
    $('.visits').on('change', function() {
        
        if($(this).val() != 'Visit') {
            $('#visitId').val($(this).val());
            $('#visitServices').show();
             console.log($(this).val());
            
        }
        /*else if ($(this).val() == 'visit3' || $(this).val() == 'visit2') {
            $('#visitServices').hide();
            
            
        }*/
    });
    //services call
    $('#afterup').on('change', function () {
          var url = $(this).val(); // get selected value
          var vid=$('#visitId').val();
          
          var href= url+'?vid='+vid;
           //alert(vid);
          // console.log(url);
          // console.log(href);
          if (href) { // require a URL
              window.location.href = href; // redirect
          }
          else{
          return false;
          }
      });
});
    
    
</script>