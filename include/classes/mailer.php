<?php
/**
 * Mailer.php
 *
 * The Mailer class is meant to simplify the task of sending
 * emails to users. Note: this email system will not work
 * if your server is not setup to send mail.
 *
 * If you are running Windows and want a mail server, check
 * out this website to see a list of freeware programs:
 * <http://www.snapfiles.com/freeware/server/fwmailserver.html>
 */

class Mailer
{
    /**
     * sendWelcome - Sends a welcome message to the newly
     * registered master, also supplying the username and
     * password.
     */
    function sendWelcome($user, $email, $pass){
        $from = "From:joseph mwendwa<joseh.john@gmail.com>";
        $subject = "Cyber Site - Welcome!";
        $body = $user.",\n\n"
            ."Welcome! You've just registered at Cyber Site "
            ."with the following information:\n\n"
            ."Username: ".$user."\n"
            ."Password: ".$pass."\n\n"
            ."If you ever lose or forget your password, a new "
            ."password will be generated for you and sent to this "
            ."email address, if you would like to change your "
            ."email address you can do so by going to the "
            ."My Account page after signing in.\n\n"
            ."- Cyber Site";

        return mail($email,$subject,$body,$from);
    }

    /**
     * sendNewPass - Sends the newly generated password
     * to the master's email address that was specified at
     * sign-up.
     */
    function sendNewPass($user, $email, $pass){
        $from = "From:joseph mwendwa<joseh.john@gmail.com>";
        $subject = "Cyber Site - Your new password";
        $body = $user.",\n\n"
            ."We've generated a new password for you at your "
            ."request, you can use this new password with your "
            ."username to log in to Cyber Site.\n\n"
            ."Username: ".$user."\n"
            ."New Password: ".$pass."\n\n"
            ."It is recommended that you change your password "
            ."to something that is easier to remember, which "
            ."can be done by going to the My Account page "
            ."after signing in.\n\n"
            ."- Cyber Site";

        return mail($email,$subject,$body,$from);
    }
};

/* Initialize mailer object */
$mailer = new Mailer;

?>
