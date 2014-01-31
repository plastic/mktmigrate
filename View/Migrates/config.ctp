<?php $filePresent = false; ?>
<div class="col-md-4">
	<?php if (file_exists(APP . 'Config' . DS . 'database.php')): ?>
		<div class="bs-callout bs-callout-info">
			<h4>Atenção!</h4>
			<p>
				<?php echo "[database.php] presente"; ?>
				<?php $filePresent = true; ?>
			</p>
		</div>
	<?php else: ?>
		<div class="bs-callout bs-callout-warning">
			<h4>Atenção!</h4>
			<p><?php echo "O arquivo [database.php] não esta presente!"; ?></p>
			
			<?php echo $this->Form->create('DB') ?>
				<div class="form-group">
					<?php echo $this->Form->input('host', array('label' => false, 'placeholder' => 'host' )) ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('user', array('label' => false, 'placeholder' => 'user' )) ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('password', array('label' => false, 'placeholder' => 'password' )) ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('database', array('label' => false, 'placeholder' => 'database' )) ?>
				</div>
				<input type="submit" name="" value="Criar" class="btn btn-success" />
			</form>
		</div>
	<?php endif; ?>
	
	<?php if ($filePresent):
		App::uses('ConnectionManager', 'Model');
		try {
			$connected = ConnectionManager::getDataSource('default');
		} catch (Exception $connectionError) {
			$connected = false;
			$errorMsg = $connectionError->getMessage();
			if (method_exists($connectionError, 'getAttributes')):
				$attributes = $connectionError->getAttributes();
				if (isset($errorMsg['message'])):
					$errorMsg .= '<br />' . $attributes['message'];
				endif;
			endif;
		}
	?>
	<p>
		<?php if ($connected && $connected->isConnected()): ?>
			<div class="bs-callout bs-callout-info">
				<h4>Atenção!</h4>
				<p><?php echo "Conexão obtida com sucesso!"; ?></p>
			</div>
			
			<div class="alert heading heading-mkt">
				<strong class="alert-heading">database.php</strong>
			</div>
			
			<textarea data-role="editor" name="revision_files" cols="50"><?php echo trim(file_get_contents(APP . 'Config' . DS . 'database.php')) ?></textarea>
			
			<?php echo $this->Html->scriptBlock("
				jQuery( function() {
					jQuery(window).bind('load', function() {
						var myCodeMirror = CodeMirror.fromTextArea(document.getElementsByTagName('textarea')[0], {
							mode: 'text/x-mysql',
							tabMode: 'indent',
							matchBrackets: true,
							autoClearEmptyLines: true,
							lineNumbers: true,
							theme: 'default'
						});
					});
				});
			", array('inline' => false)); ?>
			
		<?php else: ?>
			<div class="bs-callout bs-callout-warning">
				<h4>Atenção!</h4>
				<?php echo $errorMsg; ?>
			</div>
		<?php endif; ?>
	</p>
	<?php endif; ?>
</div>