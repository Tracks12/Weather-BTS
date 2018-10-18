/*******************************
*                              *
* File      : style.css        *
* Update at : 28/09/2018       *
* Update by : CARDINAL Florian *
*                              *
*******************************/

var menu = Array('home', 'live', 'story', 'contact', 'login'),
    title = Array('Accueil', 'Temps Réel', 'Historique', 'Contact', 'Connexion');

function startTime(sep) {
	var today = new Date(), delay = 500;
	var h = today.getHours(), m = today.getMinutes();
	if(h < 10) { h = '0'+h; }
	if(m < 10) { m = '0'+m; }
	if(!(document.body.clientWidth <= 690)) {
		var sep = ":", s = today.getSeconds();
		if(s < 10) { s = '0'+s; }
		s = ":"+s;
	} else { var s = ''; delay = 1000; if(sep === ":") { sep = " "; } else { sep = ":"; }}
	document.getElementById('timenow').innerHTML = h+sep+m+s;
	t = setTimeout(function() { startTime(sep); }, delay);
}

class nav {
	static main() {
		var x, y, cell = document.getElementsByClassName('menu'),
		    data = document.location.search.split('?')[1];
		if(data) { data = data.split('=')[1]; }
		
		switch(data) {
			case 'live': x = 1, y = 1; break;
			case 'story': x = 2, y = 2; break;
			case 'contact': x = 3, y = 3; break;
			case 'login': x = 0, y = 4; break;
			case 'home':
			default: x = 0; y = 0; break;
		}
		
		cell[x].style.color = '#00DDDD';
		cell[x].style.paddingLeft = '25px';
		cell[x].style.textShadow = '1px 1px 2px #00DDDD';
		cell[x].style.width = '82.6%';
		
		document.title += " - "+title[y];
		document.getElementsByTagName('h1')[0].innerHTML += " - "+title[y];
		
		if(y === 4) { document.getElementById('user').focus(); }
	}
	
	static sub() {
		var timer, path = document.getElementsByTagName('li')[2],
		    submenu = document.getElementsByTagName('ol')[0];
		
		path.addEventListener("mouseover", function(event) {
			submenu.hidden = false;
			clearTimeout(timer);
		});
		path.addEventListener("mouseout", function(event) {
			timer = setTimeout(function() {
				submenu.hidden = true;
			}, 500);
		});

		submenu.addEventListener("mouseover", function(event) { clearTimeout(timer); });
		submenu.addEventListener("mouseout", function(event) {
			timer = setTimeout(function() {
				submenu.hidden = true;
			}, 500);
		});
	}
}

class graph {
	static courbe(x, values, type) {
		Morris.Line({
			element: document.getElementsByClassName('statgraph')[x],
			data: values,
			xkey: 'time',
			ykeys: [type],
			labels: ['Valeur']
		});
	}
}

/******
* END *
******/
