var mask = document.getElementById("mask");
	    var login = document.getElementById("login");
	    var close = document.getElementById("close");
	    var qc = document.getElementById("qc");
	    var contains = document.getElementById("contain");
	    var code = document.getElementById("code");
	    var log = true;
	    close.onclick = function() {
	        mask.style.display = "none";
	    };
	    login.onclick = function() {
	        mask.style.display = "block";
	    };
	    qc.onclick = function() {
	        if (log) {
	            contains.style.display = "none";
	            code.style.display ="block";
	            log = false;
	        }else{
	            contains.style.display = "block";
	            code.style.display ="none";
	            log = true;
	        }
	    };