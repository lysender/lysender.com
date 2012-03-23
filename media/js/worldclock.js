$(function(){
	
	/**
	 * List of week days
	 *
	 * @type Array
	 */
	var weekDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
	
	/**
	 * Returns the current time as string
	 *
	 * @returns string
	 */
	function getCurrentDateTime() {
		var today = new Date();
		var dString = "";
		
		// Get the day of the week
		dString += weekDays[today.getDay()];
		
		// Get the date string
		dString += ", " + today.getFullYear() + "-" + today.getMonth() + "-" + today.getDate();
		
		// Get the time string in millitary format
		dString += " " + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		
		return dString;
	}
	
	function loadRegions() {
		var regions = [];
		
		if (typeof tzlist !== "undefined") {
			for (var k in tzlist) {
				regions.push(k);
			}
		}
		
		var s = '<option>Select region</option>';
		
		for (var i in regions) {
			s += '<option>' + regions[i] + '</option>';
		}
		
		$("#regions").html(s);
	}
	
	function loadTimezones(region) {
		var tz = [];
		
		if (typeof tzlist !== "undefined" && typeof tzlist[region] !== "undefined") {
			for (var k in tzlist[region]) {
				tz.push(k);
			}
		}
		
		var s = '';
		
		for (var i in tz) {
			s += '<option>' + tz[i] + '</option>';
		}
		
		$("#timezone").removeAttr("disabled").html(s);
	}
	
	setInterval(function(){
		$("#clock").text(getCurrentDateTime());	
	}, 1000);
	
	loadRegions();
	
	$("#region-select-w").delegate("#regions", "change", function(){
		loadTimezones(this.value);	
	});
});