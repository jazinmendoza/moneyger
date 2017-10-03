<!DOCTYPE html>
<html>

<head>
    <title>Moneyger | Liabilities</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/jquery.dataTables.css">
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/datatables.min.js"></script>
    <style>
        .containter {
            max-width: 1381px;
            max-height: 700px;
        }
        .header {
            background-color: #49c973;
            width: 1378px;
            height: 90px;
        }
        h3 {
            color: white;
            margin-left: 580px;
            padding-top: 30px;
        }
        .table {
            margin-top: 10px;
        }
        .btn {
            background-color: #49c973;
            margin-left: 590px;
        }
    </style>
</head>
    
<body>
    <div class="containter">
        <div class="col-12 header">
           <h3>LIABILITIES</h3> 
        </div>
        <div class="table">
            <table id="example">
                <thead>
                    <th><b>Names</b></th>
                    <th><b>Amount</b></th>
                    <th><b>Number of Months</b></th>
                    <th><b>Due Date</b></th>
                    <th><b>Options</b></th>
                </thead>
                <tbody>
                    <?php foreach($liabilities as $l) { ?>
                       <tr>
                           <td><?php echo $l->liabilities_name?> </td>
                           <td><?php echo $l->liabilities_amount?> </td>
                           <td><?php echo $l->liabilities_months?> </td>
                           <td><?php echo $l->date_due?> </td>
                       </tr> 
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <a href="<?php echo base_url()?>index.php/AddLiabilitiesController"><button class="btn btn-success">Add a Liability</button></a>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function () {
        $("#example").DataTable();
    });
</script>