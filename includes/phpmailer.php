<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendContactEmail(array $data): array
{
    $recipientEmail = 'eduguillemmoreno@gmail.com';
    $subject = 'Nuevo mensaje web: ' . ($data['subject'] ?? 'Sin asunto');
    $body = "Nuevo mensaje recibido desde la web.\n\n";
    $body .= "Asunto: {$data['subject']}\n";
    $body .= "Nombre: {$data['name']}\n";
    $body .= "Teléfono: {$data['phone']}\n";
    $body .= "Email: {$data['email']}\n";
    $body .= "Día: {$data['class_date']}\n";
    $body .= "Hora: {$data['class_time']}\n";

    if (class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'eduguillemmoreno@gmail.com';
            $mail->Password = '4599.Edu.4599';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('eduguillemmoreno@gmail.com', 'Web Movent');
            $mail->addAddress($recipientEmail);
            $mail->addReplyTo($data['email'], $data['name']);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = $body;

            $mail->send();

            return ['success' => true, 'message' => 'Tu mensaje se ha enviado correctamente. Te responderemos pronto.'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'No se ha podido enviar el correo con PHPMailer.'];
        }
    }

    $headers = [];
    $headers[] = 'From: ' . $recipientEmail;
    $headers[] = 'Reply-To: ' . ($data['email'] ?? $recipientEmail);
    $headers[] = 'Content-Type: text/plain; charset=UTF-8';

    $mailSent = @mail($recipientEmail, $subject, $body, implode("\r\n", $headers));

    if ($mailSent) {
        return ['success' => true, 'message' => 'Tu mensaje se ha enviado correctamente. Te responderemos pronto.'];
    }

    return ['success' => false, 'message' => 'No se ha podido enviar el mensaje. Inténtalo de nuevo.'];
}
