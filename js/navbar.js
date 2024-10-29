/*Menú scroll*/
const r = document.querySelector(':root');

let prevScroll = document.documentElement.scrollTop;
window.onscroll = function() {esconderMostrarMenu()};

function esconderMostrarMenu() {
	let actualScroll = document.documentElement.scrollTop;
	let login = document.getElementById("cabecera-usuario");
	let topNavbar = "";
	if (prevScroll > actualScroll) {
		//Cuando subes muestra el menú
		if (login.getAttribute("hidden") == null) {
			document.getElementById("navbarDiv").style.top = "0px";
		}

		if (actualScroll > 200) {
			document.getElementById("navbar").style.backgroundColor = getComputedStyle(r).getPropertyValue('--dl-color-default-lighttextcolor');
			if (login.getAttribute("hidden") == null) {
				topNavbar = "-90px";
			} else {
				topNavbar = "0";
			}
			
		} else {
			topNavbar = "0";
            document.getElementById("navbar").style.backgroundColor = "transparent";
            document.getElementById("navbar").style.transitionDuration = ".50s";
			if (login.getAttribute("hidden") == null) {
				document.getElementById("navbarDiv").style.top = "0px";
			}
		}

	} else {
		//Cuando bajas se oculta el menú
		topNavbar = "-200px";

		document.getElementById("navbar").style.transitionDuration = ".50s";
        if (actualScroll < 200) {
			topNavbar = "0";
		}

	}

	document.getElementById("navbar").style.top = topNavbar;
    
	prevScroll = actualScroll;
}