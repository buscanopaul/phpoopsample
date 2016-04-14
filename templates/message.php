<?php if(Session::exists('success')): ?>
	<div class="alert alert-success text-center" role="alert">
		<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
		<span class="sr-only">Error:</span>
		<?php echo Session::flash('success'); ?>
	</div>
<?php endif; ?>
<?php if(Session::exists('error')): ?>
	<div class="alert alert-danger text-center" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<span class="sr-only text-center">Error:</span>
		<?php echo Session::flash('error'); ?>
	</div>
<?php endif; ?>
