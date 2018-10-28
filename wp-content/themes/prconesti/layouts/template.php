<?php
/**
* @package   PrCOnesti Template
* @file      template.php
* @version   1.0 November 2011
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright (C) 2011 PrCOnesti
* @license PrCOnesti
*/

// get template configuration
include(dirname(__FILE__).'/template.config.php');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->warp->config->get('language'); ?>" lang="<?php echo $this->warp->config->get('language'); ?>" dir="<?php echo $this->warp->config->get('direction'); ?>" >
<head>
<?php echo $this->warp->template->render('head'); ?>
<link rel="apple-touch-icon" href="<?php echo $this->warp->path->url('template:apple_touch_icon.png'); ?>" />
</head>

<body id="page" class="yoopage <?php echo $this->warp->config->get('columns'); ?> <?php echo $this->warp->config->get('itemcolor'); ?> <?php echo $this->warp->config->get('toolscolor'); ?> <?php echo 'style-'.$this->warp->config->get('style'); ?> <?php echo 'texture-'.$this->warp->config->get('texture'); ?> <?php echo 'font-'.$this->warp->config->get('font'); ?> <?php echo $this->warp->config->get('body-modulewrappertop');?> <?php echo $this->warp->config->get('body-modulewrapperbottom');?> <?php echo $this->warp->config->get('body-contentwrapper');?>">

	<?php if ($this->warp->modules->count('absolute')) : ?>
	<div id="absolute">
		<?php echo $this->warp->modules->render('absolute'); ?>
	</div>
	<?php endif; ?>
	
	<div id="page-body">

		<div class="wrapper">
			
			<div id="header">
				
				<div class="header-1">
					<div class="header-2">
				
						<div id="toolbar">
							
							<?php if($this->warp->config->get('date')) : ?>
							<div id="date">
								<?php echo $this->warp->config->get('actual_date'); ?>
							</div>
							<?php endif; ?>
						
							<?php if ($this->warp->modules->count('toolbarleft')) : ?>
							<div class="left">
								<?php echo $this->warp->modules->render('toolbarleft'); ?>
							</div>
							<?php endif; ?>
							
							<?php if ($this->warp->modules->count('toolbarright')) : ?>
							<div class="right">
								<?php echo $this->warp->modules->render('toolbarright'); ?>
							</div>
							<?php endif; ?>
							
						</div>
		
						<div id="headerbar">
		
							<?php if($this->warp->modules->count('headerleft')) : ?>
							<div class="left horizontal">
								<?php echo $this->warp->modules->render('headerleft'); ?>
							</div>
							<?php endif; ?>
							
							<?php if($this->warp->modules->count('headerright')) : ?>
							<div class="right horizontal">
								<?php echo $this->warp->modules->render('headerright'); ?>
							</div>
							<?php endif; ?>
							
						</div>
					
					</div>
				</div>
				
				<div id="menubar">
					<div class="menubar-1">
						<div class="menubar-2">
						</div>
					</div>
				</div>
					
				<?php if ($this->warp->modules->count('logo')) : ?>		
				<div id="logo">
					<?php echo $this->warp->modules->render('logo'); ?>
				</div>
				<?php endif; ?>
				
				<?php if ($this->warp->modules->count('search')) : ?>
				<div id="search">
					<?php echo $this->warp->modules->render('search'); ?>
				</div>
				<?php endif; ?>
				
				<?php  if ($this->warp->modules->count('menu')) : ?>
				<div id="menu">
					<?php echo $this->warp->modules->render('menu'); ?>
				</div>
				<?php endif; ?>
				
				<?php if ($this->warp->modules->count('banner')) : ?>
				<div id="banner">
					<?php echo $this->warp->modules->render('banner'); ?>
				</div>
				<?php endif;  ?>
						
			</div>
			<!-- header end -->

			<?php if ($this->warp->modules->count('top + topblock')) : ?>
			<div id="top">

				<?php if($this->warp->modules->count('topblock')) : ?>
				<div class="vertical width100">
					<?php echo $this->warp->modules->render('topblock'); ?>
				</div>
				<?php endif; ?>

				<?php if ($this->warp->modules->count('top')) : ?>				
				<div class="top-2">
					<div class="top-3">
						<?php echo $this->warp->modules->render('top', array('wrapper'=>"horizontal float-left", 'layout'=>$this->warp->config->get('top'))); ?>
					</div>
				</div>
				<?php endif; ?>

			</div>
			<!-- top end -->
			<?php endif; ?>
			
			<div id="middle">
				<div id="middle-expand">

					<div id="main">
						<div id="main-shift">

							<?php if ($this->warp->modules->count('maintop')) : ?>
							<div id="maintop">
								<?php echo $this->warp->modules->render('maintop', array('wrapper'=>"horizontal float-left", 'layout'=>$this->warp->config->get('maintop'))); ?>
							</div>
							<!-- maintop end -->
							<?php endif; ?>
							
							<div class="mainmiddle-wrapper-t1 <?php if ($this->warp->modules->count('breadcrumbs')) echo 'with-breadcrumbs' ?>">
								<div class="mainmiddle-wrapper-t2">
									<div class="mainmiddle-wrapper-t3">
										
										<?php if ($this->warp->modules->count('breadcrumbs')) : ?>
											<?php echo $this->warp->modules->render('breadcrumbs'); ?>
										<?php endif; ?>
										
									</div>
								</div>
							</div>
							
							<div class="mainmiddle-wrapper-1">
								<div class="mainmiddle-wrapper-2">

									<div id="mainmiddle">
										<div id="mainmiddle-expand">
										
											<div id="content">
												<div id="content-shift">
		
													<?php if ($this->warp->modules->count('contenttop')) : ?>
													<div id="contenttop">
														<?php echo $this->warp->modules->render('contenttop', array('wrapper'=>"horizontal float-left", 'layout'=>$this->warp->config->get('contenttop'))); ?>
													</div>
													<!-- contenttop end -->
													<?php endif; ?>
													
													<div id="component" class="floatbox">
														<?php echo $this->warp->template->render('content'); ?>
													</div>
						
													<?php if ($this->warp->modules->count('contentbottom')) : ?>
													<div id="contentbottom">
														<?php echo $this->warp->modules->render('contentbottom', array('wrapper'=>"horizontal float-left", 'layout'=>$this->warp->config->get('contentbottom'))); ?>
													</div>
													<!-- contentbottom end -->
													<?php endif; ?>
												
												</div>
											</div>
											<!-- content end -->
											
											<?php if($this->warp->modules->count('contentleft')) : ?>
											<div id="contentleft" class="vertical">
												<?php echo $this->warp->modules->render('contentleft'); ?>
											</div>
											<?php endif; ?>
											
											<?php if($this->warp->modules->count('contentright')) : ?>
											<div id="contentright" class="vertical">
												<?php echo $this->warp->modules->render('contentright'); ?>
											</div>
											<?php endif; ?>
											
										</div>
									</div>
									<!-- mainmiddle end -->
		
								</div>
							</div>
							
							<div class="mainmiddle-wrapper-b1">
								<div class="mainmiddle-wrapper-b2">
									<div class="mainmiddle-wrapper-b3">
									</div>
								</div>
							</div>
							
							<?php if ($this->warp->modules->count('mainbottom')) : ?>
							<div id="mainbottom">
								<?php echo $this->warp->modules->render('mainbottom', array('wrapper'=>"horizontal float-left", 'layout'=>$this->warp->config->get('mainbottom'))); ?>
							</div>
							<!-- mainbottom end -->
							<?php endif; ?>
						
						</div>
					</div>

					<?php if($this->warp->modules->count('left')) : ?>
					<div id="left" class="vertical">
						<?php echo $this->warp->modules->render('left'); ?>
					</div>
					<?php endif; ?>
					
					<?php if($this->warp->modules->count('right')) : ?>
					<div id="right" class="vertical">
						<?php echo $this->warp->modules->render('right'); ?>
					</div>
					<?php endif; ?>

				</div>
			</div>

			<?php if ($this->warp->modules->count('bottom + bottomblock')) : ?>
			<div id="bottom">
				
				<?php if ($this->warp->modules->count('bottom')) : ?>
				<div class="bottom-2">
					<div class="bottom-3">
						<?php echo $this->warp->modules->render('bottom', array('wrapper'=>"horizontal float-left", 'layout'=>$this->warp->config->get('bottom'))); ?>
					</div>
				</div>
				<?php endif; ?>
				
				<?php if($this->warp->modules->count('bottomblock')) : ?>
				<div class="vertical width100">
					<?php echo $this->warp->modules->render('bottomblock'); ?>
				</div>
				<?php endif; ?>
				
			</div>
			<!-- bottom end -->
			<?php endif; ?>
			
			<div id="footer">
			
				<?php if ($this->warp->modules->count('footer + debug')) : ?>
				<a class="anchor" href="#page"></a>
				<?php echo $this->warp->modules->render('footer'); ?>
				<?php echo $this->warp->modules->render('debug'); ?>
				<?php endif; ?>
				
			</div>
			<!-- footer end -->
					
		</div>

	</div>
			
	<?php echo $this->render('footer'); ?>
	
</body>
</html>