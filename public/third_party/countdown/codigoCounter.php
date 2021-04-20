<?php  
   require_once('control/class/conexion.php');
   require_once('control/class/class.php');
   error_reporting(0); 
   $row = mysql_fetch_array(mysql_query("SELECT * FROM ld_serie ORDER BY id DESC",$con));

    date_default_timezone_set('America/New_York');
    $service1 = date('Y-m-d 08:55', strtotime("next sunday"));
    
    if ((date("N") == 7)) {
         if (date("H:i") <= '08:55') {
             $service1 =  date('Y-m-d 08:55', strtotime("sunday"));
         }
     }

    if ((date('Y-m-d H:i') < $service1) && (date("N") <= 7)) {
        $serviceTime = $service1;
    }

    if( (date("H:i") >= '08:55' && date("H:i") <= '14:45') && date("N") == 7 ) {
      echo '<style>.liveOut{display:none !important}.liveIn{display:block !important}</style>';   
    }



?>

<script>
            var time = moment.tz("<?=$serviceTime ?>", "America/New_York").utcOffset('-0700');
            $('#servicetime').countdown(time.toDate()).on('update.countdown', function(event) {
                var $this = $(this).html(event.strftime(''
                 + '<span class="white">WATCH LIVE IN:</span> <span style="font-weight:200:opacity:1"> <b>%-D</b> Days, <b>%H</b> Hours, <b>%M</b> Minutes, <b>%S</b> Seconds</span>'));
            });
            $('#servicetime').countdown(time.toDate()).on('finish.countdown', function(event) {
                $(".liveOut").fadeOut(200);
                setTimeout(function() {
                    $(".liveIn").fadeIn();
                },210);
            });
        </script>