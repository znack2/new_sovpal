// email view

	//in header
	Disposition-Notification-To:<xxx.xxx@example.com>

	<img src="http://foobar.com/email/read/{Record Id}" />
	<img src="http://yourdomain.com/received?read=<email of `receiver>">

//in database
user->id
user->read_status->true