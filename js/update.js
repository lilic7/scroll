$(document).ready(function(){
    setInterval(function(){ update() }, 1000);
});

var times = 0;
var seconds = 0;
var currentValue = '';
var interval = 20; // seconds


function update() {

    seconds++;
    
    var d = new Date();    
    var t = d.toLocaleTimeString();
    
    $("#clock").html(t);
    
    if(times === 5){ 
        times = 0;
        $("#result").html(currentValue);
    } // la fiecare al 6-lea update, se sterge toata informatia din pagina
    
    if(seconds === interval){
        times++;
        seconds = 0;
        $.get('update.php', function(data){
            currentValue = "<p class='time'>"+t+"</p>"+": <p>"+data+"</p><hr>";
            $("#result").append(currentValue);
        });
    } // se face update la intervalul indicat
}

function update_now(){
    
    var d = new Date();    
    var t = d.toLocaleTimeString();
        
    $.get('update.php', function(data){
            currentValue = "<p class='time'>"+t+"</p>"+": <p>"+data+"</p><hr>";
            $("#result").append(currentValue);
        });
}