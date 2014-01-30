<?php if ($this->Session->check('Message.success') || $this->Session->check('Message.error') ) : ?>
	<?php $status = $this->Session->check('Message.success') ? 'success' : 'error'; ?>
	<div class="middle relative">
		<div class="alert alert-<?php echo ($status == 'error') ? 'danger' : 'success' ?> alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->Session->flash($status) ?>
		</div>
		
    </div>
<?php endif; ?>