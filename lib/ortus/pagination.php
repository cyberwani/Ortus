<?php
	// Pagination
	function pagination($start_end_links = 5, $middle_links = 5)
	{
		global $wp_query;		
		
		// No Pagination on single
		if(!is_single())	
		{			
			$current = get_query_var('paged') == 0 ? 1 : get_query_var('paged');	// Current site
			$total = $wp_query->max_num_pages;										// Count Sites
			$links_left = floor(($middle_links - 1) / 2);							
			$links_right = ceil(($middle_links - 1) / 2);							
			
			if($total > 1)	
			{				
				echo '<div class="pagination"><ul>';

				echo $current == 1 ? '<li class="navigate-inactive"><a href"#"><< Zur&uuml;ck</a></li>' : '<li><a class="navigate-active" href="'.get_pagenum_link($current-1).'"><< Zur&uuml;ck</a></li>';	

				for($i=1; $i<=$total; $i++)	
				{
					if($i == $current)
					{
						echo '<li class="active"><a href=#">'.($current).'</a></li>';
					}
					elseif($i >= ($current - $links_left) && $i <= ($current + $links_right) || $i <= $start_end_links || $i > ($total - $start_end_links))
					{
						echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
					}
					elseif($i == ($start_end_links + 1) && $i < ($current - $links_left + 1) || $i == ($total - $start_end_links) && $i > ($current + $links_right))
					{
						echo '<li>...</li>';
					}
				}

				echo $current == $total ? '<li class="navigate-inactive">Vor >></li>' : '<li><a class="navigate-active" href="'.get_pagenum_link($current+1).'">Vor >></a></li>';

				echo '</ul></div>';
			}
		}
	}
?>