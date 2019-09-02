<?php include('header.php');
$userid = $_SESSION['userlogin'];
$search = $userid;

function tree_data($userid)
{
	global $con;
	$data = array();
	$query = mysqli_query($con,"select * from tree where user_id='$userid'");
	$result = mysqli_fetch_array($query);
	$data['left'] = $result['left'];
	$data['right'] = $result['right'];
	$data['leftcount'] = $result['leftcount'];
	$data['rightcount'] = $result['rightcount'];
	return $data;
}
?>

<?php 

if(isset($_GET['search-id']))
{
	$search_id = mysqli_real_escape_string($con,$_GET['search-id']);	
	if($search_id!="")
	{
		$query_check = mysqli_query($con,"select * from tree where user_id='$search_id'");
		
		if(mysqli_num_rows($query_check)>0)
		{
		$search = $search_id;
		}
		else
		{
			//echo '<script>alert("Access Denied");window.location.assign("genealogytree.php");</script>';
		}
	}
	else
	{
		echo '<script>alert("Access Denied");window.location.assign("genealogytree.php");</script>';
	}	 
}
?>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Genealogy Tree </h1>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div> -->
        </div>
		
		<div class="col-sm-12">
            <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-warning">Abbreviations</span>  <br />   
                		L = No. of Left Side Members <br />
                		R = No. of Right Side Members <br />
                		CC = Comfirm Commission <br />
            			PC = Pending Commission <br />
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>

		<div class="card-body">

<style type="text/css">

	.treetext
	{
		background-color: #FFF;
		border: 1px solid gray; 
		width: auto;
		max-width: 170px;
		border-radius: 1em;
		padding: 10px;
		margin: 0 10px 0 10px;
		text-align: center;
	}
	.treetextlast
	{
		background-color: #FFF;
		border: 1px solid gray; 
		width: auto;
		max-width: 50px;
		border-radius: 1em;
		padding: 10px;
		margin: 0 10px 0 10px;
		text-align: center;
		word-wrap: break-word;
	}
	.treeborder
	{
	 	border-right: 1px solid gray;
	 	height: 1em;
	}
	.treeborderleft
	{
		border-left:  1px solid gray;
		height: 1em;
	}
	.treeleftborder
	{
		border-top: 1px solid gray;
	 	border-left: 1px solid gray;
	 	height: 1em;
	}
	.treerightborder
	{
		border-top: 1px solid gray;
	 	border-right: 1px solid gray;
	 	height: 1em;	
	}
	.treetopborder
	{
		border-top: 1px solid gray;
	 	border-left: 1px solid gray;
	 	height: 1em;
	}
	.treetoprightborder
	{
		border-top: 1px solid gray;
		border-right: 1px solid gray;
		height: 1em;
	}
	p
	{
		margin: 0 auto !important;
		padding: 0 !important;
	}
	table
	{
		border-color: #fff;
		border: solid 0px;
	}

</style>

<div class="table-responsive">
<table border="1">
	<tr>
		<td colspan="20" align="center"> 
			<div class="treetext"><i class="fa fa-user fa-2x" style="color:#1430B1"></i>
			<p>1</p>
			</div>
		</td>
	</tr>

	<tr>
		<td colspan="10" class="treeborder"></td>
		<td colspan="10"></td>
	</tr>

	<tr>
		<td></td>
		<td colspan="2"><div class="treetopborder"></div></td>		
		<td colspan="2"><div class="treetopborder"></div></td>
		<td colspan="2"><div class="treetopborder"></div></td>
		<td colspan="2"><div class="treetopborder"></div></td>

		<td><div class="treetopborder"></div></td> 
		<td><div class="treetoprightborder"></div></td>
 		
 		<td colspan="2"><div class="treetoprightborder"></div></td>
		<td colspan="2"><div class="treetoprightborder"></div></td>
 		<td colspan="2"><div class="treetoprightborder"></div></td>
 		<td colspan="2"><div class="treetoprightborder"></div></td>
 		<td></td>
	</tr>

	<tr>
		
		<td colspan="2">
			<div class="treetext">
				<i class="fa fa-user fa-2x" style="color:#1430B1"></i>
				<p>2</p>
			</div>
		</td>

		<td colspan="2">
			<div class="treetext">
				<i class="fa fa-user fa-2x" style="color:#1430B1"></i>
				<p>3</p>
			</div>
		</td>
		
		<td colspan="2">
			<div class="treetext">
				<i class="fa fa-user fa-2x" style="color:#1430B1"></i>
				<p>4</p>
			</div>
		</td>
		
		<td colspan="2">
			<div class="treetext">
				<i class="fa fa-user fa-2x" style="color:#1430B1"></i>
				<p>5</p>
			</div>
		</td>
		
		<td colspan="2">
			<div class="treetext">
				<i class="fa fa-user fa-2x" style="color:#1430B1"></i>
				<p>6</p>
			</div>
		</td>
		
		<td colspan="2">
			<div class="treetext">
				<i class="fa fa-user fa-2x" style="color:#1430B1"></i>
				<p>7</p>
			</div>
		</td>
		
		<td colspan="2">
			<div class="treetext">
				<i class="fa fa-user fa-2x" style="color:#1430B1"></i>
				<p>8</p>
			</div>
		</td>
		
		<td colspan="2">
			<div class="treetext">
				<i class="fa fa-user fa-2x" style="color:#1430B1"></i>
				<p>9</p>
			</div>
		</td>

		<td colspan="2">
			<div class="treetext">
				<i class="fa fa-user fa-2x" style="color:#1430B1"></i>
				<p>10</p>
			</div>
		</td>

		<td colspan="2">
			<div class="treetext">
				<i class="fa fa-user fa-2x" style="color:#1430B1"></i>
				<p>11</p>
			</div>
		</td>
	
	</tr>
</table>
</div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

</div><!-- /#right-panel -->

<?php include('footer.php') ?>

    <!-- <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script> -->