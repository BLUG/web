<?php
function blug_event_func( $atts ){
setlocale(LC_TIME,"nb_NO.UTF8");
date_default_timezone_set("Europe/Oslo");
$fradag=strftime("%x",strtotime($atts['fra']));
$tildag=strftime("%x",strtotime($atts['til']));
$tidspunkt="Tid: <span class='dtstart'><abbr class='value' title='".strftime("%Y-%m-%dT%H:%M:%S%z",strtotime($atts['fra']))."'>kl.".strftime("%R, %A %e. %B %Y",strtotime($atts['fra']))."</abbr></span> til <span class='dtend'><abbr class='value' title='".strftime("%Y-%m-%dT%H:%M:%S%z",strtotime($atts['til']))."'>kl.".strftime("%R",strtotime($atts['til']));
if($fradag != $tildag)$tidspunkt .=", ".strftime("%A %e. %B %Y",strtotime($atts['til']));
$tidspunkt .="</abbr></span>";
return "<div class='blugevent vevent'><p class='summary'>".get_the_title()."</p><p class='time'>".$tidspunkt."</p><p class='place'>Sted: <a href='".$atts['kart']."'>".$atts['sted']."</a></p></div>";
}
add_shortcode( 'blug_event', 'blug_event_func' );
?>
