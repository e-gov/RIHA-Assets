<!DOCTYPE html>
<html lang="et">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RIHA XML Varamu</title>
    <link rel="shortcut icon" href="https://www.ria.ee/extensions/ria_2011/images/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="small.css">
    <link rel="stylesheet" href="css/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="css/bower_components/jquery-ui/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="css/bower_components/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/bower_components/build/app.css">

    <!-- Include script -->
    <!--<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#headerInclude").load("header.html #header");
            $("#footerInclude").load("footer.html #footer");
        });
    </script>-->

    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="css/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="css/bower_components/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <?php include 'js/Detailview.php';?>
</head>

<body>
    <div id="wrap">
        <?php include 'header.html';?>
        <!--div id="headerInclude" /></div -->
    <main id="content" class="container" style="background-image: url('css/images/bg.png')">
        <div class="container-fluid my-1" style="width: 80%; padding: 30px">
            <h1 id="title">RIHA XML Varamu</h1>
            <div class="table-responsive">
                <table id="xml-resources-table" class="table table-striped table-bordered dataTable">

                    <thead id="resources-head">
                        <tr>
                            <th>Nimi ja Versioon</th>
                            <th>Publitseeritud</th>
                            <th>Staatus</th>
                            <th>Vara liik</th>
                        </tr>
                    </thead>

                    <tbody id="xml-resources">
                        <script id="main-row-template" type="text/x-custom-template">
                            <tr>
                                <td class="name_and_version"></td>
                                <td class="published"></td>
                                <td class="status"></td>
                                <td class="resource_type"></td>
                            </tr>
                        </script>

                    </tbody>
                </table>
            </div>
            <div id="detail">
                <div class="menubar" style="text-align:center;">
                    <br>
                    <button type="button" class="btn btn-outline-primary btn-sm backButton" style="float: left; margin-left: 10px;">Tagasi</button>
                    <button type="button" class="btn btn-primary btn-sm dataButton" style="margin-left: -9%;">Üldandmed</button>
                    <button type="button" class="btn btn-outline-primary btn-sm fileButton">Failid</button>

                    <br>
                    <hr>
                </div>
                <table id="detail-table" class="table">
                    <tbody id="detail-tbody">
                        <script id="detail-row-template" type="text/x-custom-template">
                            <tr>
                                <th>Nimetus, eesti keeles:</th>
                                <td id="name_est"></td>
                            </tr>
                            <tr>
                                <th>Nimetus, inglise keeles:</th>
                                <td id="name_eng"></td>
                            </tr>
                            <tr>
                                <th>Versioon:</th>
                                <td id="version"></td>
                            </tr>
                            <tr>
                                <th>Kehtiv alates:</th>
                                <td id="start_date"></td>
                            </tr>
                            <tr>
                                <th>Kehtiv kuni:</th>
                                <td id="end_date"></td>
                            </tr>
                            <tr>
                                <th>Kirjeldus, eesti keeles:</th>
                                <td id="des_est"></td>
                            </tr>
                            <tr>
                                <th>Kirjeldus, inglise keeles:</th>
                                <td id="des_eng"></td>
                            </tr>
                            <tr>
                                <th>Säilitus tähtaeg:</th>
                                <td id="stored"></td>
                            </tr>
                            <tr>
                                <th>Litsents:</th>
                                <td id="licence"></td>
                            </tr>
                            <tr>
                                <th>Vara liik:</th>
                                <td id="resource_type"></td>
                            </tr>
                            <tr>
                                <th>Haldaja:</th>
                                <td id="owner"></td>
                            </tr>
                            <tr>
                                <th>Valdkond:</th>
                                <td id="field"></td>
                            </tr>
                        </script>
                    </tbody>
                </table>
            </div>
            <div id="files" style="background-color: white;">
                <div class="menubar" style="text-align:center;">
                    <br>
                    <button type="button" class="btn btn-outline-primary btn-sm backButton" style="float: left; margin-left: 10px;">Tagasi</button>
                    <button type="button" class="btn btn-outline-primary btn-sm dataButton" style="margin-left: -9%;">Üldandmed</button>
                    <button type="button" class="btn btn-primary btn-sm fileButton">Failid</button>
                    <br>
                    <hr>
                </div>
                <div id="files-content" style="word-wrap: break-word;">

                </div>

            </div>
        </div>
    </main>
    <?php include 'footer.html';?>
    <!--div id="footerInclude" /></div-->


    </div>
    <!--script src="css/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="css/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="css/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="css/bower_components/select2/dist/js/select2.min.js"></script>
    <script src="css/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="css/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="css/bower_components/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script- src="css/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script-->
</body>

</html>