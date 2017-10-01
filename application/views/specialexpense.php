<!DOCTYPE html>
<html>
<head>
	<title>Special Expense</title>
	<link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css'>
	<link rel='stylesheet' type="text/css" href='<?php echo base_url();?>css/sample.css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/datatables.min.css"/>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>js/datatables.min.js"></script>
	

</head>
<body>
	<div id='header2'>
		<center><b>Special Expense</b></center>
	</div>
	<br><br>	
	<center>
	<a href="<?php echo base_url("index.php/specialexpenseController/addSpecial")?>"><button type="submit" class="btn btn-default" id="spending">Create a new big spending</button></a>
		<p><i>Note: Special expense will be deducted from savings</i></p>
	</center>
	<table class=" table table-bordered " id="savings-table" class="table table-bordered table-striped table-hover">
                    <thead>
                    <th class="tie text-center">ID</th>
                    <th class="tie text-center">NAME OF SAVINGS</th>
                    <th class="tie text-center">AMOUNT SAVED</th>
                    <th class="tie text-center" style="width:20%;">ACTIONS</th>

                    <!-- <th class="tie text-center">Actions</th> -->
                    </thead>
                    <tbody>
                    	<?php foreach($savings as $s){?>
				     <tr>
				         <td><?php echo $s->savings_id;?></td>
				         <td><?php echo $s->savings_name;?></td>
						 <td><?php echo $s->amount_saved;?></td>
						 <td>
									<a href="<?php echo base_url("index.php/specialexpenseController/savings_delete/". $s->savings_id."")?>"><button class="btn btn-danger" name="delete" id="deletesav"><i class="glyphicon glyphicon-remove"></i></button></a>
				     	</td>
				     </tr>
				     <?php }?>
               		</tbody>
    </table>

	<div id="wholely">

		<center>
		<div class = "stmt">
		<p>Holiday?</p><br>
		<p>A vacation?</p><br>
		<p>A present for someone important?</p>
		</div>

		</center>
	</div>

</body>
</html>
	

<script type="text/javascript">
$(document).ready( function () {
      $('#savings-table').DataTable();
  } );

var save_method; //for save method string
    var table;

// function deleteSavings(id)
//     {
//       if(confirm('Are you sure delete this data?'))
//       {
//         // ajax delete data from database
//           $.ajax({
//             url : "<?php echo site_url('index.php/specialexpenseController/savings_delete')?>"+id,
//             type: "POST",
//             dataType: "JSON",
//             success: function(data)
//             {
//                location.reload(); 
//             },
//             error: function (jqXHR, textStatus, errorThrown)
//             {
//                 alert('Error deleting data');
//             }
//         });
 
//       }
//     }

</script>



