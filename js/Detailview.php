<?php 
        $iti = new RecursiveDirectoryIterator(getcwd().'/resources/XMLVarad');
        $numberOfJsonFiles = 0;
        $currentFileNumber = 0;
        foreach(new RecursiveIteratorIterator($iti) as $file){
            if(strpos($file , 'varamu.json') !== false){
                $numberOfJsonFiles++;
            }
        }
        $fp = fopen(getcwd().'/resources/XMLVarad/varamuteKogumik.json', 'a');
        file_put_contents(getcwd()."/resources/XMLVarad/varamuteKogumik.json", "");
        fwrite($fp, '[');
        foreach(new RecursiveIteratorIterator($iti) as $file){
            if(strpos($file , 'varamu.json') !== false){
                $string = file_get_contents($file);
                $json_a = json_decode($string, true);
                    
                foreach ($json_a as $person_a) {
                    $currentFileNumber++;
                    if($currentFileNumber == $numberOfJsonFiles){
                        fwrite($fp, json_encode($person_a));
                    }else {
                        fwrite($fp, json_encode($person_a).',');
                    }
                }
            }
        }
        fwrite($fp, ']');
        fclose($fp);
?>
<script type='text/javascript'>
$(document).ready(function () {
    var filesArrayPHP = [];
    <?php 
        $it = new RecursiveDirectoryIterator(getcwd()."/resources/XMLVarad");
        foreach(new RecursiveIteratorIterator($it) as $file)
        { 
            if(substr($file, -1) != ".." && substr($file, -1) != "." && strpos($file, '.DS_Store') == false){
                echo 'filesArrayPHP.push("'. $file .'");';
            }
        }


    ?>
    $('#detail').hide();
    var template = $('#main-row-template').html();
    var tBody = $('#xml-resources');
    var id = "";
    var url = 'https://'+window.location.hostname;
    

    $.getJSON('resources/XMLVarad/varamuteKogumik.json', function (data) {
        var resourceName = "";
        var resourceVersion = "";
        var usedNames = [];

        //show only repeating names' latest version
        data.forEach(function (resource, index) {
            var newRow = $(template);
            if(resourceName == resource.Name_est){
                if(parseInt(resource.Version, 10) > parseInt(resourceVersion, 10)){
                    newRow.find('.name_and_version').text(resource.Name_est).attr("id", index);
                    newRow.find('.status').text(resource.Status);
                    newRow.find('.resource_type').text(resource.Resource_type);
                    resourceName = resource.Name_est;
                    usedNames.push(resourceName);
                    tBody.append(newRow);
                }
            } else {
                resourceName = resource.Name_est;
                resourceVersion = resource.Version;
            }
            $('#files').hide();
        });
        
        //go through all again, but show only non-duplicates
        data.forEach(function (resource, index) {
            var newRow = $(template);
                if(!usedNames.includes(resource.Name_est)){
                    newRow.find('.name_and_version').text(resource.Name_est).attr("id", index);
                    newRow.find('.status').text(resource.Status);
                    newRow.find('.resource_type').text(resource.Resource_type);
                    tBody.append(newRow);
                }
        });

        $('.name_and_version').click(function (event) {
            var resource = data[event.target.id];
            id = resource;
            var temp = $('#detail-row-template').html();
            var dtbody = $('#detail-tbody');
            var currentName = resource.Name_est;
            var currentVersion = resource.Version;
            var newRow = $(temp);
            if(usedNames.includes(resource.Name_est)){
                data.forEach(function (resource, index) {
                    if(resource.Name_est == currentName && resource.Version == currentVersion){
                        $('.menubar').append('<button type="button" id="'+index+'" class="btn btn-primary btn-sm versionButton" style="margin-bottom: 2%;">V'+resource.Version+'</button>');
                    } else if(resource.Name_est == currentName){
                        $('.menubar').append('<button type="button" id="'+index+'" class="btn btn-outline-primary btn-sm versionButton" style="margin-bottom: 2%;">V'+resource.Version+'</button>');
                    }
                });
            }

            $('.versionButton').click(function (event){
                $('.versionButton').attr("class","btn btn-outline-primary btn-sm versionButton");
                $(this).attr("class","btn btn-primary btn-sm versionButton");
                
                resource = data[event.target.id];
                id = resource;
                newRow.find('#name_est').text(resource.Name_est);
                newRow.find('#name_eng').text(resource.Name_eng);
                newRow.find('#version').text(resource.Version);
                newRow.find('#start_date').text(resource.Start_date);
                newRow.find('#end_date').text(resource.End_date);
                newRow.find('#des_est').text(resource.Description_est);
                newRow.find('#des_eng').text(resource.Description_eng);
                newRow.find('#stored').text(resource.Stored_until);
                newRow.find('#resource_type').text(resource.Resource_type);
                newRow.find('#owner').text(resource.Owner);
                newRow.find('#field').text(resource.Field);

                dtbody.append(newRow);
            });

            newRow.find('#name_est').text(resource.Name_est);
            newRow.find('#name_eng').text(resource.Name_eng);
            newRow.find('#version').text(resource.Version);
            newRow.find('#start_date').text(resource.Start_date);
            newRow.find('#end_date').text(resource.End_date);
            newRow.find('#des_est').text(resource.Description_est);
            newRow.find('#des_eng').text(resource.Description_eng);
            newRow.find('#resource_type').text(resource.Resource_type);
            newRow.find('#owner').text(resource.Owner);

            dtbody.append(newRow);

            $('.table-responsive').hide();
            $('#detail').show().css("background-color", "white");
            $('#files').hide();

            $('#detail-tbody th').css('white-space', 'nowrap');
        });

        $('.fileButton').on('click', function (event) {
            $('#files-content').empty();
            $('#detail').hide();
            $('#files').show();
            $('.versionButton').hide();
            var filesArray = id.Files;
            var fileName = id.Name_est;
            var directoryName = fileName.replace(/\s/g, "_");
            var directoryVersion = id.Version;
            $('#files-content').append("<h3>" + fileName + "</h3>");
            for (var index = 0; index < filesArrayPHP.length; index++) {
                var filePath = replaceAllSpecialChars(filesArrayPHP[index]);
                var adjustedURL = reworkFilePath(filePath);
                if(filePath.indexOf(directoryName) >= 0 && filePath.indexOf(directoryVersion) >= 0 && !filePath.includes('varamu.json')){
                    $('#files-content').append('<a href="'+'.'+adjustedURL+'" download>' + findFileName(filePath, directoryName+'_V'+directoryVersion) + "</a><br>");
                    $('#files-content').append(
                        '<details><summary>URL</summary><p>'+url+adjustedURL.replace('.','') +'</p></details><br>'
                    );
                } else if(filePath.indexOf(directoryName) >= 0 && (directoryVersion.length > 3 || directoryVersion.length == 0) && !filePath.includes('varamu.json')){
                    $('#files-content').append('<a href="'+'.'+adjustedURL+'" download>' + findFileName(filePath, directoryName) + "</a><br>");
                    $('#files-content').append(
                        '<details><summary>URL</summary><p>'+url+adjustedURL.replace('.','') +'</p></details><br>'
                    );
                }
            }
            $('summary').css('cursor','pointer');
        });

        $('.name_and_version').css("color", "green").hover(function () {
            $(this).css("cursor", "pointer");
            $(this).css("color", "#023cc1");
        }, function () {
            $(this).css("color", "green");
        });
    });

    $('.backButton').on('click', function (event) {
        $('#detail tr').remove();
        $('#detail').hide();
        $('#files').hide();
        $('#files-content').empty();
        $('.versionButton').remove();
        $('.table-responsive').show();
    });
    $('.dataButton').on('click', function (event) {
        $('.table-responsive').hide();
        $('#files').hide();
        $('#files-content').empty();
        $('.versionButton').show();
        $('#detail').show();
    });

});

function replaceAllSpecialChars(string) {
    result = string.replace(/Õ/g, "Õ");
    result2 = result.replace(/ä/g, "ä");
    result3 = result2.replace(/Ü/g, "Ü");
    result4 = result3.replace(/õ/g, "õ");
    return result4;
}
function reworkFilePath(filepath) {
    return '.'+filepath.substring(filepath.indexOf('/resources/'));
}

function findFileName(filepath, parentDirectory) {
    return filepath.substring(filepath.indexOf('/failid/')+('/failid/').length);
}
</script>