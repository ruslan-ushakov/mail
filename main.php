<?php

use Mail\Service\TemplateRendererService;
use Mail\Repository\EmailTemplateRepository;
use Mail\Model\EmailAddress;
use Mail\Model\HtmlEmailMessage;
use Mail\Service\EmailSenderService;

$sendEmailService = new EmailSenderService();
$emailTemplateRepository = new EmailTemplateRepository();
$templateRendererService = new TemplateRendererService();

$emailSubject = 'subject';
$emailTemplate = $emailTemplateRepository->getDefaultHtmlTemplate();
$data = [
    'username' => 'vasya'
];
$emailBody = $templateRendererService->render($emailTemplate, $data);

$emailMessage = new HtmlEmailMessage($emailSubject, $emailBody);
$sender = new EmailAddress('hello@ya.ru', 'My App');
$recipient = new EmailAddress('vasya@ya.ru');

$sendEmailService->send($emailMessage, $recipient, $sender);
