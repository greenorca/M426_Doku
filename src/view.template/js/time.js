setInterval(function getTime(){
    $.ajax({
        url: "controller/TimeController.php",
        type: "POST",
        data:"",
        success: function(result){
                timeStart(result);
            }
        });
},1000);

/**
* This function prints the unix timestamp to a human readable format.
* It also checks the pause times and will notify us, if a pause is in progress.
* @param result
*/
function timeStart(result) {
    var datum = new Date(result*1000);
    var h = datum.getHours();
    var m = datum.getMinutes();
    var s = datum.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    var currentTime = h + ":" + m + ":" + s;
    $("#time").html(currentTime);
    var pausen = ["09:15:00", "10:00:00", "11:15:00", "12:00:00", "13:00:00", "13:45:00", "14:30:00", "15:30:00", "16:15:00"]; //Ein Array mit allen Pausenstartzeiten

    if(pausen.indexOf(currentTime)> -1){
        pausealert();
    }
}

/**
* This function adds a leader 0 to the number, if the number is smaller than 10.
* @param i
*/
function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
}

/**
* This function displays the pause alert and waits 5 minutes.
* It will call the remove function after timeout.
*/
function pausealert(){
    document.getElementById("pause").setAttribute('notification','notification');
    document.getElementById("pause").innerHTML = "Es ist Pause";
    setTimeout(pauseend, 300000);
}

/**
* This function removes the pause alert.
*/
function pauseend(){
    document.getElementById("pause").removeAttribute('notification','notification');
    document.getElementById("pause").innerHTML = "";
}
