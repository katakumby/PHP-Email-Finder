<?php
/**
 * Created by PhpStorm.
 * User: Bezimienny
 * Date: 04.09.2015
 * Time: 11:34 ,"~"
 */
die("Error");
error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('max_execution_time', 300000); //300 seconds = 5 minutes
//libxml_use_internal_errors(true);
function endx($data){

    die(print_r($data));
}


require_once("phpfastcache.php");
require_once("worm.class.php");
require_once("simple_html_dom.php");
//require_once("URLResolver.php");
phpFastCache::setup("storage","auto");
$cache = phpFastCache();


$linki = $cache->get("links");
ECHO count($linki)."\n";

$linki = array_unique($linki);
$emaile = $cache->get("emails");
ECHO count($linki)."\n";
$max = count($linki);
$i=0;
if($linki == null || $emaile == null) {
    require_once "db.php";
    }else{

    $error = array();
    foreach($linki as $link) {
        echo "[$i:BEGIN $link]"."\n";
            $worm = new worm($link);

            if ($worm->run()) {

            } else {
             /*   $worm = new worm($link);
                if ($worm->run()) {
                }*/
                //endx($worm->errors);
            }
        unset($worm);
        echo "[$i:END $link]"."\n";

$i++;
        if($i == $max -1)

        exit;
    }

}

