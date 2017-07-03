$(document).ready(function () {
    $('#detail').hide();
    var template = $('#main-row-template').html();
    var tBody = $('#xml-resources');
    var id = "";
    var url = 'https://'+window.location.hostname;
  
    $.getJSON('js/xmlVara.json', function (data) {
        data.forEach(function (resource, index) {
            var newRow = $(template);
            
            newRow.find('.name_and_version').text(resource.Name_est + " " + resource.Version).attr("id", index);
            newRow.find('.published').text(resource.Published);
            newRow.find('.status').text(resource.Status);
            newRow.find('.resource_type').text(resource.Resource_type);


            tBody.append(newRow);
            $('#files').hide();
        });
        $('.name_and_version').click(function (event) {
            var resource = data[event.target.id];
            id = resource;
            var temp = $('#detail-row-template').html();
            var dtbody = $('#detail-tbody');

            var newRow = $(temp);

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

            $('.table-responsive').hide();
            $('#detail').show().css("background-color", "white");
            $('#files').hide();

            $('#detail-tbody th').css('white-space', 'nowrap');
        });

        $('.fileButton').on('click', function (event) {
            $('#detail').hide();
            $('#files').show();
            var filesArray = id.Files;
            var fileName = id.Name_est;
            $('#files-content').append("<h3>" + fileName + "</h3>");
            for (var i = 0; i < filesArray.length; i++) {
                if (id.Version.length > 3 ||  id.Version.length == 0) {
                    var fileUrl = '/resources/XMLVarad/XMLVara_'+ fileName + '/' + filesArray[i];
                    var fileUrlUnderscore = fileUrl.replace(/\s/g, "_");
                    $('#files-content').append('<a href="'+'.'+fileUrlUnderscore+'" download>' + filesArray[i] + "</a><br>");
                    $('#files-content').append(
                        '<details><summary>URL</summary><p>'+url+fileUrlUnderscore +'</p></details>'
                        );
                    $('#files-content').append('<br>');
                    $('summary').css('cursor','pointer');
                } else {
                    var fileUrlWithVersion = '/resources/XMLVarad/XMLVara_'+ fileName + '_V' + id.Version + '/' + filesArray[i];
                    var fileUrlWithVersionUnderscore = fileUrlWithVersion.replace(/\s/g, "_");
                    $('#files-content').append('<a href="'+'.'+fileUrlWithVersionUnderscore+'" download>' + filesArray[i] + "</a><br>");
                    $('#files-content').append(
                        '<details><summary>URL</summary><p>'+url+fileUrlWithVersionUnderscore +'</p></details>'
                        );
                    $('#files-content').append('<br>');
                    $('summary').css('cursor','pointer');
                }
            }

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
        $('.table-responsive').show();
    });
    $('.dataButton').on('click', function (event) {
        $('.table-responsive').hide();
        $('#files').hide();
        $('#files-content').empty();
        $('#detail').show();
    });

});