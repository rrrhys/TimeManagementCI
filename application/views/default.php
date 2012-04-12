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
					<li><a href="/app/profile" class="grav_box"> <?=$this->session->userdata('email_address')?></a></li>
					<li><a href="/app/dashboard">Time Management</a></li>
					<li><a href="/cash/dashboard">Cashflow</a></li>
					<li><a href="/auth/logout">Logout</a></li>
				<?}?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
<h3><?=$page_heading?></h3>
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
<script type="text/javascript">
	$(function(){
		$(".grav_box").html("<img src='<?=$gravatar_url?>' />");
	})
</script>
</body>
</html>