<?php
/*
Plugin Name: experts
Plugin URI:  
Description: This is the plugin
Version:     1.0
Author:      
Author URI:  
License:   
License URI: 
Domain Path: 
Text Domain: acme-experts
*/

//**************************************************
// shortcodes used
add_shortcode( 'activity', 'expert_activity' );
add_shortcode( 'experts', 'list_experts' );
add_shortcode( 'bio', 'expert_bio' );

function list_experts(){

    global $wpdb;
    $experts = $wpdb->get_results("SELECT * FROM experts;");

    print "<table border='1'>";
    foreach($experts as $expert){
        print "<tr>";
        print "<td><a href='/acmeSands/experts#$expert->ex_name' title='Click to see ".$expert->ex_name."&#700;s bio.'><img src='http://localhost/acmeSands/images/".$expert->ex_smimage."' alt=''></a></td>";
        print "<td>".$expert->ex_name."</td>";
        print "<td>".$expert->ex_type."</td>";
        print "</tr>";
    }
    print "</table>";

    return;
} //end of function



function expert_bio(){

    global $wpdb;
    $experts = $wpdb->get_results("SELECT * FROM experts;");

    foreach($experts as $bio){
        print "<hr id='$bio->ex_name'>";
        print "<p></p>";
        print "<p><img src='http://localhost/acmeSands/images/".$bio->ex_image."' title='".$bio->ex_name."' alt=''></p>";
        print "<p>".$bio->ex_name." - ".$bio->ex_type."</p>";
        print "<p>".$bio->ex_bio."</p>";
    }
}


function expert_activity($atts){

    global $wpdb;

    $a = shortcode_atts( array('type' => 'missing activity',), $atts );
    $type = $a['type'];

    $record = $wpdb->get_results("SELECT * FROM experts WHERE ex_type='$type';");

    $id = $record[0]->ex_id;
    $record1 = $wpdb->get_results("SELECT * FROM demos WHERE d_date >= CURDATE() AND ex_id='$id' ORDER BY d_date ASC;");

    if ($record1 != null){

    return "<hr><h2>Upcoming Event</h2>
    <p>Instructor: <a href='/acmeSands/experts#".$record[0]->ex_name."'>"
    .$record[0]->ex_name."</a><br>".
    $record1[0]->d_description."</p>".
    "Date: ".$record1[0]->d_date. "<br>".
    "Time: ".$record1[0]->d_time. "<br>".
    "Cost: $".$record1[0]->d_fee. "<br>";
    }
    else {
        return "<hr><h2>No Upcoming Event</h2>";

    }
}


?>