<?php

class Mail extends \Eloquent
{
    protected $fillable = [
        'from_user_id',
        'user_id',
        'topic_id',
        'reply_id',
        'body',
        'type'
    ];

    public function user() {return $this->belongsTo('User'); }

    public function topic() {return $this->belongsTo('Topic'); }

    public function fromUser() {return $this->belongsTo('User', 'from_user_id'); }
}
