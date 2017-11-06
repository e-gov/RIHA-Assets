<?php

$resourcesDirectory = 'resources/';
$resourcesListFile = $resourcesDirectory . 'resources.json';
$resourcesFilesListFile = $resourcesDirectory . 'files.js';
$resourceDescriptionFile = 'resource.json';

$workDir = getcwd().'/';#str_replace('\\','/', getcwd());
    if (!@file_exists($workDir . $resourcesListFile)){
    header('Location: 404.html');
    exit;
    }

$iti = new RecursiveDirectoryIterator($workDir . $resourcesDirectory);
$resourceDescriptions = array();
$recursiveIti = new RecursiveIteratorIterator($iti);
$files = array();
    foreach ($recursiveIti as $file) {
        if (substr($file, -1) != ".." && substr($file, -1) != "." && strpos($file, $resourceDescriptionFile) === false && strpos($file, $resourcesFilesListFile) === false && strpos($file, $resourcesListFile) === false) {
        $file = substr($file, strpos($file, '/resources'));
        $files[] = convertFileName($file);
        }
    }
    foreach ($recursiveIti as $file) {
        if (strpos($file, $resourceDescriptionFile) !== false) {
        $string = file_get_contents($file);
        $json_a = json_decode($string, true);
        $asset = $json_a[0];
        $dir = convertFileName(dirname(substr($file, strpos($file, '/resources')+11)));
        $files2 = array();
            foreach ($files as $file2) {
                if (strpos($file2, $dir) !== false)
                $files2[] = $file2;
            }
        $asset['Files'] = $files2;
        array_push($resourceDescriptions, json_encode($asset));
        }
    }
$newResourceListJSON = '[' . implode($resourceDescriptions, ',') . ']';
$resourceListJSON = file_get_contents($workDir . $resourcesListFile);
    if($resourceListJSON != $newResourceListJSON)
        file_put_contents($workDir . $resourcesListFile, $newResourceListJSON, LOCK_EX);

function convertFileName($file) {
$file = str_replace('\\', '/', $file);
$file = (substr($file, 0 ,1)=='/' ? substr($file, 1) : $file);
$file = mb_convert_encoding($file, 'UTF-8', mb_detect_encoding($file, 'auto'));
return $file;
}

?><!DOCTYPE html>
<html lang="et">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>XML varamu - Riigi infosüsteemi haldussüsteem RIHA</title>
    <link rel="icon" type="image/png" href="/assets/coat-of-arms-favicon.png">
    <link rel="apple-touch-icon" href="/assets/apple-touch-coat-of-arms-favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="css/bower_components/jquery-ui/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="css/bower_components/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/bower_components/build/app.css">

    <link rel="stylesheet" href="css/resources.css">
    <script src="css/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#headerInclude").load("header.html #header");
            $("#footerInclude").load("footer.html #footer");
        });

    </script>
</head>

<body>
<div id="headerInclude">
</div>
<main class="container" id="content">
    <header class="pagehead" style="background-image:url(/assets/images/data/intro-bg.png)">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0 mb-md-4">XML varamu</h1>
            </div>
        </div>
    </header>
    <section class="col card p-3">
        <div class="my-1">
            <p id="description" class="table-view">RIHA XML varamu ülesandeks on kontrollida ja säilitada dokumendiliigi ning metaandmete andmekirjeldusi, mida edastatakse <a href="https://www.ria.ee/ee/dokumendivahetus-dhx.html">asutustevahelise dokumendivahetuslahenduse (DVK/DHX)</a> kaudu. <a href="https://abi.riha.ee/XML-varamu">Loe lähemalt RIHA abikeskusest</a></p>
            <div>
                <table cellspacing="0" class="table table-striped table-bordered dataTable table-view" id="xml-resources-table" width="100%">
                    <thead class="thead-default">
                        <tr>
                            <th>
                                <button class="btn btn-primary btn-sm">Nimi
                                </button>
                            </th>
                            <th>
                                <button class="btn btn-primary btn-sm">Staatus
                                </button>
                            </th>
                            <th>
                                <button class="btn btn-primary btn-sm">Vara liik
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="xml-resources">
                    <script id="main-row-template" type="text/x-custom-template">
                        <tr>
                            <td><a class="name_and_version"></a></td>
                            <td class="status"></td>
                            <td class="resource_type"></td>
                        </tr>
                    </script>
                    </tbody>
                </table>

        <div id="detail" class="detail-view">
            <div class="menubar" style="text-align:center;">
                <br>
                <button type="button" class="btn btn-outline-primary btn-sm backButton"
                        style="float: left; margin-left: 10px;">Tagasi nimekirja
                </button>
                <button type="button" class="btn btn-primary btn-sm dataButton" style="margin-right: 2%;">Üldandmed
                </button>
                <button type="button" class="btn btn-outline-primary btn-sm fileButton">Failid</button>

                <br>
                <hr>
                <span class="versionbar"></span>
            </div>
            <table id="detail-table" class="table content">
                <tbody id="detail-tbody">
                <script id="detail-row-template" type="text/x-custom-template">
                    <tr>
                        <td colspan="2"><h2 id="name_est"></h2></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label>Omanik:</label>
                                <p id="owner"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label>Kirjeldus:</label>
                                <p id="des_est"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label>Versioon:</label>
                                <p id="version"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label>Kehtiv:</label>
                                <p><span id="start_date"></span>...<span id="end_date"></span></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label>Vara liik:</label>
                                <p id="resource_type"></p>
                            </div>
                        </td>
                    </tr>
                    <tr style="display: none;">
                        <th>Nimetus, inglise keeles:</th>
                        <td id="name_eng"></td>
                    </tr>
                    <tr style="display: none;">
                        <th>Kirjeldus, inglise keeles:</th>
                        <td id="des_eng"></td>
                    </tr>
                </script>
                </tbody>
            </table>
        </div>
        <div id="files" style="background-color: white;" class="detail-view">
            <div class="menubar" style="text-align:center;">
                <br>
                <button type="button" class="btn btn-outline-primary btn-sm backButton"
                        style="float: left; margin-left: 10px;">Tagasi nimekirja
                </button>
                <button type="button" class="btn btn-outline-primary btn-sm dataButton" style="margin-left: -9%;">
                    Üldandmed
                </button>
                <button type="button" class="btn btn-primary btn-sm fileButton">Failid</button>
                <br>
                <hr>
            </div>
            <div id="files-content" style="word-wrap: break-word;">
            </div>

        </div>
            </div>
        </div>
    </section>
</main>
<div id="footerInclude"/>
</div>
<script src="css/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="css/bower_components/tether/dist/js/tether.min.js"></script>
<script src="css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="css/bower_components/select2/dist/js/select2.min.js"></script>
<script src="css/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="css/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="css/bower_components/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="css/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/Detailview.js"></script>

<!-- Google Analytics Tracking Code for test.riha.ee -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-66693747-3', 'auto');
  ga('send', 'pageview');
</script>
</body>

</html>
