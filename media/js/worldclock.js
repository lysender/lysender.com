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
	
	setInterval(function(){
		$("#clock").text(getCurrentDateTime());	
	}, 1000);
});