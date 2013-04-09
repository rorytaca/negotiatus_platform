<?php

//READ SESSION VARIABLES TO DETERMINE STATE OF HEADER LOGIN BAR
    if(isset($_COOKIE['id']) && isset($_COOKIE['negotiatus_remember'])) {
        print'
        <script type="text/javascript">
            set_to_logged_in();
        </script>

        ';
    } else {
        print '
        <script type="text/javascript">
            set_to_logged_out();
        </script>
        ';
    }


?>