<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// Carrega .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Recupera e sanitiza dados do formulário
$name    = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
$email   = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
$subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS));
$content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));

// Validação de campos
if (!$name || !$email || !$subject || !$content) {
    header('Location: ../index.php?status=campos_vazios');
    exit;
}

// Monta o corpo da mensagem
$body  = "Nome: $name\nE-mail: $email\nAssunto: $subject\n\nMensagem:\n$content\n";

$mail = new PHPMailer(true);
// força UTF-8 em headers e corpo
$mail->CharSet  = 'UTF-8';
$mail->Encoding = 'base64';

try {
    // Configurações SMTP vindo do .env
    $mail->isSMTP();
    $mail->Host       = $_ENV['MAIL_HOST'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['MAIL_USERNAME'];
    $mail->Password   = $_ENV['MAIL_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = (int) $_ENV['MAIL_PORT'];

    // Remetente e Reply-To
    $mail->setFrom($_ENV['MAIL_USERNAME'], 'Techlog Serviços');
    $mail->addReplyTo($email, $name);
    // Destinatário
    $mail->addAddress($_ENV['MAIL_USERNAME'], 'Techlog');

    // HTML e assunto
    $mail->isHTML(true);
    $mail->Subject = "[Contato Comercial Techlog] - Assunto: $subject";

    // Corpo HTML
    $mail->Body = '
<div style="font-family:Arial,sans-serif;color:#333;margin:0;padding:0;">
  <div style="background:#f97316;padding:20px;border-radius:8px 8px 0 0;text-align:center;">
    <img src="https://www.techlog.com.br/assets/images/logo-techlog-white.png" 
         alt="Techlog" style="height:50px;">
  </div>
  <div style="padding:20px;">
    <h2 style="color:#f97316;margin-top:0;">Nova mensagem de contato</h2>
    <p><strong>Nome:</strong> ' . htmlspecialchars($name) . '</p>
    <p><strong>E-mail:</strong> ' . htmlspecialchars($email) . '</p>
    <p><strong>Assunto:</strong> ' . htmlspecialchars($subject) . '</p>
    <hr style="border:none;border-top:1px solid #eee;margin:20px 0;">
    <p>' . nl2br(htmlspecialchars($content)) . '</p>
  </div>
  <div style="background:#f3f4f6;padding:10px;text-align:center;font-size:12px;color:#666;border-radius:0 0 8px 8px;">
    Este e-mail foi enviado automaticamente pelo site Techlog Serviços.
  </div>
</div>
';

    // Texto alternativo
    $mail->AltBody = $body;

    $mail->send();
    header('Location: ../index.php?status=sucesso');
} catch (Exception $e) {
    header('Location: ../index.php?status=erro');
}
exit;
