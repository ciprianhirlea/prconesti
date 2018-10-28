<?php
/**
 * Detailed download output
 */

global $dlm_download;
?>
<div class="box-content clearfix">
	<div class="resources-column-left">
		<h3><a href="<?php $dlm_download->the_download_link(); ?>" title="<?php $dlm_download->the_title(); ?>"><?php $dlm_download->the_title(); ?></a></h3>
		<p><?php $dlm_download->the_short_description(); ?></p>
		<ul class="download-info clearfix">
			<li>Tip fisier: <span class="filetype-icon <?php echo 'filetype-' .  $dlm_download->get_the_filetype(); ?>"><?php $dlm_download->the_filetype(); ?></span></li>
			<li>Marime fisier: <span><?php $dlm_download->the_filesize(); ?></span></li>
			<li>Descarcari: <span><?php echo $dlm_download->get_the_download_count() ?></span></li>
		</ul>
	</div>
	<a href="<?php $dlm_download->the_download_link(); ?>" title="<?php $dlm_download->the_title(); ?>" class="resources-download">Download</a>
</div>