
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.5">
	<title>Sparkup CMS | Admin Area</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

	<!-- Bootstrap core CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<?php $myClass = array('class' => 'nav-link','title'=>'Dashboard home'); ?>
					<?php echo anchor('admin','Dashboard',$myClass);?>
				</li>
				<li class="nav-item ">
					<?php $myClass = array('class' => 'nav-link','title'=>'View pages'); ?>
					<?php echo anchor('admin/pages','Pages',$myClass);?>
				</li>
				<li class="nav-item ">
					<?php $myClass = array('class' => 'nav-link','title'=>'View subjects'); ?>
					<?php echo anchor('admin/subjects','Subjects',$myClass);?>
				</li>
				<li class="nav-item ">
					<?php $myClass = array('class' => 'nav-link','title'=>'View User'); ?>
					<?php echo anchor('admin/users','Users',$myClass);?>
				</li>


			</ul>

			<ul class="navbar-nav  navbar-right">
				<li class="nav-item ">
					<?php $myClass = array('class' => 'nav-link','target'=>'_blank'); ?>
					<?php echo anchor('/','View Website',$myClass);?>
				</li>
				<li class="nav-item ">
					<?php $myClass = array('class' => 'nav-link','title'=>'Logout'); ?>
					<?php echo anchor('admin/users/logout','Logout',$myClass);?>
				</li>


			</ul>

		</div>
	</nav>

	<main role="main" class="container">

		<div class="starter-template" style="margin-top: 70px;">
			<div class="row">
				<div class="col-md-4">
					<ul class="list-group">
						<li class="list-group-item"><?php echo anchor('admin/pages/add','Add new page'); ?>
					
						</li>
						<li class="list-group-item"><?php echo anchor('admin/subjects/add','Add new subject'); ?>
					
						</li>
						<li class="list-group-item"><?php echo anchor('admin/users/add','Add new user'); ?>
					
						</li>
					</ul>

				</div>
				<div class="col-md-8">

					<?php $this->load->view($main); ?>
				</div>
			</div>
		</div>




	</main><!-- /.container -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
	</html>


