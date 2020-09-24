alert("i");
let map = {};
let handler1 = true;
onkeydown = onkeyup = function(e){
    e = e || event; // to deal with IE
	map[e.keyCode] = e.type == 'keydown';
	if(map[17] && map[16] && map[65]){
        if(handler1 == false) {
            document.querySelector(".containerss").style.transform = "translate(100%, 0)";
            handler1 = true;
        } else {
            handler1 = false;
           	document.querySelector(".containerss").style.transform = "translate(0, 0)";
        }
		map = {};
	}
}