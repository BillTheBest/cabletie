<?php
require_once("lib/system-configuration.php");
require_once("lib/html-code.php");

$username = "Administrator";
$html_nav = create_html_navigator('system', 'overview');
$html_main_body = "";

// System overview
$uptime = `uptime`;
$reg = array();
preg_match("/^.*up ([^u]*),.*$/", $uptime, $reg);
$system_overview_data = array(
	"version" => SYSTEM_VERSION,
	"uptime" => $reg[1],
	"CPU usage" => "2%",
	"memory usage" => "12%",
	);
$iface_overview_data = array(
	"WAN1" => "",
	"WAN2" => "",
	"LAN" => "",
	"DMZ" => "",
	);

$html_main_body .= create_html_table($system_overview_data, "system overview");
$html_main_body .= create_html_table(
	$iface_overview_data, "interface overview");
require_once("layout/common-layout.html");
?>
