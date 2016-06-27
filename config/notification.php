<?php

return array(

    'session_key'                           => 'notifications',

    'default_container'                     => 'default',

    'default_types'                         => ['info', 'success', 'warning', 'error'],

    'types'                                 => [],

    'default_format'                        => '<div class="alert alert-:type">:message</div>',

    'format'                                => [],

    'default_formats'                       => [
        'info'                  => '<div class="alert alert-info">:message</div>',
        'success'               => '<div class="alert alert-success">:message</div>',
        'warning'               => '<div class="alert alert-warning">:message</div>',
        'error'                 => '<div class="alert alert-danger">:message</div>',
    ],

    'formats'                       => [],
);
