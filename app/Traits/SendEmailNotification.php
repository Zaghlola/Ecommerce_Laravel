<?php 
namespace App\Traits;

use App\Notifications\VerifyEmail;
use App\Notifications\ResetPassword;

trait SendEmailNotification{
    public function sendEmailVerificationNotification(){
        return $this->notify(new VerifyEmail);
    }
       /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
