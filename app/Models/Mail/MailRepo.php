    $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
    $beautymail->send('emails.welcome', [], function($message)
    {
        $message
            ->from('bar@example.com')
            ->to('foo@example.com', 'John Smith')
            ->subject('Welcome!');
    });


======

    Mail::raw($e, function ($message) {
             $message->subject(config('root.report.exceptions_subject'));
             $message->from(config('root.report.from_address'), config('root.appname'));
             $message->to(config('root.report.to_mail'));
         });


=====

public function makeMail($msg, $link, $userId, $img){
    $notify = new Mails;
    $notify->messages = $msg;
    $notify->link = $link;
    $notify->status = 0;
    $notify->user_id = $userId;
    $notify->image = $img;
    if($notify->save()){
        return $notify->id;
    }
    return false;
}

public function getAllMails(){
    $allMails = Mails::get();
    return $allMails;
}

public function getMail($id){
    return Mails::findOrFail($id);
}

public static function batchNotify($type, User $fromUser, $users, Topic $topic, Reply $reply = null, $content = null)
{
    $nowTimestamp = Carbon::now()->toDateTimeString();
    $data = [];

    foreach ($users as $toUser) {
        if ($fromUser->id == $toUser->id) {
            continue;
        }

        $data[] = [
            'from_user_id' => $fromUser->id,
            'user_id'      => $toUser->id,
            'topic_id'     => $topic->id,
            'reply_id'     => $content ?: $reply->id,
            'body'         => $content ?: $reply->body,
            'type'         => $type,
            'created_at'   => $nowTimestamp,
            'updated_at'   => $nowTimestamp
        ];

        $toUser->increment('notification_count', 1);
    }

    if (count($data)) {
        Notification::insert($data);
    }
}

public static function notify($type, User $fromUser, User $toUser, Topic $topic, Reply $reply = null)
{
    if ($fromUser->id == $toUser->id) {
        return;
    }

    if (Notification::isNotified($fromUser->id, $toUser->id, $topic->id, $type)) {
        return;
    }

    $nowTimestamp = Carbon::now()->toDateTimeString();


    $data[] = [
        'from_user_id' => $fromUser->id,
        'user_id'      => $toUser->id,
        'topic_id'     => $topic->id,
        'reply_id'     => $reply ? $reply->id : 0,
        'body'         => $reply ? $reply->body : '',
        'type'         => $type,
        'created_at'   => $nowTimestamp,
        'updated_at'   => $nowTimestamp
    ];

    $toUser->increment('notification_count', 1);

    Notification::insert($data);
}

public static function isNotified($from_user_id, $user_id, $topic_id, $type)
{
    $notifys = Notification::fromwhom($from_user_id)
                    ->toWhom($user_id)
                    ->atTopic($topic_id)
                    ->withType($type)->get();
    return $notifys->count();
}

public function scopeRecent($query)
{
    return $query->orderBy('created_at', 'desc');
}

public function scopeFromWhom($query, $from_user_id)
{
    return $query->where('from_user_id', $from_user_id);
}

public function scopeToWhom($query, $user_id)
{
    return $query->where('user_id', $user_id);
}

public function scopeWithType($query, $type)
{
    return $query->where('type', $type);
}

public function scopeAtTopic($query, $topic_id)
{
    return $query->where('topic_id', $topic_id);
}