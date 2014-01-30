<div class="revision-file highlight">
	<div class="revision-file-1">
		
		<div class="bs-callout bs-callout-warning">
			<h4>Atenção!</h4>
			<p>Isso deve ser executado apenas no primeiro deploy da aplicação.</p>
		</div>
		
		<div class="alert heading heading-mkt">
			<strong class="alert-heading">dump das tabelas sem conteúdo [schema.php]</strong>
		</div>
		
		<textarea data-role="editor" name="revision_files" cols="50"><?php echo trim($schema) ?></textarea>
		
	</div>
	
	<p>
		<?php echo $this->Html->link('Executar Schema', '/mkt_migrate/migrates/execute', array('class' => 'btn btn-mini btn-mkt', 'role' => 'button')) ?>
	</p>
</div>

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