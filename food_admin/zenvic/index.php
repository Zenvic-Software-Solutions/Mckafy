<!doctype html>
<html lang="en">
<?php   session_start();
include("../db/dbConnection.php");
include("../url.php");
 include("head.php");?>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			<?php include("left.php");?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include("top.php");?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				
				

				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					<div class="col">
					    <a href="employee.php">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Income</p>
										<h4 class="my-1">
										<?php
											$selEmp = "SELECT SUM(total_amount) as total_amount
											FROM `bill_tbl` 
											WHERE status='Active' 
											AND MONTH(created_at) = MONTH(CURRENT_DATE()) 
											AND YEAR(created_at) = YEAR(CURRENT_DATE());";
											$resultEmp = $conn->query($selEmp);

											if ($resultEmp) {
												$rowEmp = $resultEmp->fetch_assoc();
												$empCount = $rowEmp['total_amount'];
												echo $empCount;
											} else {
												echo "Error: " . $conn->error;
											}
											?>
										</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i>$34 from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-id-card"></i>
									</div>
								</div>
							</div>
						</div>
						</a>
					</div>
					
					
					
					
				
					
					
											
					
					
					<div class="col">
					    <a href="project.php">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Income for This Month</p>
										<h4 class="my-1">
										<?php
											$selEmp = "SELECT
                                                SUM(total_amount) AS total_amount
                                            FROM
                                                bill_tbl
                                            WHERE
                                                created_at >= DATE_FORMAT(CURDATE(), '%Y-%m-01') 
                                                AND created_at < DATE_FORMAT(
                                                    DATE_ADD(CURDATE(), INTERVAL 1 MONTH),
                                                    '%Y-%m-01'
                                                );";

												
                                              
											$resultEmp = $conn->query($selEmp);

											if ($resultEmp) {
												$rowEmp = $resultEmp->fetch_assoc();
												$empCount = $rowEmp['total_amount'];
												// Format the amount and add rupee symbol
                                                $formattedAmount = '₹ ' . number_format($empCount, 2);
                                                echo $formattedAmount;
											} else {
												echo "Error: " . $conn->error;
											}
											?>
										</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.2% from last week</p> -->
									</div>
								<div class="text-warning ms-auto font-35"><i class='bx bxs-folder'></i>
									</div>
								</div>
							</div>
						</div>
						</a>
					</div>
					
				</div>

				
				<!--end row-->
				
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <?php include("footer.php"); ?>
	</div>
	<!--end wrapper-->



	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="<?php echo $bootsrapBundle; ?>"></script>
	<!--plugins-->
	<script src="<?php echo $js; ?>"></script>
	<script src="<?php echo $simplebar;?>"></script>
	<script src="<?php echo $mentimenu; ?>"></script>
	<script src="<?php echo $perfectScrolbar;  ?>"></script>
	<script src="<?php echo $charts;  ?>"></script>
	<script src="<?php echo $datatableMin; ?>"></script>
	<script src="<?php echo $datatbaleBootstrap;?>"></script>
	
	<script src="<?php echo $index;?>"></script>
	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>