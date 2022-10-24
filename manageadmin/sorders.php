<?php
    include_once("header.php");
?>

<style>
table {
 

  border-collapse: collapse;
  width: 500px;
  border-style: solid;
  border-width: thin;
  border:solid black;

}

td {
	padding: 10px;
	color: #636363;
	border: 1px solid #dddfe1;
  /* border:solid black; */
  
}



th, td {
  text-align: left;
  padding: 8px;
  /* border:solid black; */

}

tr:nth-child(even){
  background-color: #f2f2f2
  }

th {
  
  background-color: #54585d;
	border: 1px solid #54585d;
  color: white;
  font-weight:bold;
  border-bottom:solid black;
}
th:hover {
	background-color: #64686e;
  /* border:solid black; */
}
</style>


<div class="col-12">
    <h3 class="page-title">Orders</h3><br>
    <div class="card-body" style="text-align:right;">
    <a href='sorders_old.php'>
    <button type="submit" name="btnsub">old orders</button></a>
    </div>
    <div class="card">
    
    <?php
        // $shid=$_SESSION["shid"];
        $cnt=1;
        $od="";
        $cnn=mysqli_connect("localhost","root","","project");

        $query="select oid,count(*) as count from orderdetails where orderdetails.dod='0000-00-00 00:00:00' AND dbid=0 group by oid";
        
        
        $result=$cnn->query($query);
        $str="<table class='table table-head-fixed text-nowrap'><tr class='card-title m-b-0'><th>Sr No.</th><th>User name</th><th>Zip Code</th><th>Date of Order</th><th></th><th></th></tr>";
        while($row=$result->fetch_assoc())
        {
            $od=$row['oid']; 
            
            // echo $dbid; 
            $qry="select * from orders where oid='$od'";
            $result1=$cnn->query($qry);
            while($row=$result1->fetch_assoc())
            {
                $str.="<tr><td>$cnt</td><td style='text-transform:capitalize;'>".$row["fullname"]."</td><td>".$row["ozip"]."</td><td>".$row["doo"]."</td><td><a href='sorderdet.php?id=".$row["oid"]."'><button>view order</button></a></td><td><a href='deliver.php?id=".$row["oid"]."'><button>supply</button></a></td></tr>";

                // $del_boy="select orderdetails.dbid,orderdetails.oid,orders.oid,orderdetails.shid from orderdetails,orders where orderdetails.oid=orders.oid AND orderdetails.oid='$od' AND shid='$shid'";
                       
                $cnt++; 
            } 
        }    
              
        $str.="</table>";
        echo $str; 
  
    ?>
    
</div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery.3.4.1.slim.min.js"> </script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- update -->
<script>
    $(document).ready(function(){

    $('.edit_btn_ajax').click(function(e){
		e.preventDefault();
		  var editid = $(this).closest("tr").find('.edit_id_value').val();
          console.log(editid);


          swal({
  title: "Are you sure?",
  text: "Ready to deliver this orders",
  icon: "info",
  buttons: true,
  // dangerMode: true,
})
.then((willedit) => {
  if (willedit) {
    $.ajax({
        type:"POST",
        url:"sorderdet_u.php",
        data:{
            "edit_btn_set":1,
            "edit_id":editid,
        },
        

        success:function(response){
          swal("Order Delivered sucessfully.",{
                icon: "success",
            }).then((result)=>{
              window.location.href="sorderdet_u.php?id=" +editid;
            });


    
  } 
});
  }
        });
        });
	});
</script>

<?php
    include_once("footer.php");
?>
