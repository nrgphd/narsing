<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$description = __d('cake_dev', 'Jewel Street');
?>

<?php echo $this->Html->docType('html5'); ?>
<html lang="en">
  <head>
  	<?php echo $this->Html->charset(); ?>
  	<?php echo $this->Html->meta(array('name' => 'X-UA-Compatible', 'content' => 'IE=edge')); ?>
  	<?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1')); ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  	<title>Jewel Street</title>
	
    <!-- Bootstrap -->
    <?php echo $this->Html->css(array('bootstrap.min')); ?>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php echo $this->Html->css(array('style')); ?>
    
    <?php 
    	echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
  </head>
  
  <body>
  <div id="wrap">
  	<header class="header">
    	<div class="row">
		    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		      <h1 class="w-color bold">
		      	<?php echo $this->Html->link('Jewel Street', array('controller' => 'users', 'action' => 'landing'), array('escape' => false)); ?>
		      </h1>
		    </div>
		    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
		    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top: 26px;">
		    	
				<span class="txt-rt pull-right" style=" width: 225px;">
				
				<?php if($currentUser) {
					switch ($currentUser['group_id']) {
						case 1:
							echo '<span id="sgn" style="color: #FFF;">Welcome '.$this->html->link('Admin', array('controller' => 'supervisors', 'action' => 'listSupervisors'))."</span>";
						break;
						
						case 2:
							echo '<span id="sgn" style="color: #FFF;">Welcome '.$this->html->link('Supervisor', array('controller' => 'sellers', 'action' => 'listSellers'))."</span>";
							break;
							
						case 3:
							echo '<span id="sgn" style="color: #FFF;">Welcome '.$this->html->link('Seller', array('controller' => 'sellerCalculations', 'action' => 'dailyCalculations'))."</span>";
							break;
						
						default:
							;
						break;
					}
					
					echo '<span id="sgn" > &nbsp;'.$this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'))."</span>";
						
				}else {?>
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
							    <span class='glyphicon glyphicon-user'></span> Login
							    <span class="caret"></span>
						</button>
						<ul id="dropdown-menu1" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						    <li role="presentation">
							    <?php echo $this->element('login');    ?>	
					        </li>
						</ul>
						
					</div>
					
				<?php } ?>
				 </span>
       
		    </div>
    	</div>
	    <div class="clear"></div>
	</header> <!-- End of header -->
	
	
	<section class="warpper"> 
	
	
	
	
	
	