/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'MaptellZorba\'">' + entity + '</span>' + html;
	}
	var icons = {
		'zorba-fog-light': '&#xe907;',
		'zorba-glowplug': '&#xe908;',
		'zorba-high-beam': '&#xe909;',
		'zorba-hood': '&#xe90a;',
		'zorba-light': '&#xe90b;',
		'zorba-low-beam': '&#xe90c;',
		'zorba-parking-lights': '&#xe90d;',
		'zorba-recirculation': '&#xe910;',
		'zorba-rw-defrost': '&#xe911;',
		'zorba-trunk': '&#xe912;',
		'zorba-turn-signals': '&#xe913;',
		'zorba-ventilating-fan': '&#xe914;',
		'zorba-ws-defrost': '&#xe915;',
		'zorba-ws-washer': '&#xe91b;',
		'zorba-ws-wiper': '&#xe91c;',
		'zorba-dome-light': '&#xe91d;',
		'zorba-doors': '&#xe91e;',
		'zorba-airoutlet': '&#xe91f;',
		'zorba-airbag': '&#xe921;',
		'zorba-brakewarning': '&#xe922;',
		'zorba-abs': '&#xe923;',
		'zorba-brake-left': '&#xe924;',
		'zorba-brakefluid': '&#xe925;',
		'zorba-brake': '&#xe926;',
		'zorba-seatbelt': '&#xe928;',
		'zorba-seatbelt-diag': '&#xe929;',
		'zorba-battery1': '&#xe92b;',
		'zorba-torque1': '&#xe942;',
		'zorba-engine-temperature': '&#xe932;',
		'zorba-temperature2': '&#xe936;',
		'zorba-engine': '&#xe937;',
		'zorba-ignition': '&#xe938;',
		'zorba-ignition-on': '&#xe939;',
		'zorba-temperature1': '&#xe90e;',
		'zorba-tyrepressure': '&#xe90f;',
		'zorba-speed-down': '&#xe916;',
		'zorba-speed-up': '&#xe917;',
		'zorba-temperature-up': '&#xe918;',
		'zorba-steering': '&#xe919;',
		'zorba-aircondition': '&#xe927;',
		'zorba-torque': '&#xe92a;',
		'zorba-rpm-o': '&#xe92f;',
		'zorba-rpm': '&#xe930;',
		'zorba-oiltin': '&#xe931;',
		'zorba-battery-o': '&#xe905;',
		'zorba-temperature': '&#xe906;',
		'zorba-oil': '&#xe902;',
		'zorba-engineload': '&#xe903;',
		'zorba-engineoil': '&#xe901;',
		'zorba-Engine3': '&#xe904;',
		'zorba-car1': '&#xe900;',
		'zorba-location2': '&#xe948;',
		'zorba-compass': '&#xe949;',
		'zorba-compass2': '&#xe94a;',
		'zorba-map': '&#xe94b;',
		'zorba-map2': '&#xe94c;',
		'zorba-airplane': '&#xe9af;',
		'zorba-cloud': '&#xe9c1;',
		'zorba-sphere': '&#xe9c9;',
		'zorba-earth': '&#xe9ca;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/zorba-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
