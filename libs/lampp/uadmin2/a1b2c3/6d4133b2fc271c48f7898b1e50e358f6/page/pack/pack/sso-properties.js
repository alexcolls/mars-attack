﻿//构造函数
var ssoPro = {};

ssoPro.message = function(key) {
	var value = js_pro_json[key];
	if (null == value || "" == value) {
		return "";
	}
	if (arguments.length <=  1) {
		return value;
	}
	for ( var i = 1; i < arguments.length; i++) {
		var regex = "\{" + (i - 1) + "\}"
		value = value.replace(regex, arguments[i]);
	}
	return value;

}
