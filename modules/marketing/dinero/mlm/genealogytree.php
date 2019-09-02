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
	p
	{
		margin: 0 auto !important;
		padding: 0 !important;
	}

</style>

<div class="table-responsive">
<table border="0">
	<tr>
				<?php
				$data = tree_data($search);
				?>
				<td colspan="3"><div class="treetext"><p> L : <?php echo $data['leftcount']; ?></p> </div> </td>
				<td colspan="26" align="center"> 
					<div class="treetext"><i class="fa fa-user fa-2x" style="color:#1430B1"></i>
								<p>
									<?php 
										$getname=mysqli_query($con,"select * from member where uname='$search'"); 
										$getnamerow=mysqli_fetch_array($getname);
										echo ucfirst($getnamerow['fname']);	
									?>
								</p>
								<p>
									<?php echo strtoupper($search); ?>
								</p> 
								<p> 
									<?php
										$cc=mysqli_query($con,"select * from income_received where user_id='$search'");
										$ccrow=mysqli_fetch_array($cc);
									?>
									CC : <?php if($ccrow['amount']=='') { echo '0'; } else { echo $ccrow['amount']; } ?>
								</p> 
								<p> 
									PC :
									<?php 
										$pcsql = "SELECT * FROM income where user_id='$search'";
    		                            $pcres = mysqli_query($con, $pcsql) or die (mysqli_error($con));
            	                        $pincome=0;
                  	    		            while ($pcrow=mysqli_fetch_assoc($pcres))
                    	        		        {
                                        			$pincome=$pincome+$pcrow['current_bal'];
                                    			}
                                    	echo $pincome;
                                    ?>
								</p> 
					</div>
				</td>
				<td colspan="3"><div class="treetext"><p> R : <?php echo $data['rightcount']; ?></p> </div> </td>
	</tr>

	<tr>
		<td colspan="16" class="treeborder"></td>
		<td colspan="16"></td>
	</tr>

	<tr>
		<td colspan="8"></td>
		<td colspan="8" align="center"> <div class="treeleftborder"></div></td>
		<td colspan="8""><div class="treerightborder"></div></td>
		<td colspan="8"></td>
	</tr>
	<tr>
			<?php
				$first_left_user = $data['left'];
				$first_right_user = $data['right'];

				if($first_left_user!="")
				{
			?>
				<td colspan="16" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $first_left_user ?>"><i class="fa fa-user fa-2x" style="color:#D520BE"></i><p><?php echo $first_left_user ?></p></a></div></td>
			<?php 
				}
				else
				{
			?>
				<td colspan="16" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i><p><?php echo $first_left_user ?></p></div></td>
			<?php
				}
				if($first_right_user!="")
				{
			?>
				<td colspan="16" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $first_right_user ?>"><i class="fa fa-user fa-2x" style="color:#D520BE"></i><p><?php echo $first_right_user ?></p></a></div></td>
			<?php
				}
				else
				{
			?>
				<td colspan="16" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i><p><?php echo $first_right_user ?></p></div></td>
			<?php
				}
			?>

	</tr>
	<tr>
		<td colspan="8"><div class="treeborder"></div></td>
		<td colspan="8"></td>
		<td colspan="8""><div class="treeborder"></div></td>
		<td colspan="8"></td>
	</tr>
	<tr>
		<td colspan="4"></td>
		<td colspan="4"><div class="treeleftborder"></div></td>
		<td colspan="4"><div class="treerightborder"></div></td>
		<td colspan="4"></td>
		<td colspan="4"></td>
		<td colspan="4"><div class="treeleftborder"></div></td>
		<td colspan="4"><div class="treerightborder"></div></td>
		<td colspan="4"></td>
	</tr>
	<tr>
		<?php 
			$data_first_left_user = tree_data($first_left_user);
			$second_left_user = $data_first_left_user['left'];
			$second_right_user = $data_first_left_user['right'];

			$data_first_right_user = tree_data($first_right_user);
			$third_left_user = $data_first_right_user['left'];
			$thidr_right_user = $data_first_right_user['right'];

			if($second_left_user!="")
			{
		?>
			<td colspan="8" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $second_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>
			<td colspan="8" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
			if($second_right_user!="")
			{
		?>
			<td colspan="8" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $second_right_user ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $second_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>
			<td colspan="8" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
		
		if($third_left_user!="")
			{
		?>
			<td colspan="8" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $third_left_user ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $third_left_user ?></p></a></div></td>
		<?php
			}
		else
			{
		?>
			<td colspan="8" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
		if($thidr_right_user!="")
			{
		?>
		<td colspan="8" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $thidr_right_user ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $thidr_right_user ?></p></a></div></td>
		<?php
			}
		else
			{
		?>
				<td colspan="8" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
		?>
	</tr>
	<tr>
		<td colspan="4"></td>
		<td colspan="4"><div class="treeborderleft"></div></td>
		<td colspan="4"><div class="treeborder"></div></td>
		<td colspan="4"></td>
		<td colspan="4"></td>
		<td colspan="4"><div class="treeborderleft"></div></td>
		<td colspan="4"><div class="treeborder"></div></td>
		<td colspan="4"></td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<td colspan="2"><div class="treeleftborder"></div></td>
		<td colspan="2"><div class="treerightborder"></div></td>
		<td colspan="2"></td>
		<td colspan="2"></td>
		<td colspan="2"><div class="treeleftborder"></div></td>
		<td colspan="2"><div class="treerightborder"></div></td>
		<td colspan="2"></td>
		<td colspan="2"></td>
		<td colspan="2"><div class="treeleftborder"></div></td>
		<td colspan="2"><div class="treerightborder"></div></td>
		<td colspan="2"></td>
		<td colspan="2"></td>
		<td colspan="2"><div class="treeleftborder"></div></td>
		<td colspan="2"><div class="treerightborder"></div></td>
		<td colspan="2"></td>
	</tr>
	<tr>
		<?php

		$data_four_left_user = tree_data($second_left_user);
		$four_left_user = $data_four_left_user['left'];
		$four_right_user = $data_four_left_user['right'];

		$data_five_left_user = tree_data($second_right_user);
		$five_left_user = $data_five_left_user['left'];
		$five_right_user = $data_five_left_user['right'];

		$data_six_left_user = tree_data($third_left_user);
		$six_left_user = $data_six_left_user['left'];
		$six_right_user = $data_six_left_user['right'];

		$data_seven_left_user = tree_data($thidr_right_user);
		$seven_left_user = $data_seven_left_user['left'];
		$seven_right_user = $data_seven_left_user['right'];
		
		if($four_left_user!="")
			{
		?>
			<td colspan="4" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $four_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $four_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>
		<td colspan="4" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
				if($four_right_user!="")
			{
		?>
			<td colspan="4" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $four_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $four_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>
		<td colspan="4" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
			

		if($five_left_user!="")
			{
		?>
			<td colspan="4" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $five_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $five_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>
		<td colspan="4" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
				if($five_right_user!="")
			{
		?>
			<td colspan="4" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $five_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $five_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>
		<td colspan="4" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
			if($six_left_user!="")
			{
		?>
			<td colspan="4" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $six_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $six_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>
		<td colspan="4" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
				if($six_right_user!="")
			{
		?>
			<td colspan="4" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $six_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $six_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>
		<td colspan="4" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
			

		if($seven_left_user!="")
			{
		?>
			<td colspan="4" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $seven_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $seven_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>
		<td colspan="4" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
				if($seven_right_user!="")
			{
		?>
			<td colspan="4" align="center"><div class="treetext"><a href="genealogytree.php?search-id=<?php echo $seven_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $seven_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>
		<td colspan="4" align="center"><div class="treetext"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
		?>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><div class="treeborderleft"></div></td>
		<td></td>

		<td></td>
		<td><div class="treeborder"></div></td>
		<td></td>
		<td></td>
		
		<td></td>
		<td></td>
		<td><div class="treeborderleft"></div></td>
		<td></td>
		
		<td></td>
		<td><div class="treeborder"></div></td>
		<td></td>
		<td></td>
		
		<td></td>
		<td></td>
		<td><div class="treeborderleft"></div></td>
		<td></td>
		
		<td></td>
		<td><div class="treeborder"></div></td>
		<td></td>
		<td></td>
		
		<td></td>
		<td></td>
		<td><div class="treeborderleft"></div></td>
		<td></td>
		
		<td></td>
		<td><div class="treeborder"></div></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td><div class="treeleftborder"></div></td>
		<td width="5px" height="5px"><div class="treerightborder"></div></td>
		<td width="5px" height="5px"></td>

		<td></td>
		<td><div class="treeleftborder"></div></td>
		<td width="5px" height="5px"><div class="treerightborder"></div></td>
		<td width="5px" height="5px"></td>
		
		<td></td>
		<td><div class="treeleftborder"></div></td>
		<td width="5px" height="5px"><div class="treerightborder"></div></td>
		<td width="5px" height="5px"></td>
		
		<td></td>
		<td><div class="treeleftborder"></div></td>
		<td width="5px" height="5px"><div class="treerightborder"></div></td>
		<td width="5px" height="5px"></td>
		
		<td></td>
		<td><div class="treeleftborder"></div></td>
		<td width="5px" height="5px"><div class="treerightborder"></div></td>
		<td width="5px" height="5px"></td>
		
		<td></td>
		<td><div class="treeleftborder"></div></td>
		<td width="5px" height="5px"><div class="treerightborder"></div></td>
		<td width="5px" height="5px"></td>
		
		<td></td>
		<td><div class="treeleftborder"></div></td>
		<td width="5px" height="5px"><div class="treerightborder"></div></td>
		<td width="5px" height="5px"></td>

		<td></td>
		<td><div class="treeleftborder"></div></td>
		<td width="5px" height="5px"><div class="treerightborder"></div></td>
		<td width="5px" height="5px"></td>
	</tr>
	<tr>
		<?php
			
			$data_eight_left_user = tree_data($four_left_user);
			$eight_left_user = $data_eight_left_user['left'];
			$eight_right_user = $data_eight_left_user['right'];

			$data_nine_left_user = tree_data($four_right_user);
			$nine_left_user = $data_nine_left_user['left'];
			$nine_right_user = $data_nine_left_user['right'];

			$data_ten_left_user = tree_data($five_left_user);
			$ten_left_user = $data_ten_left_user['left'];
			$ten_right_user = $data_ten_left_user['right'];

			$data_eleven_left_user = tree_data($five_right_user);
			$eleven_left_user = $data_eleven_left_user['left'];
			$eleven_right_user = $data_eleven_left_user['right'];

			$data_twelve_left_user = tree_data($six_left_user);
			$twelve_left_user = $data_twelve_left_user['left'];
			$twelve_right_user = $data_twelve_left_user['right'];

			$data_thirteen_left_user = tree_data($six_right_user);
			$thirteen_left_user = $data_thirteen_left_user['left'];
			$thirteen_right_user = $data_thirteen_left_user['right'];

			$data_fourteen_left_user = tree_data($seven_left_user);
			$fourteen_left_user = $data_fourteen_left_user['left'];
			$fourteen_right_user = $data_fourteen_left_user['right'];

			$data_fifteen_left_user = tree_data($seven_right_user);
			$fifteen_left_user = $data_fifteen_left_user['left'];
			$fifteen_right_user = $data_fifteen_left_user['right'];
		
		
		if($eight_left_user!="")
		{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $eight_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $eight_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
		
		if($eight_right_user!="")
		{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $eight_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $eight_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
		
		if($nine_left_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $nine_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $nine_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($nine_right_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $nine_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $nine_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($ten_left_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $ten_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $ten_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($ten_right_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $ten_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $ten_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($eleven_left_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $eleven_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $eleven_left_user; ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($eleven_right_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $eleven_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $eleven_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($twelve_left_user!="")
		{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $twelve_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $twelve_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
		
		if($twelve_right_user!="")
		{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $twelve_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $twelve_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
		
		if($thirteen_left_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $thirteen_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $thirteen_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($thirteen_right_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $thirteen_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $thirteen_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($fourteen_left_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $fourteen_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $fourteen_left_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($fourteen_right_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $fourteen_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $fourteen_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($fifteen_left_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $fifteen_left_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $fifteen_left_user; ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}

		if($fifteen_right_user!="")
			{
		?>
				<td colspan="2" align="center"><div class="treetextlast"><a href="genealogytree.php?search-id=<?php echo $fifteen_right_user; ?>"><i class="fa fa-user fa-2x" style="color:#361515"></i><p><?php echo $fifteen_right_user ?></p></a></div></td>
		<?php 
			}
			else
			{
		?>		
				<td colspan="2" align="center"><div class="treetextlast"><i class="fa fa-plus fa-2x" style="color:#361515"></i></div></td>
		<?php
			}
		?>
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