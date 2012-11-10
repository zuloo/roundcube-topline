<?php

class topline extends rcube_plugin
{
  
    public function init()
    {
        $this->add_hook('template_object_username', array($this, 'refine_username'));
        $this->add_texts('localization/', false);
    }
    
    public function refine_username($p)
    {
        $rcmail = rcmail::get_instance();
        $user = $rcmail->user;
        $identity = $user->get_identity();
        return array('content' => Q($identity['name'])." (".Q($this->gettext('lastlogin')).Q($user->data['last_login']).")");
    }
}