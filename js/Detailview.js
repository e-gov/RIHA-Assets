/**
 * Created by janarp on 03/08/17. Updated by hannesg on 13/09/17
 */

$(document).ready(function () {
    $('.detail-view').hide();
    var template = $('#main-row-template').html();
    var tBody = $('#xml-resources');
    var id = "";
    $.getJSON('resources/resources.json', function (data) {
        var resourceName = "";
        var resourceVersion = "";
        var usedNames = [];
        //show only repeating names' latest version
        data.forEach(function (resource, index) {
            var newRow = $(template);
            if (resourceName == resource.Name_est) {
                if (parseInt(resource.Version, 10) > parseInt(resourceVersion, 10)) {
                    newRow.find('.name_and_version').text(resource.Name_est).attr("id", index).attr('href', '#'+index);
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
            if (!usedNames.includes(resource.Name_est)) {
                newRow.find('.name_and_version').text(resource.Name_est).attr("id", index).attr('href', '#'+index);
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
            $('#detail-tbody tr').remove();
            var currentName = resource.Name_est;
            var currentVersion = resource.Version;
            var newRow = $(temp);
            $('.versionbar').empty();
            if (usedNames.includes(resource.Name_est)) {
                data.forEach(function (resource, index) {
                    if (resource.Name_est == currentName) {
                        $('.versionbar').append('<button type="button" id="' + index + '" class="btn btn-' + (resource.Version == currentVersion ? '' : 'outline-') + 'primary btn-sm versionButton">V' + resource.Version + '</button>');
                    }
                });
            }
            $('.versionButton').click(function (event) {
                $('.versionButton').attr("class", "btn btn-outline-primary btn-sm versionButton");
                $(this).attr("class", "btn btn-primary btn-sm versionButton");
                resource = data[event.target.id];
                id = resource;
                updateFields(newRow, resource);
                newRow.find('#field').text(resource.Field);
                dtbody.append(newRow);
            });
            updateFields(newRow, resource);
            dtbody.append(newRow);
            $('.table-view').hide();
            $('#detail').show();
            $('#files').hide();
        });
        $('.fileButton').on('click', function (event) {
            $('.detail-view').hide();
            $('#files-content').html(getListOfFileNames(id.Name_est + ' (' + id.Version + ')', id.Files));
            $('#files').show();
        });
        $('.name_and_version').css("color", "#023cc1").hover(function () {
            $(this).css("cursor", 'pointer');
            $(this).css("color", "black");
        }, function () {
            $(this).css("color", "#023cc1");
        });
        if (!(location.hash==='')) {
        var pageId = location.hash.substr(1,1);
        $('#'+pageId).trigger('click');
        }
    });
    $('.backButton').on('click', function (event) {
        $('.table-view').show();
        $('.detail-view').hide();
        location.hash = '';
    });
    $('.dataButton').on('click', function (event) {
        $('.table-view').hide();
        $('.detail-view').show();
        $('#files').hide();
    });
    $(window).on('hashchange', function() {
        var pageId = location.hash.substr(1,1);
        $('#'+pageId).trigger('click');
    });

/*    $('#xml-resources-table').DataTable({
        responsive: {
            details: {
                type: 'column'
            }
        },
        "paging": false,
        "searching": false,
        "language": {
          "emptyTable": "Ei leitud ühtegi XML vara",
          "info": "",
          "infoEmpty": ""
        }
    }); */
});

function findFileName(filepath) {
return filepath.substring(filepath.indexOf('/files/') + ('/files/').length);
}

function getListOfFileNames(name, files) {
var t = '<table class="content"><tbody><tr><td><h2>' + name + '</h2></td></tr></tbody></table><ul>';
    for (var index = 0; index < files.length; index++) {
    t += '<li><a href="' + files[index] + '">' + findFileName(files[index]) + '</a></li>';
    }
t += '</ul>';
return t;
}

function updateFields(newRow, resource) {
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
return newRow;
}
