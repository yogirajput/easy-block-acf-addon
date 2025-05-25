jQuery(document).ready(function () {
    function makeTimer() {
  
      var timerDate = jQuery( "#timer" ).attr("date");
      var timeZone = jQuery( "#timer" ).attr("timezone");
      var endTime = new Date(timerDate+" "+timeZone);			
      endTime = (Date.parse(endTime) / 1000);
  
      var now = new Date();
      now = (Date.parse(now) / 1000);
  
      var timeLeft = endTime - now;
  
      var days = Math.floor(timeLeft / 86400); 
      var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
      var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
      var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  
      if (hours < "10") { hours = "0" + hours; }
      if (minutes < "10") { minutes = "0" + minutes; }
      if (seconds < "10") { seconds = "0" + seconds; }
  
      if(days < 0){ days = 0; hours = 0; minutes = 0; seconds = 0; }
  
      if ( jQuery( "#days" ).length ) { jQuery("#days").html(days + "<span>Days</span>"); } 
      if ( jQuery( "#days" ).length ) { jQuery("#hours").html(hours + "<span>Hours</span>"); } 
      if ( jQuery( "#days" ).length ) { jQuery("#minutes").html(minutes + "<span>Minutes</span>"); } 
      if ( jQuery( "#days" ).length ) { jQuery("#seconds").html(seconds + "<span>Seconds</span>"); } 
  
      }
  
    if ( jQuery( "#timer" ).length ) {
        setInterval(function() { makeTimer(); }, 1000);
    }
});