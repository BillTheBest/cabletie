<?php

function create_html_table($data, $caption)
{
	$is_row2 = false;
	$html = "<table>\n<caption>$caption</caption>\n";
	foreach ($data as $k => $v) {
		$html .= "<tr";
		if ($is_row2) $html .= " class='row2'";
		$is_row2 = !$is_row2;
		$html .= "><th>$k</th><td>$v</td></tr>\n";
	}
	$html .= "</table>\n";
	return $html;
}

function create_html_navigator_items($now_cate, $now_item, $item_list, $cate)
{
	$html = "";
	foreach ($item_list as $item) {
		$inner = "<a href='$cate-$item.php'>$item</a>";
		$cls = "nav-item not-at";
		if ($item === $now_item && $cate === $now_cate) {
			$inner = $item;
			$cls = "nav-item now-at";
		}
		$html .= "<li id='$cate-$item' class='$cls'>$inner</li>\n";
	}
	return $html;
}

function create_html_navigator($now_cate, $now_item)
{
	static $menu = array(
		"system" => array(
			"overview",
			"administration",
			),
		"statistics" => array(
			"tarffic",
			"connection",
			),
		);
	$html = "<nav id='navigator'>\n";
	foreach ($menu as $label => $items) {
		$folded_opt = "folded";
		$display_opt = "style='display:none;'";
		$onclick = "onclick=\"collapse_nav_cate('$label');\"";
		if ($label === $now_cate) {
			$folded_opt = "";
			$display_opt = "";
			$onclick = "";
		}
		$html .= "<div id='label-$label' class='nav-label $folded_opt' $onclick>$label</div>\n";
		$html .= "<ul id='cate-$label' class='nav-category' $display_opt>\n";
		$html .= create_html_navigator_items($now_cate, $now_item, $items, $label);
		$html .= "</ul>\n";
	}
	$html .= "</nav>\n";
	
	return $html;
}


/*
function create_html_navigator_items($now_item, $item_list, $cate)
{
	$html = "";
	foreach ($item_list as $item) {
		$div_class = "nav-item not-at";
		if ($item === $now_item) {
			$div_class = "nav-item now-at";
		}
		$html .= "<div id='$cate-$item' class='$div_class' onclick=\"goto_page('$cate', '$item');\">$item</div>\n";
	}
	return $html;
}

function create_html_navigator($now_cate, $now_item)
{
	static $menu = array(
		"system" => array(
			"overview",
			"administration",
			),
		"statistics" => array(
			"tarffic",
			"connection",
			),
		);
	$html = "<nav id='navigator'>\n";
	foreach ($menu as $label => $items) {
		$folded_opt = "folded";
		$display_opt = "style='display:none;'";
		$onclick = "onclick=\"collapse_nav_cate('$label');\"";
		if ($label === $now_cate) {
			$folded_opt = "unfolded";
			$display_opt = "";
		}
		$html .= "<div id='label-$label' class='nav-label $folded_opt' $onclick>$label</div>\n";
		$html .= "<div id='cate-$label' class='nav-category' $display_opt>\n";
		$html .= create_html_navigator_items($now_item, $items, $label);
		$html .= "</div>\n";
	}
	$html .= "</nav>\n";
	
	return $html;
}
*/

?>
