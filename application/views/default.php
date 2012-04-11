<!DOCTYPE html>
<html>
<?=$header?>
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">

			<a href="/app/" class="brand">
				Project Name
			</a>
			<div class="nav-collapse">
				<ul class="nav">
				<?if(!$logged_in){?>
					<li><a href="/auth/login">Login</a></li>
					<li><a href="/auth/register">Register</a></li>
				<?}else{?>
<<<<<<< HEAD
				
					<li><a href="/app/profile"><img src="<?=$gravatar_url?>" /> <?=$this->session->userdata('email_address')?></a></li>
					<li><a href="/auth/logout">Dashboard</a></li>
=======
>>>>>>> origin/master
					<li><a href="/auth/logout">Logout</a></li>
				<?}?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
<h1><?=$page_heading?></h1>
	<div class="span6 offset3">
		<?if($good_flash){?>
			<div class="alert alert-success">
			<?=$good_flash?>
			</div>
		<?}?>
		<?if($warning_flash){?>
			<div class="alert alert-info">
			<?=$warning_flash?>
			</div>
		<?}?>
		<?if($bad_flash){?>
			<div class="alert alert-error">
			<?=$bad_flash?>
			</div>
		<?}?>
	</div>
	<div class="span12">
	<?=$content?>
	</div>
</div>
<?=$footer?>
</body>
</html>