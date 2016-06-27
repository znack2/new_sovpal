<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>{{ trans('mail.reset_title') }}</title>
 </head>
 <body>
     <h1>{{ trans('mail.reset_Hello') }}</h1>
     
     {{ trans('mail.reset_link') }} {{ url('password/reset/'.$token) }}

     {{ trans('mail.Person') }}
     {{ trans('mail.signature') }}
 </body>
 </html> 