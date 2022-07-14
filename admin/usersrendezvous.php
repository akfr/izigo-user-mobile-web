<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_two();
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Utilisateurs pour rendez-vous</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Id</th>
								  <th>Nom</th>
								  
								  <th>E-mail</th>
								  <th>objet</th>
								  <th>Date</th>
								  
								  <th>Action</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM rendezvous ORDER BY id";
								$result=mysqli_query($con,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['nom']; ?></td>
								
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['objet']; ?></td>
								
								<td><?php echo $row['date']; ?></td>
								<td class="center">
									<!-- <a class="btn btn-info" href="edit_data.php?uID=<php echo $row['id']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a> -->
									<a class="btn btn-danger" onclick="return confirmDel()" href="delete_data.php?delID=<?php echo $row['id'];?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
 							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>		

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->