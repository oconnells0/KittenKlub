/**
 * Get user's images from the database
 *
 * @author Michael Crinite
 */
var xmlhttp;

$(document).ready(function(){
  /**
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("image-table").innerHTML = this.responseText;
            }
        };
    //for now we don't have usernames
    //xmlhttp.open("GET","getImages.php?u=0"); //Leave in for elvis
    xmlhttp.open("GET","http://localhost/getImages.php?u=0");
    xmlhttp.send();
    */

    $.ajax({
        async: false,
        type: 'GET',
        url: 'http://localhost/getImages.php',
        //url: '../php/getImages.php',
        dataType: 'jsonp',
        contentType:'application/javascript',
        jsonp: 'callback',
        jsonpcallback: 'logResults',
        data: {userID: 0},
        success: function(response, textStatus){
            console.log(response);
            try {
                if(response.length !== 0){
                  document.getElementById("image-table").innerHTML = response;
                }
                else {
                  console.log("No images returned from the database");
                }
            }catch(e){
                console.log(e.getMessage());
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error " + errorThrown + "\n" + textStatus);
        }
    })
});
