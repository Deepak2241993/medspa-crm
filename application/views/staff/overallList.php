<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" >
<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" >
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>All Calculation List</h4>

<a href="<?php echo base_url();?>staff/exportCSV"><button class="btn btn-success">EXPORT</button></a>

<table id="productDatatable" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Name</th>
             <th>Services</th>
           <th>Room No</th> 
            <th>Services Pay</th> 
             <th>Expense</th> 
            <th>Collection</th> 
            <th>Net</th> 
             <th>Action</th> 
           
        </tr>
    </thead>
    <tbody>
    	<?php
    	$sr =1;
        foreach($allcalution as $dt){
        
        ?>
        
        <tr>
            <td><?=$sr?></td>
            <td><?=$dt->pname ?></td>
           
            <td><?=$dt->service_name ?> </td>
           
             <td><?=$dt->room_no ?></td>
             <td><?=$dt->service_pay?$dt->service_pay:0 ?></td>
             
              <td><?=$dt->total_expens ?></td>
             <td><?=$dt->tamount ?></td>
           <td><?=$dt->tamount-$dt->total_expens ?></td> 
            
             <td>
             
             <a href="javascript:void(0);" onclick="deletedat('');" class="btn btn-danger btn-xs">Delete</a> </td> 
           
               
            
        </tr>
        <?php
        $sr++;}
    
        ?>
    </tbody>
    <!--<tfoot>
        <tr>
            <th>...</th>
        </tr>
    </tfoot>-->
</table>
</div>

</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
  $('#productDatatable').DataTable({
  dom: 'Bfrtip',
  buttons: [
    'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
  ]
} );
} );
    function deletedat(id){
        var url="<?php echo base_url();?>";
       var r=confirm("Do you want to delete this?");
        if (r==true)
          window.location = url+"staff/deletestaff/"+id;
        else
          return false;
        } 
</script>