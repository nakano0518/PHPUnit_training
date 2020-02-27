<?php

/**
 * Mailer
 * 
 * Send messages
 */
 
 class Mailer
 {
     /**
      * Send a message
      * 
      * @param string email The email address
      * @param string $message The message
      * 
      * @return boolean True if sent, false otherwise
      */
      
      public function sendMessage($email, $message) 
      {
          //Use mail() or PHPMailer for example
          sleep(3);//mail送信に時間がかかる想定で3秒遅延をさせる
          
          echo "send '$message' to '$email'";//メッセージの取得
          
          return true;//trueを返却
      }
      
 }