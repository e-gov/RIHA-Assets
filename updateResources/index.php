<?php

//* Just in case: deny running in RIA LIVE environment
    if (substr($_SERVER['HTTP_HOST'],-6) == 'ria.ee') {
    header('HTTP/1.0 404 Not Found');
    header('Location: 404.html');
    exit;
    }
// */

echo '<title>Update resources</title><h1>Update resources</h1><p>Initializing... done.<br />';

$resourcesDirectory = '../resources/';
$resourcesListFile = $resourcesDirectory . 'resources.json';
$resourceDescriptionFile = 'resource.json';

$workDir = getcwd().'/';#str_replace('\\','/', getcwd());
    if (!@file_exists($workDir . $resourcesListFile)) {
    echo 'Resource file not present. Ending work... done.';
    exit;
    }

$iti = new RecursiveDirectoryIterator($workDir . $resourcesDirectory);
$resourceDescriptions = array();
$recursiveIti = new RecursiveIteratorIterator($iti);
$files = array();
    foreach ($recursiveIti as $file)
        if (substr($file, -1) != ".." && substr($file, -1) != "." && strpos($file, $resourceDescriptionFile) === false && strpos($file, $resourcesListFile) === false)
        $files[] = convertFileName(substr($file, strlen($workDir . $resourcesDirectory)));
    foreach ($recursiveIti as $file) {
    $file = convertFileName(realpath($file));
        if (strpos($file, $resourceDescriptionFile) !== false) {
        $string = file_get_contents($file);
        $asset = json_decode($string, true);
        $url = substr($file, 0, strrpos($file, '/'));
        $url = substr($url, strpos($url, '/resources/')+11); echo $url;
        $asset = array('url' => $url) + $asset;
        $files2 = array();
            foreach ($files as $file2)
                if (strpos($file2, $asset['url']) !== false)
                $files2[] = $file2;
        natcasesort($files2);
        $asset['files'] = array_values($files2);
        $asset['url'] = (dirname($asset['url'])=='.' ? $asset['url'] : dirname($asset['url']));
        $resourceDescriptions[] = $asset;
        echo '- '.$asset['name'].($asset['version'] ? ' (v'.$asset['version'].')' : '').' extracted successfully.<br />';
        }
    }
usort($resourceDescriptions, "sortResources");
$newResourceListJSON = json_encode($resourceDescriptions);
$resourceListJSON = file_get_contents($workDir . $resourcesListFile);
    if($resourceListJSON == $newResourceListJSON) {
    echo 'Extracted resources the same as in original file. File not overwritten.<br />';
    }
    else {
    file_put_contents($workDir . $resourcesListFile, $newResourceListJSON, LOCK_EX);
    echo 'Extracted resources different than in original file. File overwritten.<br />';
    }
echo 'Total '.count($resourceDescriptions).' assets extracted. <a href="'.$resourcesListFile.'">See result</a>. Ending work... done.</p>';

function convertFileName($file) {
$file = str_replace('\\', '/', $file);
$file = (substr($file, 0 ,1)=='/' ? substr($file, 1) : $file);
$file = mb_convert_encoding($file, 'UTF-8', mb_detect_encoding($file, 'auto'));
return $file;
}

function sortResources($a, $b) {
return ($a['name'] == $b['name'] ? ($a['version'] > $b['version']) : strnatcasecmp($a['name'], $b['name']));
}