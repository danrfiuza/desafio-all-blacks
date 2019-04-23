<?php
return [
    "driver" => "smtp",
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "from@example.com",
        "name" => "Example"
    ),
    "username" => "402a7824f93dc2",
    "password" => "1834fe1da2cee0",
    "sendmail" => "/usr/sbin/sendmail -bs"
];
