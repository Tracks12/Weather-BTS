/*******************************
*                              *
* File      : style.css        *
* Update at : 28/09/2018       *
* Update by : CARDINAL Florian *
*                              *
*******************************/

var menu = Array('home', 'live', 'story', 'contact');

function mainMenu() {
	var x, cell = document.getElementsByClassName('menu');
	
	switch(document.location.search.split('?')[1].split('=')[1]) {
		case 'home':
		default: x = 0; break;
		case 'live': x = 1; break;
		case 'story': x = 2; break;
		case 'contact': x = 3; break;
	}
	
	cell[x].style.color = '#00DDDD';
	cell[x].style.paddingLeft = '25px';
	cell[x].style.textShadow = '1px 1px 2px #00DDDD';
	cell[x].style.width = '82.6%';
}

/******
* END *
******/
