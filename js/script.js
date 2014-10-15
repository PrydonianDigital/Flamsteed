jQuery(document).ready(function(jQuery) {
	jQuery.cookieCuttr({
		cookieAnalytics: true,
		cookieAnalyticsMessage: "We use cookies just to track visits to our website, we store no personal details.",
		cookieWhatAreTheyLink: 'http://flamsteed.info/cookies/' 
	});
	var method = 'flickr.groups.pools.getPhotos',
		api_key = '8e7003431bd8360e8328c9fb6ad04807',
		group_id = '1843807@N21',
		tags = '',
		bgPhotos = 'flickr.groups.pools.getPhotos',
		bggroup_id = '1988790@N21';	
	jQuery.getJSON('http://api.flickr.com/services/rest/?method=' + bgPhotos + '&api_key=' + api_key + '&group_id=' + bggroup_id + '&per_page=500&format=json&jsoncallback=?', function(data){
		shuffle(data.photos.photo);
		var bodyBg = '';
		jQuery.each(data.photos.photo, function(i,photo){
		if (jQuery(window).width() < 769) {
			bodyBg += 'http://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_' + 'c.jpg';
		} else {
			bodyBg += 'http://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_' + 'b.jpg';
		}
			if ( i == 0 ) return false;
		});
		jQuery('body').attr('style', 'background: #000 url('+bodyBg+') no-repeat center center; background-size:cover; background-attachment: fixed;');
	});	
	jQuery.getJSON('http://api.flickr.com/services/rest/?method=' + method + '&api_key=' + api_key + '&group_id=' + group_id + '&per_page=500&format=json&jsoncallback=?', function(data){
		shuffle(data.photos.photo);
		var flickrHome = '<div class="row"><div class="padding"><div class="col-md-12">';
		jQuery.each(data.photos.photo, function(i,photo){
			flickrHome += '<div class="row"><div class="col-md-4"><a href="http://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_' + 'b.jpg" target="_blank"><img src="http://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_' + 'm.jpg" title="' + photo.title + ' by ' + photo.ownername + '"></a></div><div class="col-md-8"><h4 class="media-heading"><a href="http://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_' + 'b.jpg" target="_blank">' + photo.title + '</a></h4>' + photo.ownername + '</div></div>';
			if ( i == 14 ) return false;
		});
		flickrHome += '</div></div></div>'	
		jQuery('#flickrHome').html(flickrHome);
	});
	jQuery.getJSON('http://api.flickr.com/services/rest/?method=' + method + '&api_key=' + api_key + '&group_id=' + group_id + '&per_page=500&format=json&jsoncallback=?', function(data){
		shuffle(data.photos.photo);
		var flickr = '<div class="row"><div class="padding"><div class="col-md-12">';
		jQuery.each(data.photos.photo, function(i,photo){
			flickr += '<div class="row"><div class="col-md-4"><a href="http://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_' + 'b.jpg" target="_blank"><img src="http://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_' + 'm.jpg" title="' + photo.title + ' by ' + photo.ownername + '"></a></div><div class="col-md-8"><h4 class="media-heading"><a href="http://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_' + 'b.jpg" target="_blank">' + photo.title + '</a></h4>' + photo.ownername + '</div></div>';
		});
		flickr += '</div></div></div>';
		jQuery('#flickrGallery').html(flickr);
	});	
	jQuery('iframe').sixteenbynine();
	hometwitterFeed();
});
function hometwitterFeed() {
	jQuery.getJSON('/wp-content/themes/FAS/entities.php', function(data) {
		var tWall = '';
		jQuery.each(data, function (i, item) {
			tWall += '<div class="row">';
			tWall += '<div class="col-md-12"><div class="padding less"><hr/></div></div>';
			tWall += '<div class="col-xs-12 col-sm-12 col-md-2"><div class="padding">';
			tWall += '<img src="' + item.user.profile_image_url + '" class="twAvatar">';
			tWall += '</div></div>';
			tWall += '<div class="col-xs-12 col-sm-12 col-md-10"><div class="padding"><p>'+modText(item.text)+'</p><div class="twDate"><a href="https://twitter.com/Flamsteed/status/'+item.id_str+'" target="_blank">' + TwitterDateConverter(item.created_at) + '</a></div></div>';
			tWall += '</div></div>';
			if ( i == 9 ) return false;
		});
		jQuery('#twitterHome').html(tWall);
	});
}
function shuffle(sourceArray) {
	for (var n = 0; n < sourceArray.length - 1; n++) {
		var k = n + Math.floor(Math.random() * (sourceArray.length - n));
		var temp = sourceArray[k];
		sourceArray[k] = sourceArray[n];
		sourceArray[n] = temp;
	}
}
function exists(data){
	if(!data || data==null || data=='undefined' || typeof(data)=='undefined') return false;
	else return true;
}		
function modText(text){
	return nl2br(autoLink(escapeTags(text)));
}
function escapeTags(str){
	return str.replace(/</g,'&lt;').replace(/>/g,'&gt;');
}
function nl2br(str){
	return str.replace(/(\r\n)|(\n\r)|\r|\n/g,"<br>");
}
function autoLink(str){
    return str.replace(/((http|https|ftp|www):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g, '<a href="jQuery1" target="_blank">jQuery1</a>');
}
function showLoader(status){
	if (status)
		document.getElementById('loader').style.display = 'block';
	else
		document.getElementById('loader').style.display = 'none';
}
function relativeTime(time){
    var period = new Date(time);
    var delta = new Date() - period;

    if (delta <= 10000) {	// Less than 10 seconds ago
    	return 'Just now';
    }
    var units = null;
    var conversions = {
    	millisecond: 1,		// ms -> ms
    	second: 1000,		// ms -> sec
    	minute: 60,			// sec -> min
    	hour: 60,			// min -> hour
    	day: 24,			// hour -> day
    	month: 30,			// day -> month (roughly)
    	year: 12			// month -> year
    }; 
    for (var key in conversions) {
    	if (delta < conversions[key]) {
    		break;
    	}
    	else {
    		units = key;
    		delta = delta / conversions[key];
    	}
    }
    delta = Math.floor(delta);
    if (delta !== 1) { units += 's'; }
    return [delta, units, "ago"].join(' ');
    
}
function parseISO8601(str) {
	var parts = str.split('T'),
	dateParts = parts[0].split('-'),
	timeParts = parts[1].split('Z'),
	timeSubParts = timeParts[0].split(':'),
	timeSecParts = timeSubParts[2].split('.'),
	timeHours = Number(timeSubParts[0]),
	_date = new Date;
	_date.setUTCFullYear(Number(dateParts[0]));
	_date.setUTCMonth(Number(dateParts[1])-1);
	_date.setUTCDate(Number(dateParts[2]));
	_date.setUTCHours(Number(timeHours));
	_date.setUTCMinutes(Number(timeSubParts[1]));
	return _date;
}
function TwitterDateConverter(time){
	var date = new Date(time),
		diff = (((new Date()).getTime() - date.getTime()) / 1000),
		day_diff = Math.floor(diff / 86400);
 
	if ( isNaN(day_diff) || day_diff < 0 || day_diff >= 31 )
		return;
	return day_diff == 0 && (
		diff < 60 && "just now" ||
		diff < 120 && "1 minute ago" ||
		diff < 3600 && Math.floor( diff / 60 ) + " minutes ago" ||
		diff < 7200 && "1 hour ago" ||
		diff < 86400 && Math.floor( diff / 3600 ) + " hours ago") ||
		day_diff == 1 && "Yesterday" ||
		day_diff < 7 && day_diff + " days ago" ||
		day_diff < 31 && Math.ceil( day_diff / 7 ) + " weeks ago";
}
(function(jQuery){
        jQuery.fn.sixteenbynine=function(){
                var width=this.width();
                this.height(width*9/16);
        };
})(jQuery);