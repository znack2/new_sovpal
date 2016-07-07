<?php namespace App\Services\Flash;

use App\Services\SessionStore;

class FlashService
{
    private $session;
    private $flash;

    public function __construct(SessionStore $session)
      {
          $this->session = $session;
      }

    public function flash($message, $type = 'info', $title = 'Message', $image = null, $url = null)
      {
        $message = !is_array($message) ? $message->all() : $message;

        $this->session->flash('flash.overlay', $type == 'overlay' ? true : false);
        $this->session->flash('flash.message', [$message]);
        $this->session->flash('flash.type', $type);
        $this->session->flash('flash.title', $title);
        $this->session->flash('flash.image', $image);
        $this->session->flash('flash.url', $url);
        return $this;
      }
}
