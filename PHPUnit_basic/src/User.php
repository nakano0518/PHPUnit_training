<?php

/**
 * User
 * 
 * A user of system
 */
 
 class User
 {
     /**
      * First name
      * @var string
      */
      public $first_name;
 
     /**
      * last name
      * @var string
      */
      public $surname;
      
      //ユーザークラスに依存するクラスのプロパティを追加
      /**
       * Email address
       * @var string
       */
       public $email;
      
      //MailerObjectを格納するプロパティの追加
      /**
       * Mailer Object
       * @var Mailer
       */
       protected $mailer;
      
      /**
       * Set the mailer dependency
       * 
       * @param Mailer $mailer The mailer object
       */
       public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer; 
       }
      
      /**
       * Get the user's full name from their first name and surname
       *
       * @return string The user's full name
       */
       public function getFullName()
       {
           return trim("$this->first_name $this->surname");
       }
       
       /**
        * Send the user a message
        * 
        * @param string $message The message
        * 
        * @return boolean True if sent, false othewise
        */
        public function notify($message)
        {
         return $this->mailer->sendMessage($this->email, $message);
        }
 }