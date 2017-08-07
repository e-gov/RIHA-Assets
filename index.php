<!DOCTYPE html>
<html lang="et">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RIHA XML varamu</title>
    <link rel="shortcut icon" href="css/images/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/mobileview.css">
    <link rel="stylesheet" href="css/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="css/bower_components/jquery-ui/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="css/bower_components/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/bower_components/build/app.css">

    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="css/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="css/bower_components/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/Detailview.js"></script>
    <?php include 'js/Detailview.php'; ?>
    <script type="text/javascript">
        $(function () {
            $("#headerInclude").load("header.html #header");
            $("#footerInclude").load("footer.html #footer");
        });
    </script></head>

<body>
<div id="headerInclude">
</div>
<main id="content" class="container" style="background-image: url('css/images/bg.png')">
    <div class="container-fluid my-1">
        <h1 id="title">RIHA XML varamu</h1>
        <div class="container">

            <div class="table-responsive">
                <table id="xml-resources-table" class="table table-striped table-bordered table-hover dt-responsive dataTable " cellspacing="0" width="50%">
                    <p id="description">XML vara on RIHA registriobjekt, mis sisaldab vara põhiosaks olevat XML
                    skeemi, seotud dokumente ja metaandmeid. RIHA XML varamus registreeritakse ainult kasutuses olevad
                    varad.</p>
                    <thead id="resources-head" >

                    <tr>
                        <th>Nimi</th>
                        <th>Staatus</th>
                        <th>Vara liik</th>
                    </tr>
                    </thead>

                    <tbody id="xml-resources">
                    <script id="main-row-template" type="text/x-custom-template">
                        <tr>
                            <td><a  class="name_and_version"></a></td>
                            <td class="status"></td>
                            <td class="resource_type"></td>
                        </tr>
                    </script>

                    </tbody>
                </table>
            </div>
        </div>

        <div id="detail">
            <div class="menubar" style="text-align:center;">
                <br>
                <button type="button" class="btn btn-outline-primary btn-sm backButton"
                        style="float: left; margin-left: 10px;">Tagasi
                </button>
                <button type="button" class="btn btn-primary btn-sm dataButton" style="margin-right: 2%;">Üldandmed
                </button>
                <button type="button" class="btn btn-outline-primary btn-sm fileButton">Failid</button>

                <br>
                <hr>
            </div>
            <table id="detail-table" class="table">
                <tbody id="detail-tbody">
                <script id="detail-row-template" type="text/x-custom-template">
                    <tr>
                        <th>Nimetus, eesti keeles:</th>
                    </tr>
                    <tr>
                        <td id="name_est"></td>
                    </tr>

                    <tr>
                        <th>Nimetus, inglise keeles:</th>
                    </tr>
                    <tr>
                        <td id="name_eng"></td>
                    </tr>

                    <tr>
                        <th>Versioon:</th>
                    </tr>
                    <tr>
                        <td id="version"></td>
                    </tr>

                    <tr>
                        <th>Kehtiv alates:</th>
                    </tr>
                    <tr>
                        <td id="start_date"></td>
                    </tr>

                    <tr>
                        <th>Kehtiv kuni:</th>
                    </tr>
                    <tr>
                        <td id="end_date"></td>
                    </tr>

                    <tr>
                        <th>Kirjeldus, eesti keeles:</th>
                    </tr>
                    <tr>
                        <td id="des_est"></td>
                    </tr>

                    <tr>
                        <th>Kirjeldus, inglise keeles:</th>
                    </tr>
                    <tr>
                        <td id="des_eng"></td>
                    </tr>

                    <tr>
                        <th>Vara liik:</th>
                    </tr>
                    <tr>
                        <td id="resource_type"></td>
                    </tr>

                    <tr>
                        <th>Haldaja:</th>
                    </tr>
                    <tr>
                        <td id="owner"></td>
                    </tr>
                </script>
                </tbody>
            </table>
        </div>
        <div id="files" style="background-color: white;">
            <div class="menubar" style="text-align:center;">
                <br>
                <button type="button" class="btn btn-outline-primary btn-sm backButton"
                        style="float: left; margin-left: 10px;">Tagasi
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
</main>
<div id="footerInclude">
</div>

<script src="css/bower_components/jquery/dist/jquery.min.js"></script>
<script src="css/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="css/bower_components/tether/dist/js/tether.min.js"></script>
<script src="css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="css/bower_components/select2/dist/js/select2.min.js"></script>
<script src="css/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="css/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="css/bower_components/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="css/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>