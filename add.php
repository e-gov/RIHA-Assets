<head>

    <title>Lisa uus vara</title>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RIHA XML Varamu</title>
    <link rel="shortcut icon" href="https://www.ria.ee/extensions/ria_2011/images/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="css/bower_components/jquery-ui/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="css/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/bower_components/build/app.css">


    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="css/bower_components/datatables/media/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
<div id="wrap">
        <?php include 'header.html'; ?>
    <!--div id="headerInclude" /></div-->
    <main id="new-resource">
        <div class="container">
            <h2>Uus XML vara</h2>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name-est">Nimetus, eesti keeles</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name-est" placeholder="Eestikeelne nimetus" name="name-est">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name-eng">Nimetus, inglise keeles</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name-eng" placeholder="Inglisekeelne nimetus" name="name-eng">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="version">Versioon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="version" placeholder="Versiooni number" name="version">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="start-date">Kehtiv alates</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="start-date" placeholder="Kehtivuse algus kuupäev" name="start-date">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="end-date">Kehtiv kuni</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="end-date" placeholder="Kehtivuse algus kuupäev" name="end-date">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="description-est">Kirjeldus, eesti keeles</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4" id="description-est"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="description-eng">Kirjeldus, inglise keeles</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4" id="description-eng"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="stored-until">Säilitus tähtaeg</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="stored-until" placeholder="Säilitus aja pikkus" name="stored-until">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="licence">Litsents</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="licence" placeholder="" name="licence">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="resource-type">Vara liik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="resource-type" name="resource-type">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="owner">Haldaja</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="owner"  name="owner">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="field">Valdkond</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="field" name="field">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Saada taotlus</button>
                    </div>
                </div>
            </form>
        </div>

    </main>
    <?php include 'footer.html'; ?>
    <!--div id="footerInclude" /></div-->

</div>
</body>