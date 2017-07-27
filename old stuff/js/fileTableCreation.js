        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "./resources/XMLVarad/Varad.json",
                dataType: "text",
                success: function (data) {
                    $("#fileNames").append(dataProcessing(data));
                }
            });
        });
        function dataProcessing(string) {
            var allowedChars = /^[0-9a-zA-Z._õüäö ÕÜÖÄ()-]+$/;
            var result = string.split('"');
            var table = "<table class='table'>";
            for (var i = 0; i < result.length; i++) {
                table += "<tr>";
                if (result[i].match(allowedChars)) {
                    if (result[i].includes("XMLVara_")) {
                        var header = result[i];
                        table += "<th>" + header + "</th>";
                    } else {
                        table += "<td>" + '<a href="./resources/XMLVarad/' + header + '/' + result[i] + '" download>' + result[i] + "</a>" + "</td>";
                    }
                }
                table += "</tr>";
            }
            table += "</table>";
            return table;
        }