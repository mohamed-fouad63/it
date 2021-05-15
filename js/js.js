 (function myMove1() {
    var elem = document.getElementById("animate"); 
    var pos = 0 , h = 1 , w = 1 ;
    var id = setInterval(frame, 1);
    function frame() {
        if (pos == 360 ) {
            clearInterval(id);
        } else {
            pos++; 
            elem.style.transform = 'rotate('+ pos + 'deg'+')'; 
        }
    }
})()
        function myMove1() {
    var elem = document.getElementById("animate"); 
    var pos = 0 , h = 1 , w = 1 ;
    var id = setInterval(frame, 1);
    function frame() {
        if (pos == 360 ) {
            clearInterval(id);
        } else {
            pos++; 
            elem.style.transform = 'rotate('+ pos + 'deg'+')'; 
        }
    }
}