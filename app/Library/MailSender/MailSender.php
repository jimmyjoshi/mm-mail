<?php namespace App\Library\MailSender;

use App\Models\Emailer\Emailer;
use App\Models\MailerLog\MailerLog;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class MailSender
 *
 * @author Anuj Jaha
 */


class MailSender
{
    protected $limit;

    public function __construct($limit = 100)
    {
        $this->limit = $limit;
    }

    public function sendAllEmails()
    {
        $mailer         = new Emailer;
        $mailerLog      = new MailerLog;
        $successEntries = [];

        $mailers = $mailer->with(['subscriber', 'template'])->where(['send_status' => 0 ])->limit($this->limit)->get();

        foreach($mailers as $mailer)
        {
            if($this->sendMail($mailer))
            {
                $mailerLogData[] = [
                    'subscriber_id' => $mailer->subscriber_id,
                    'subject'       => $mailer->template->subject,
                    'body'          => $mailer->template->body,
                ];

                $successEntries[] = $mailer->id;
            }
        }

        if(count($successEntries))
        {
            $mailerLog->insert($mailerLogData);

            if(Emailer::whereIn('id', $successEntries)->update(['send_status' => 1, 'send_at' => date('Y-m-d H:i:s')]))
            {
                return count($successEntries);
            }
        }

        return false;
    }

    /**
     * SendMail
     *
     * @param object $model
     * @return bool
     */
    public function sendMail($model = null)
    {
        if($model)
        {
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'er.anujcygnet@gmail.com';                 // SMTP username
                $mail->Password = 'Cygnet@321';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('er.anujcygnet@gmail.com', 'Admin');
                $mail->addAddress($model->subscriber->email_id, $model->subscriber->name);     // Add a recipient
                $mail->addReplyTo('er.anujcygnet@gmail.com', 'Information');
                /*$mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');*/

                //Attachments
                /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $model->template->subject;
                $mail->Body    = $model->template->body;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                return true;
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                return false;
            }
            /*
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: Admin <admin@admin.com>';

            if($model->subscriber->email_id && $model->template->subject)
            {
                if(mail($model->subscriber->email_id, $model->template->subject, $model->template->body,$headers))
                {
                    return true;
                }
            }*/
        }

        return false;
    }
}