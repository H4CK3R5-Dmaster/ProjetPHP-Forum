<?php
    $hello = "hello";
    $psw = password_hash($$hello, PASSWORD_DEFAULT);

    print "\n$psw\n\n";

    if(password_verify($hello, $psw)){
        print"OK\n\n";
    } else {
        print"WRONG\n\n";
    }

?>