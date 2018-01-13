<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "contact";

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
      $contact = new Mod_Contact();
      $contact->createTable();

      $views = new Default_Views();
      $views->setModule('contact');

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
      $views->setModule('contact');

      $views->load('admin/view', '', true);
}

function add() { }

function addPost() { }

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('contact');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $contact = new Mod_Contact();

      $contact->setValues($_POST);

      $contact->setModifiedBy(Sessions::getAdminId());
      $contact->setModifiedDate(time());

      if ($contact->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_contact", "edit", "Contact details has been Updated successfully.");

            Default_Common::jsonSuccess("Contact details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() { }

function sortTable() { }

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["contact_name"])) {

    require "../../../../system/user/classes/emailsettings.php";
    require "../../../../system/user/classes/variablemanager.php";
    require_once('../../../../system/application/libs/php/phpmailer/class.phpmailer.php');
    require_once('../../../../system/application/libs/php/phpmailer/class.smtp.php');

    // Get the form fields and remove whitespace.
    $name = $_POST["contact_name"];
    $email = filter_var(trim($_POST["contact_email"]), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(trim($_POST["contact_phone"]), FILTER_SANITIZE_NUMBER_INT);
    $message = trim($_POST["contact_message"]);

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
					  <TD HEIGHT="37" COLSPAN="8" ALIGN="CENTER" VALIGN="MIDDLE"><strong><em style="color: #036; font-size: 18px;">:: This customer has left a message ::</em></strong></TD>
					</TR>
					<TR>
					  <TD HEIGHT="20" colspan="8" ALIGN="LEFT">&nbsp;</TD>
					</TR>
					<TR>
					  <TD width="147" HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666666; font-size: 14px;">Name</strong></TD>
					  <TD width="348" COLSPAN="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$name.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD width="147" HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666666; font-size: 14px;">Email</strong></TD>
					  <TD width="348" COLSPAN="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$email.'</TD>
					</TR>
					<TR>
					  <TD HEIGHT="1" colspan="8" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Phone</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">'.$phone.'</TD>
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

        // send admin email
        $variable_manager = new VariableManager();;
        $admin_email = $variable_manager->getVariableValue("contact_send_email", array("value" => "", "mod_name" => "user"));
        if (!empty($admin_email)) {
            $mail->AddAddress($admin_email, 'Contact Admin');
        }

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'ISIC - Customer has left a message';
        $mail->Body = $mail_body;
        $mail->WordWrap = 50; // set word wrap

        $mail->send();
        Default_Common::jsonSuccess("Thank You! Your message has been sent.");
    } catch (Exception $e) {
        Default_Common::jsonError("Oops! Something went wrong and we couldn't send your message.");
    }
}
