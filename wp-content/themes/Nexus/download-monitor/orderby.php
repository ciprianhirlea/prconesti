<ul class="download-monitor-orderby">
	<li>Ordonare dupa: </li>
	<?php
		$order_by = apply_filters( 'dlm_page_addon_order_by', array(
			'title'          => "Titlu",
			'date'           => "Data adaugarii",
			'download_count' => "Numarul de descarcari"
		) );

		foreach ( $order_by as $key => $value ) {
			?><li><a class="<?php echo $current_orderby == $key ? 'active' : ''; ?>" href="<?php echo add_query_arg( 'orderby', $key ); ?>"><?php echo $value; ?></a></li><?php
		}
	?>
</ul>