<div class="page-container">
   <!-- Content Wrapper START -->
   <?php //echo'<pre>';print_r($sdata[0]);die;
      $vid=$this->input->get('vid', TRUE);
      
      $notes_id = $this->uri->segment(3);
      
      ?>
   <div class="main-content">
        <div class="card">
            <div class="card-body">
            <style type="text/css">
  .fc-sun { color:red;  }
  .fc-ltr .fc-dayGrid-view .fc-day-top .fc-day-number {
    float: none;
  }
  .fc-day-top { text-align: center!important; }
</style>
<section class="showcase">
  <div class="container">
    <div class="pb-2 mt-4 mb-2 border-bottom">
      <h2>Integrate FullCalendar in Codeigniter and jQuery</h2>
    </div>
    <div class="row">       
      <div class="col-md-12 gedf-main">
        <span id="loading">Loading...</span>
        <span id="load-calendar"></span>
      </div>       
    </div>
  </div>
</section>


<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('load-calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
    // load plugins
    plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'googleCalendar', 'momentTimezonePlugin', 'momentPlugin'],  
    firstDay: 1,
    locale: 'en',  
    timeZone: 'local',  
    editable: true,
    selectable: true,
    selectHelper: true,
    displayEventTime: true, // don't show the time column in list view
    buttonIcons: true, // show the prev/next text
    weekNumbers: false,
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    // calendar header
    header: {
      left: 'prevYear, prev,next, nextYear, today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    // change button text
    buttonText: {
      today: "Today",  
      month: "Month",
      week: "Week",
      day : "Day",
      listMonth: 'List'
    },
   



      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      googleCalendarApiKey: 'AIzaSyCn2Ko4rxGsf4PudP-NWAVRdvpQdnJf6DU',
      // US Holidays
      eventSources: [
          {
              url: "en.indian#holiday@group.v.calendar.google.com",
              dataType : 'jsonp',
              className: 'feed_one'
          },
          {
              url: "<?php echo base_url();?>event/loadEventData",
              dataType : 'jsonp',
              className: 'feed_two',  
            }
      ],
      
      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      },

    
    eventClick: function(event) {
      if (event.url) {
          return false;
      }
      },
      
  
    
    // display event
    /*eventRender: function( event, element, view ) {
      element.addClass(event.class);
      element.find('.fc-title').each(function () {
        jQuery(this).insertBefore(jQuery(this).prev('.fc-time'));
      });
      var title = element.find('.fc-title, .fc-list-item-title');           
      title.html(title.text()+'&nbsp;');

    },*/

    // render event data
    select: function (startTime, endTime, allDay) {
      var start = startTime.format();
      var end = endTime.format();
      var completeDate = startTime.format(); 
      alert(completeDate);
      jQuery(".modal-body #current-date-task").val(completeDate);
      jQuery(".modal-body #create-task-date").html(completeDate);     
      jQuery('#addEvent').modal('show');
      jQuery.ajax({
        url: url + 'clients/renderDateWiseData',
        type: 'post',
        data: {hearingDate: start, endTime: end},
        dataType: 'html',
        beforeSend: function () {
          jQuery('#render-current-date-time').html('');
          $('#render-datewise-data').html('<div class="text-center mrgA padA"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
        },
        success: function (html) {
          jQuery('#render-current-date-time').html('( <i class="fa fa-calendar"> </i> ' + completeDate + ' )');
          jQuery("div#render-datewise-data").html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
      calendar.fullCalendar('unselect'); 
    },
    
    // Allow disallow events
    eventAllow: function(dropLocation, draggedEvent) {
      if (draggedEvent.type === 'event' || draggedEvent.type === 'need_lawyer') {
        return false;
      }
      else {
        return true;
      }
    },

    // change date and update
    eventDrop: function(event, delta, revertFunc) {
      if(event.start){
        var startDate = event.start.format();
      } else {
        startDate = '';
      }
      if(event.end){
        var endDate = event.end.format();
      } else {
        var endDate = '';
      }
      jQuery.ajax({
        url: url+'tlc/updateTLCEvent',
        type: 'post',
        data: {tlc_id: event.id, tlc_type: event.type, startDate: startDate, endDate: endDate},
        dataType: 'json',        
        complete: function () {            
          setTimeout(function () {
            jQuery('span#tlc-message').html("");
          }, 5000);
        },
        success: function (json) {
          jQuery("span#tlc-message").html('Updated Successfully');
        },
        error: function (xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
      if (!confirm("Are you sure about this change?")) {
        revertFunc();
      }

    },

    // click event action
    /*eventClick: function(event) {
      var decision = confirm("Do you really want to do that?"); 
      if (decision) {
        $.ajax({
          type: "POST",
          url: "delete_event.php",
          data: "&id=" + event.id,
          success: function(json) {
            $('#case-manager-calendar').fullCalendar('removeEvents', event.id);
          alert("Updated Successfully");}
        });
      }
    },*/

    // event resize
    eventResize: function(event) {
      if(event.start.format()){
        var startDate = event.start.format();
      } else {
        startDate = '';
      }
      if(event.end.format()){
        var endDate = event.end.format();
      } else {
        var endDate = '';
      }

      jQuery.ajax({
        url: url+'tlc/updateTLCEvent',
        type: 'post',
        data: {tlc_id: event.id, tlc_type: event.type, startDate: startDate, endDate: endDate},
        dataType: 'json',        
        complete: function () {            
          setTimeout(function () {
            jQuery('span#tlc-message').html("");
          }, 5000);
        },
        success: function (json) {
          jQuery("span#tlc-message").html('Updated Successfully');
        },
        error: function (xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });      
    },
    eventMouseover: function(calEvent, jsEvent) {
    var tooltip = '<div class="tooltipevent" style="width:auto;padding:7px;background:#fea235;border-radius:4px;font-size:12px;font-weight:700;color:#FFFFFF;position:absolute;z-index:10001;">'+ calEvent.title +'</div>';
    var $tooltip = $(tooltip).appendTo('body');
    $(this).mouseover(function(e) {
        $(this).css('z-index', 10000);
        $tooltip.fadeIn('500');
        $tooltip.fadeTo('10', 1.9);
    }).mousemove(function(e) {
        $tooltip.css('top', e.pageY + 10);
        $tooltip.css('left', e.pageX + 20);
    });
},
eventMouseout: function(calEvent, jsEvent) {
    $(this).css('z-index', 8);
    $('.tooltipevent').remove();
  }

    });

    calendar.render();
  });

</script>
            </div>
        </div>
    </div>
</div>