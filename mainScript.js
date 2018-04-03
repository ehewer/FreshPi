window.onscroll = function() {myFunction()};
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
    if(window.pageYOffset >= sticky) {
	navbar.classList.add("sticky")
    } else {
	navbar.classList.remove("sticky");
    }
}

function sortFoodlist(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("database");
    switching = true;
    dir = "asc"; // set the sorting direction to ascending
    while (switching){
	switching = false;
	rows = table.getElementsByTagName("TR");

	// loop through all tables rows except the headers
	for (i = 1; i < (rows.length - 1); i++) {
	    shouldSwitch = false;
	    x = rows[i].getElementsByTagName("TD")[n];
	    y = rows[i +1].getElementsByTagName("TD")[n];

	    if (dir == "asc") {
		if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
		    shouldSwitch = true;
		    break;
		}
	    } else if (dir == "desc") {
		if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
		    shouldSwitch = true;
		    break;
		}
	    }
	}
	if (shouldSwitch) {
	    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
	    switching = true;
	    switchcount ++;
	} else {
	    if (switchcount == 0 && dir == "asc") {
		dir = "desc";
		switching = true;
	    }
	}
    }
}
