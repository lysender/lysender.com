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
		
		var s = '<option value="">Select region</option>';
		
		for (var i in regions) {
			s += '<option>' + regions[i] + '</option>';
		}
		
		$("#regions").html(s);
	}
	
	function loadTimezones(region) {
		var tz = {};
		
		if (typeof tzlist !== "undefined" && typeof tzlist[region] !== "undefined") {
			for (var k in tzlist[region]) {
				tz[k] = tzlist[region][k];
			}
		}
		
		var s = '';
		
		for (var i in tz) {
			s += '<option value="' + tz[i] + '">' + i + '</option>';
		}
		
		$("#timezone").removeAttr("disabled").html(s);
	}
	
	function tick() {
		var rawms = new Date().getTime();
		var wc = new WorldClock(rawms, 0, "UTC")
		$("#clock").text(wc.currentDay + " " + wc.currentDate + " " + wc.currentTime);

		var wc0 = new WorldClock(rawms, 28800, "Asia/Manila");
		$("#timezone-0").text(wc0.timezone);
		$("#week-day-0").text(wc0.currentDay);
		$("#date-0").text(wc0.currentDate);
		$("#time-0").text(wc0.currentTime);

		var wc1 = new WorldClock(rawms, -14400, "America/New_York");
		$("#timezone-1").text(wc1.timezone);
		$("#week-day-1").text(wc1.currentDay);
		$("#date-1").text(wc1.currentDate);
		$("#time-1").text(wc1.currentTime);

		setTimeout(tick, 1000);
	}
	
	tick();
	loadRegions();
	
	$("#region-select-w").delegate("#regions", "change", function(){
		loadTimezones(this.value);	
	});
});




function WorldClockWidget(parentDiv, name, wc) {
	this.init(parentDiv, name, wc);
}

WorldClockWidget.prototype = {

	/** 
	 * The id of the div this widget should appear
	 *
	 * @type String
	 */
	parentDiv: null,

	/** 
	 * The name of this widget also used as id
	 *
	 * @type String
	 */
	name: null,

	/** 
	 * WorldClock object
	 *
	 * @type WorldClock
	 */
	wc: null,

	/** 
	 * Whether or not the widget is already attached to parentDiv
	 *
	 * @type boolean
	 */
	attached: false,

	/** 
	 * Initialize the widget
	 *
	 * @param String
	 * @param String
	 * @param WorldClock
	 * @return WorldClockWidget
	 */
	init: function(parentDiv, name, wc) {
		this.parentDiv = parentDiv;
		this.name = name;
		this.wc = wc;

		return this;
	},

	/** 
	 * Attach the widget to the parent div and display it
	 *
	 * @return WorldClockWidget
	 */
	attach: function() {
		if (!this.attached) {
			var s = '';

			
		}

		return this;
	},

	/** 
	 * Refreshes the widget with new informat
	 *
	 * @return WorldClockWidget
	 */
	refresh: function() {
		if (this.attached) {
			// foo
		}

		return this;
	}
};


function WorldClock(utcMs, utcOffset, timezone) {
	this.init(utcMs, utcOffset, timezone);
}

/** 
 * WorldClock class
 * 
 * Everything is in UTC and to have a different timezone,
 * simply pad UTC offset
 */
WorldClock.prototype = {

	/** 
	 * @type Date
	 */
	date: null,

	/** 
	 * @type String
	 */
	timezone: null,

	/**
	 * List of weekday labels 
	 *
	 * @type Array
	 */
	weekDays: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],

	/** 
	 * List of months
	 *
	 * @type Array
	 */
	months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],

	/** 
	 * Current week day as string
	 *
	 * @type String
	 */
	currentDay: null,

	/** 
	 * Current date as string
	 *
	 * @type String
	 */
	currentDate: null,

	/** 
	 * Current time as string
	 * 
	 * @type String
	 */
	currentTime: null,

	/** 
	 * Initialize object
	 *
	 * @param int
	 * @param int
	 * @param String
	 * @return WorldClock
	 */
	init: function(utcMs, utcOffset, timezone) {
		this.date = new Date(utcMs + (utcOffset * 1000));
		this.timezone = timezone;

		// Get the day of the week
		this.currentDay = this.weekDays[this.date.getUTCDay()];
		
		// Get the date string
		this.currentDate = this.months[this.date.getUTCMonth()] + " ";
		this.currentDate += (this.date.getUTCDate() < 10 ? "0" + this.date.getUTCDate() : this.date.getUTCDate()) + ", ";
		this.currentDate += this.date.getUTCFullYear();
		
		// Get the time string in millitary format
		this.currentTime = this.date.getUTCHours() + ":";
		this.currentTime += (this.date.getUTCMinutes() < 10 ? "0" + this.date.getUTCMinutes() : this.date.getUTCMinutes()) + ":";
		this.currentTime += (this.date.getUTCSeconds() < 10 ? "0" + this.date.getUTCSeconds() : this.date.getUTCSeconds());
		
		return this;
	}
};