<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>{{ trans('mail.welcome_title',['name'=>$user->first_name]) }}</title>
 </head>
 <body>
     <h1>{{ trans('mail.welcome_Hello') }}</h1>
 
     <p>{{ trans('mail.welcome_message') }}</p>
     
     {{ trans('mail.welcome_require') }} 
     <a href='{{ url("register/confirm/{$user->token}") }}'>
     {{ trans('mail.welcome_link') }}</a> 

     <img src="{{ $message->embed(storage_path('embed.jpg')) }}">

     {{ trans('mail.Person') }}
     {{ trans('mail.signature') }}
 </body>
 </html> 