<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "cards";

switch ($action) {
      case "load":
            load();
            break;
      case "view":
            view();
            break;
      case "add":
            add();
            break;
      case "addPost":
            addPost();
            break;
      case "edit";
            edit();
            break;
      case "updatePost":
            updatePost();
            break;
      case "doDelete":
            doDelete();
            break;
	  case "sortTable":
            sortTable();
            break;
}

function load() {

      // create table if not exsists
      require_once(dirname(__FILE__) . '/helper.php');
      $cards = new Mod_Cards();
      $cards->createTable();

      $views = new Default_Views();
      $views->setModule('cards');

      //load default view
      if (!Sessions::isAdminLogged()) {
            $views->setModule('users');
            $views->load('admin/login', '', true);
      } else {
            $views->load('admin/home', '', true);
      }
}

function view() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('cards');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('cards');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $cards = new Mod_Cards();

      $cards->setValues($_POST);
	  $cards->setSortOrder($cards->nextOrderValue());
      $cards->setCreatedBy(Sessions::getAdminId());
      $cards->setCreatedDate(time());

      if ($cards->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_cards", "add", "New Card has been added successfully");

            Default_Common::jsonSuccess("New Card has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('cards');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $cards = new Mod_Cards();

      $cards->setValues($_POST);

      $cards->setModifiedBy(Sessions::getAdminId());
      $cards->setModifiedDate(time());

      if ($cards->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_cards", "edit", "Card Details has been Updated successfully.");

            Default_Common::jsonSuccess("Card Details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $cards = new Mod_Cards();

      $cards->setId($_POST['id']);

      if ($cards->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_cards", "delete", "Card Deleted successfully.");

            Default_Common::jsonSuccess("Card Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {

            $cards = new Mod_Cards();
            $cards->setSortOrder($position);
            $cards->setId($item);
            $cards->updateSortOrder();
      }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["start_date_location"])) {

        require "../../../../system/user/classes/emailsettings.php";
        require "../../../../system/user/classes/variablemanager.php";
        require_once('../../../../system/application/libs/php/phpmailer/class.phpmailer.php');
        require_once('../../../../system/application/libs/php/phpmailer/class.smtp.php');

        // Get the form fields and remove whitespace.
        $start_date_location = $_POST["start_date_location"];
        $end_date_location = $_POST["end_date_location"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $user_type = $_POST["user_type"];
        $ticket_type = $_POST["ticket_type"];
        $mobile = filter_var(trim($_POST["mobile"]), FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        $token = random_int(10000, 99999);
        $mail_body = '<TABLE style="font-family: arial; font-size: 14px;" width="600" BORDER="0" cellpadding="5" CELLSPACING="0" COLS="8" FRAME="VOID" RULES="NONE" WTDTH="800">
				  <TBODY>
					<TR>
					  <TD COLSPAN="8" HEIGHT="46" ALIGN="CENTER"><img src="'.HTTP_PATH.'images/isic2_logo.png"/></TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="46" ALIGN="CENTER"><strong style="font-size: 24px; color: #006699">INTERNATIONAL STUDENT IDENTITY CARD (ISIC)</strong></TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">54 | Walukarama Road | Colombo 3 | Sri Lanka.</TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">Tel:  +94 11 5220017 | +94 11 5474747</TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">Email: isic@unitedventuressl.com </TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">Web: www.unitedventuressl.com</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="19" ALIGN="CENTER"><BR></TD>
					</TR>
					<TR>
					  <TD HEIGHT="37" COLSPAN="8" ALIGN="CENTER" VALIGN="MIDDLE"><strong><em style="color: #036; font-size: 18px;">:: Thank you for requesting a quote. We are processing it. ::</em></strong></TD>
					</TR>
					<TR>
					  <TD HEIGHT="20" colspan="8" ALIGN="LEFT">&nbsp;</TD>
					</TR>
<TR>
					  <TD width="147" HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666666; font-size: 14px;">Token</strong></TD>
					  <TD width="348" COLSPAN="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$token.'</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="1" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD width="147" HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666666; font-size: 14px;">From</strong></TD>
					  <TD width="348" COLSPAN="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$start_date_location.'</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="1" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">To</strong></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$end_date_location.'</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="1" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Departure</strong></TD>
					  <TD COLSPAN="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$start_date.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Return</strong></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$end_date.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">User type</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$user_type.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Ticket type</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$ticket_type.'</TD>
					</TR>
<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Mobile</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$mobile.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Message</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$message.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="2" colspan="8" ALIGN="center">&nbsp;</TD>
					</TR>
					<TR>
					  <TD HEIGHT="40" COLSPAN="8" ALIGN="CENTER" bgcolor="#000000"><strong><em style="color: #FFF; font-size: 16px;">- - - Deliver cutting edge service & value - - -</em></strong></TD>
					</TR>
				  </TBODY>
				</TABLE>';

        $mailsettings = new EmailSettings();
        $mailsettings->setId(1);
        $settingsData = $mailsettings -> getById();
        $mailsettings->extractor($settingsData);

        $mail = new PHPMailer(true);    // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 1;                               // Enable verbose debug output
            $mail->isSMTP();                                    // Set mailer to use SMTP
            $mail->Host = $mailsettings->smtpHost();            // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                             // Enable SMTP authentication
            $mail->Username = $mailsettings->smtpUsername();    // SMTP username
            $mail->Password = $mailsettings->smtpPassword();    // SMTP password
            $mail->SMTPSecure = 'ssl';                          // Enable TLS encryption, `ssl` also accepted
            $mail->Port = $mailsettings->smtpPort();            // TCP port to connect to

            //Recipients
            $mail->setFrom($mailsettings->smtpUsername(), 'ISIC.LK');
            $mail->addReplyTo($mailsettings->smtpUsername(), 'ISIC.LK');

            // send user email
            $mail->AddAddress($email, $email);

            // send admin email
            $variable_manager = new VariableManager();;
            $admin_email = $variable_manager->getVariableValue("card_send_email", array("value" => "", "mod_name" => "user"));
            if (!empty($admin_email)) {
                $mail->AddAddress($admin_email, 'ISIC Ticket Admin');
            }

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Thank you for requesting a quote.';
            $mail->Body = $mail_body;
            $mail->WordWrap = 50; // set word wrap

            $mail->send();
            Default_Common::jsonSuccess("Thank You! Your message has been sent.");
        } catch (Exception $e) {
            Default_Common::jsonError("Oops! Something went wrong and we couldn't send your message.");
        }
    }

    if (!empty($_POST["get-your-card-university"])) {

        require "../../../../system/user/classes/emailsettings.php";
        require "../../../../system/user/classes/variablemanager.php";
        require_once('../../../../system/application/libs/php/phpmailer/class.phpmailer.php');
        require_once('../../../../system/application/libs/php/phpmailer/class.smtp.php');

        // Get the form fields and remove whitespace.
        $get_your_card_university = $_POST["get-your-card-university"];
        $get_your_card_fullname = $_POST["get-your-card-fullname"];
        $get_your_card_birthday = $_POST["get-your-card-birthday"];
        $mobile = filter_var(trim($_POST["get-your-card-telephone"]), FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var(trim($_POST["get-your-card-email"]), FILTER_SANITIZE_EMAIL);
        $get_your_card_hear = trim($_POST["get-your-card-hear"]);
        $get_your_card_address = trim($_POST["get-your-card-address"]);

        $token = random_int(10000, 99999);
        $mail_body = '<TABLE style="font-family: arial; font-size: 14px;" width="600" BORDER="0" cellpadding="5" CELLSPACING="0" COLS="8" FRAME="VOID" RULES="NONE" WTDTH="800">
				  <TBODY>
					<TR>
					  <TD COLSPAN="8" HEIGHT="46" ALIGN="CENTER"><img src="'.HTTP_PATH.'images/isic2_logo.png"/></TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="46" ALIGN="CENTER"><strong style="font-size: 24px; color: #006699">INTERNATIONAL STUDENT IDENTITY CARD (ISIC)</strong></TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">54 | Walukarama Road | Colombo 3 | Sri Lanka.</TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">Tel:  +94 11 5220017 | +94 11 5474747</TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">Email: isic@unitedventuressl.com </TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">Web: www.unitedventuressl.com</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="19" ALIGN="CENTER"><BR></TD>
					</TR>
					<TR>
					  <TD HEIGHT="37" COLSPAN="8" ALIGN="CENTER" VALIGN="MIDDLE"><strong><em style="color: #036; font-size: 18px;">:: Thank you for apply ISIC card. We are processing it. ::</em></strong></TD>
					</TR>
					<TR>
					  <TD HEIGHT="20" colspan="8" ALIGN="LEFT">&nbsp;</TD>
					</TR>
<TR>
					  <TD width="147" HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666666; font-size: 14px;">Token</strong></TD>
					  <TD width="348" COLSPAN="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$token.'</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="1" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD width="147" HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666666; font-size: 14px;">University / College</strong></TD>
					  <TD width="348" COLSPAN="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$get_your_card_university.'</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="1" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Full Name</strong></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$get_your_card_fullname.'</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="1" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Date of Birth</strong></TD>
					  <TD COLSPAN="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$get_your_card_birthday.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">E-mail</strong></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$email.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Telephone</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$mobile.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">How did you hear about us?</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$get_your_card_hear.'</TD>
					</TR>
<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Mobile</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$mobile.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">ADDRESS</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$get_your_card_address.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="2" colspan="8" ALIGN="center">&nbsp;</TD>
					</TR>
					<TR>
					  <TD HEIGHT="40" COLSPAN="8" ALIGN="CENTER" bgcolor="#000000"><strong><em style="color: #FFF; font-size: 16px;">- - - Deliver cutting edge service & value - - -</em></strong></TD>
					</TR>
				  </TBODY>
				</TABLE>';

        $mailsettings = new EmailSettings();
        $mailsettings->setId(1);
        $settingsData = $mailsettings -> getById();
        $mailsettings->extractor($settingsData);

        $mail = new PHPMailer(true);    // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 1;                               // Enable verbose debug output
            $mail->isSMTP();                                    // Set mailer to use SMTP
            $mail->Host = $mailsettings->smtpHost();            // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                             // Enable SMTP authentication
            $mail->Username = $mailsettings->smtpUsername();    // SMTP username
            $mail->Password = $mailsettings->smtpPassword();    // SMTP password
            $mail->SMTPSecure = 'ssl';                          // Enable TLS encryption, `ssl` also accepted
            $mail->Port = $mailsettings->smtpPort();            // TCP port to connect to

            $mail->HeaderLine('Content-Type', 'multipart/mixed');

            if (!empty($_FILES['photo'])) {
                $user_photo = $_FILES['photo'];
                $mail->AddAttachment($user_photo['tmp_name'], $user_photo['name']);
            }

            if (!empty($_FILES['file-upload'])) {
                $attachments = $_FILES['file-upload'];
                $file_count = count($attachments['name']);
                if($file_count > 0){
                    for ($x = 0; $x < $file_count; $x++){
                        $mail->AddAttachment($attachments['tmp_name'][$x], $attachments['name'][$x]);
                    }
                }
            }

            //Recipients
            $mail->setFrom($mailsettings->smtpUsername(), 'ISIC.LK');
            $mail->addReplyTo($mailsettings->smtpUsername(), 'ISIC.LK');

            // send user email
            $mail->AddAddress($email, $email);

            // send admin email
            $variable_manager = new VariableManager();;
            $admin_email = $variable_manager->getVariableValue("get_your_card_send_email", array("value" => "", "mod_name" => "user"));
            if (!empty($admin_email)) {
                $mail->AddAddress($admin_email, 'ISIC Card Admin');
            }

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Thank you for applying a ISIC card.';
            $mail->Body = $mail_body;
            $mail->WordWrap = 50; // set word wrap

            $mail->send();
            print json_encode(array('type'=>'done', 'text' => 'Thank you for your email'));
            exit;
        } catch (Exception $e) {
            print json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
            exit;
        }
    }

}
