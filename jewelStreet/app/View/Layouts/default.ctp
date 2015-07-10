<?php echo $this->element('header'); ?>
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		
		</div> 		
		
<?php echo $this->element('footer'); ?>
		
		
		