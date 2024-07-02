<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Service on Patient</h4> 
    
    <!--///////////////////my editing here///////////////////////////////-->
        <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Visit  </label>
        <div class="col-sm-6" >
            <select class="form-control visits" id="visits"  name="visits">
                <option  > Visit </option>
                <option value="visit1"> Visit 1</option>
                <option value="visit2"> Visit 2</option>
                <option value="visit3"> Visit 3</option>
            </select>
        </div>
    </div>

    <!--///////////////////my editing here///////////////////////////////-->
    
    <!-- Editing here in for loop -->
<div class="m-t-25" id="visitServices">
    <?php if($this->session->flashdata('msg')){
          echo $this->session->flashdata('msg');
     }?>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Service Name </label>
        <div class="col-sm-6">
            <select class="form-control" id="afterup" name="sname" onchange="location = this.value;">
                <option hidden value="">Select Service</option>
                <?php
                foreach($sdata as $ser)
                {
                ?>
                <option value="<?=base_url()?>patients/serviceOnPatient/<?= $patid['id']?>/<?= $ser->sid?>"><?=$ser->service_name?></option>
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
    $('.visits').val('visit1');
    $('.visits').on('change', function() {
        console.log('click');
        if($(this).val() == 'visit1') {
            $('#visitServices').show();
            
        }
        else if ($(this).val() == 'visit3' || $(this).val() == 'visit2') {
            $('#visitServices').hide();
            alert($.cookie("name")) ;
            
        }
    });
});
    
    
</script>