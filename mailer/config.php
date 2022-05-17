<?php
require_once 'vendor/autoload.php';
require_once 'class-db.php';
  
define('GOOGLE_CLIENT_ID', '1052305526235-5s616fds5nuqod2lls968gv1o1506pql.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
  
$config = [
    'callback' => 'http://localhost/gmail/mailer/callback.php',
    'keys'     => [
                    'id' => GOOGLE_CLIENT_ID,
                    'secret' => GOOGLE_CLIENT_SECRET
                ],
    'scope'    => 'https://mail.google.com',
    'authorize_url_parameters' => [
            'approval_prompt' => 'force', // to pass only when you need to acquire a new refresh token.
            'access_type' => 'offline'
    ]
];
  
$adapter = new Hybridauth\Provider\Google( $config );
