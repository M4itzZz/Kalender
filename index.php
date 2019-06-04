<?php
include 'db_config.php';

$conn = OpenCon();

echo "Connected Successfully";

CloseCon($conn);

?>
<!DOCTYPE html>
<html>
<head>
<!--<script type="text/javascript">location.href = 'login.php';</script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script>
 $(document).ready(function() {
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();


  var calendar = $('#calendar').fullCalendar({
   editable: true,
   header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month, agendaWeek, agendaDay'
   },
   events: "events.php",
   eventRender: function(event, element, view) {
    if (event.allDay === 'true') {
     event.allDay = true;
    } else {
     event.allDay = false;
    }
   },
   selectable: true,
   selectHelper: true,
   select: function(start, end, allDay) {
   var title = prompt('Sisetage sündmus:'); //Saab lisada sündmuse, mis ilmub kalendril


   if (title) {
   var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
   var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
   $.ajax({
	   url: 'add_events.php',
	   data: 'title='+ title+'&start='+ start +'&end='+ end,
	   type: "POST",
	   success: function(json) {
	   alert('Lisatud edukalt!');
	   }
   });
   calendar.fullCalendar('renderEvent',
   {
	   title: title,
	   start: start,
	   end: end,
	   allDay: allDay
   },
   true
   );
   }
   calendar.fullCalendar('unselect');
   },


   editable: true,
   eventDrop: function(event, delta) {
   var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
   var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
   $.ajax({
	   url: 'update_events.php',
	   data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
	   type: "POST",
	   success: function(json) {
	    alert("Uuendatud edukalt!");
	   }
   });
   },
   eventClick: function(event) { //kustutamis funkstioon
	var decision = confirm("Kas te tahate seda ikka teha?"); 
	if (decision) {
	$.ajax({
		type: "POST",
		url: "delete_event.php",
		data: "&id=" + event.id,
		 success: function(json) {
			 $('#calendar').fullCalendar('removeEvents', event.id);
			  alert("Edukalt uuendatud!");}
	});
	}
  	},
   eventResize: function(event) {
	   var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
	   var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
	   $.ajax({
	    url: 'update_events.php',
	    data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
	    type: "POST",
	    success: function(json) {
	     alert("");
	    }
	   });
	}
  });
 });
</script>
<style>
 body {
  margin-top: 40px;
  text-align: center;
  font-size: 16px;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: top left;
  background-size: 400px 400px;
  background-image: url("thk.jpg");
  font-family: Lucida Grande,Arial,Helvetica,Verdana,sans-serif;
  }
 #calendar {
  width: 1050px;
  margin: 0 auto;
  }
  .fc-event {
	position: relative; 
	display: block; 
	font-size: .99em;
	line-height: 1.3;
	border-radius: 3px;
	border: 1px solid #A42339; 
	font-weight: normal;
  }
  .fc-event,
  .fc-event-dot {
	background-color: #A42339; 
}
.fc-event,
.fc-event:hover,
.ui-widget .fc-event {
	color:	#fff;
	style: bold; 
	text-decoration: bold; 
}
.fc-unthemed td.fc-today {
	background: #ff6666;
}
</style>
</head>
<body>
 <h2>Kalender-märkmik</h2>
 <br/>
 <div id='calendar'></div>
</body>
</html>