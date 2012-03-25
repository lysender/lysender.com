$(function(){
	
	var wcWidgets = [];

	function loadWcWidgets() {
		var cg = CookieGroupHandler.getCookieInstance('lys10years');
		var widgets = cg.getValue('widgets');
		var rawms = new Date().getTime();
		
		if (widgets && typeof widgets == "object" && widgets.length) {
			for (var i in widgets) {
				if (typeof widgets[i] == "object" && widgets[i] && widgets[i].length == 2) {
					var wc = new WorldClock(rawms, widgets[i][1], widgets[i][0]);
					var wcw = new WorldClockWidget("workdclock-widget-w", "wid-" + i, "span2");
					wcw.attach(wc);

					wcWidgets.push([wcw, widgets[i]]);
				}
			}
		}
	}

	function refreshWcWidgets() {
		var rawms = new Date().getTime();

		for (var i in wcWidgets) {
			var wc = new WorldClock(rawms, wcWidgets[i][1][1], wcWidgets[i][1][0]);
			wcWidgets[i][0].refresh(wc);
		}

		setTimeout(refreshWcWidgets, 1000);
	}

	function addWcWidget(tz, offset) {
		var rawms = new Date().getTime();
		var index = wcWidgets.length;
		var wc = new WorldClock(rawms, offset, tz);
		var wcw = new WorldClockWidget("workdclock-widget-w", "wid-" + index, "span2");
		wcw.attach(wc);

		wcWidgets.push([wcw, [tz, offset]]);
	}

	function deleteWcWidget(index) {
		if (typeof wcWidgets[index] == "object") {
			var widgetId = "worldclock-widget-" + wcWidgets[index][0].name;
			var elem = $("#" + widgetId);

			if (elem.length) {
				elem.remove();
			}

			wcWidgets.splice(index, 1);

			// Delete from cookie
			var cg = CookieGroupHandler.getCookieInstance('lys10years');
			var widgets = cg.getValue('widgets');

			if (widgets && typeof widgets[index] !== "undefined") {
				widgets.splice(index, 1);
			}

			cg.setValue('widgets', widgets);
	        cg.writeGroup();
		}
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

			$("#add-tz").removeAttr("disabled");
		} else {
			$("#add-tz").attr("disabled", "disabled");
		}
		
		var s = '';
		
		for (var i in tz) {
			s += '<option value="' + tz[i] + '">' + i + '</option>';
		}
		
		$("#timezone").removeAttr("disabled").html(s);
	}
	
	function resetAddWidgetForm() {
		$("#regions").find("option:selected").removeAttr("selected");
		$("#timezone").html('').attr("disabled", "disabled");
		$("#add-tz").attr("disabled", "disabled");
	}

	loadRegions();
	loadWcWidgets();
	setTimeout(refreshWcWidgets, 1000);

	$("#add-tz").click(function(){
		var cg = CookieGroupHandler.getCookieInstance('lys10years');
		var widgets = cg.getValue('widgets');
		var wconfig = [];
		var tz = $("#timezone");

		if (tz.length && tz.val()) {
			wconfig = [tz.find(":selected").text(), tz.val()];
		}

		if (widgets) {
			widgets.push(wconfig);
		} else {
			widgets = [wconfig];
		}

		cg.setValue('widgets', widgets);
        cg.writeGroup();

        // Add widget now
        addWcWidget(wconfig[0], wconfig[1]);

        // Reset dropdowns
        resetAddWidgetForm();
	});

	$("#region-select-w").delegate("#regions", "change", function(){
		loadTimezones(this.value);	
	});

	$("#workdclock-widget-w").delegate("..worldclock-widget .close", "click", function(){
		var id = this.id + "";
		var index = parseInt(id.split("-").pop());
		
		if (!isNaN(index)) {
			deleteWcWidget(index);
		}
	});
});


function WorldClockWidget(parentDiv, name, className) {
	this.init(parentDiv, name, className);
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
	 * The html class to be used by this widget
	 *
	 * @type String
	 */
	className: null,	

	/** 
	 * Whether or not the widget is already attached to parentDiv
	 *
	 * @type boolean
	 */
	attached: false,

	/** 
	 * jQuery widget element
	 *
	 */
	widget: null,

	/** 
	 * Initialize the widget
	 *
	 * @param String
	 * @param String
	 * @param WorldClock
	 * @return WorldClockWidget
	 */
	init: function(parentDiv, name, className) {
		this.parentDiv = parentDiv;
		this.name = name;
		this.className = className;

		return this;
	},

	/** 
	 * Attach the widget to the parent div and display it
	 * 
	 * @param WorldClock
	 * @return WorldClockWidget
	 */
	attach: function(wc) {
		if (!this.attached) {
			var s = '';
			var cls = "worldclock-widget";
			if (this.className) {
				cls += " " + this.className;
			}

			// Generate the html content for the widget
			s += '<div id="worldclock-widget-' + this.name + '" class="' + cls + '">';
			s += '<a class="close" id="delete-' + this.name + '" href="javascript:void(0);">&times;</a>';
			s += '<p class="wc-timezone">' + this.formatTimezoneLabel(wc.timezone) + '</p>';
			s += '<p class="wc-week-day">' + wc.currentDay + '</p>';
			s += '<p class="wc-date">' + wc.currentDate + '</p>';
			s += '<p class="wc-time">' + wc.currentTime + '</p>';
			s += '</div>';

			$("#" + this.parentDiv).append(s);
			var element = $("#worldclock-widget-" + this.name);

			if (element.length) {
				this.attached = true;
				this.widget = element;
			}
		}

		return this;
	},

	formatTimezoneLabel: function(tz) {
		var i = tz.indexOf('/');
		var ret = tz;

		if (i > 0) {
			ret = tz.substring(i+1, tz.length);
		}

		return ret.replace('_', ' ');
	},

	/** 
	 * Refreshes the widget with new informat
	 *
	 * @param WorldClock
	 * @return WorldClockWidget
	 */
	refresh: function(wc) {
		if (this.attached && this.widget) {
			if (this.widget.length) {
				this.widget.find('.wc-week-day').text(wc.currentDay);
				this.widget.find('.wc-date').text(wc.currentDate);
				this.widget.find('.wc-time').text(wc.currentTime);
			}
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