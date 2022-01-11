<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>


<!DOCTYPE html>
<html lang="en">

    <link href="<?php echo base_url().'assets/'; ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url().'assets/'; ?>css/mdb.min.css" rel="stylesheet">


<body>

<div class="card mb-4 wow fadeIn">
	<h1>Welcome to CodeIgniter!</h1>

	<div>
		<h3>Testing</h3>
	</div>

	<form class="d-flex justify-content-center">
            <!-- Default input -->
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button>

      </form>

	


</div>

  <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

</body>
</html>