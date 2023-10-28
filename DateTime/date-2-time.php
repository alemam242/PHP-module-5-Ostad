<?php
echo date("h:i:s"); // GMT Timezone 12 Hour Format
echo "\n";
echo date("H:i:s"); // GMT Timezone 24 Hour Format
echo "\n";

echo date("h:i:s a"); // GMT Timezone with am/pm
echo "\n";
echo date("h:i:s A"); // GMT Timezone with AM/PM
echo "\n";
echo date("z"); // How may days gone in this year
echo "\n";

//
date_default_timezone_set("Asia/Dhaka");
echo date("dS F, Y h:i:s a");
echo "\n";
echo date("dS F, Y h:i:s a",time()+24*60*60);
echo "\n";