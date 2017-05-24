function timeStart() {
    
    var datum = new Date();
    var h = datum.getHours();
    var m = datum.getMinutes();
    var s = datum.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    var currentTime = h + ":" + m + ":" + s;
    document.getElementById('time').innerHTML = currentTime;
    var t = setTimeout(timeStart, 500);
    var pausen = ["09:15:00", "10:00:00", "11:15:00", "12:00:00", "13:00:00", "13:45:00", "14:30:00", "15:30:00", "16:15:00"]; //Ein Array mit allen Pausenstartzeiten

    if(pausen.indexOf(currentTime)> -1){
        pausealert();
    }
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function pausealert(){
    document.getElementById("pause").setAttribute('notification','notification');
    document.getElementById("pause").innerHTML = "Es ist Pause";
    setTimeout(pauseend, 10000);
}
function pauseend(){
    document.getElementById("pause").removeAttribute('notification','notification');
    document.getElementById("pause").innerHTML = "";
}