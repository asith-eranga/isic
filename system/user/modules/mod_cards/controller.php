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

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["start_date_location"])) {

    require "../../../../system/user/classes/emailsettings.php";
    //require_once(DOC_ROOT.'system/application/libs/php/phpmailer/class.phpmailer.php');
    //require_once(DOC_ROOT.'system/application/libs/php/phpmailer/class.smtp.php');

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

    $msg = '<TABLE style="font-family: arial; font-size: 14px;" width="530" BORDER="0" cellpadding="5" CELLSPACING="0" COLS="8" FRAME="VOID" RULES="NONE" WTDTH="800">
				  <TBODY>
					<TR>
					  <TD COLSPAN="8" HEIGHT="46" ALIGN="CENTER"><img src="'.HTTP_PATH.'images/logo.png"/></TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="46" ALIGN="CENTER"><strong style="font-size: 24px; color: #006699">Holidays By Design Sri Lanka.</strong></TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">54 | Walukarama Road | Colombo 3 | Sri Lanka.</TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">Tel:  (+94) 115 48 48 48 / (+61) 413 62 72 81</TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">Email: invoice@unitedventuressl.com </TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" COLSPAN="8" ALIGN="CENTER" style="font-size: 14px">Web: www.hbdasia.com</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="19" ALIGN="CENTER"><BR></TD>
					</TR>
					<TR>
					  <TD HEIGHT="37" COLSPAN="8" ALIGN="CENTER" VALIGN="MIDDLE"><strong><em style="color: #036; font-size: 18px;">:: Online payment details::</em></strong></TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" colspan="8" ALIGN="LEFT">&nbsp;</TD>
					</TR>
					<TR>
					  <TD width="147" HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666666; font-size: 14px;">Name</strong></TD>
					  <TD width="348" COLSPAN="7" ALIGN="LEFT" bgcolor="#EEEEEE">cus_inv_name</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="19" ALIGN="LEFT"></TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Invoice No.</strong></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">invoice_id</TD>
					</TR>
					<TR>
					  <TD COLSPAN="8" HEIGHT="19" ALIGN="LEFT">&nbsp;</TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Invoice date</strong></TD>
					  <TD COLSPAN="7" ALIGN="LEFT" bgcolor="#EEEEEE">invoice_date</TD>
					</TR>
					<TR>
					  <TD HEIGHT="22" colspan="8" ALIGN="LEFT">&nbsp;</TD>
					</TR>
					<TR>
					  <TD HEIGHT="34" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">E mail address</strong></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">cus_inv_email</TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" colspan="8" ALIGN="LEFT">&nbsp;</TD>
					</TR>
					<TR>
					  <TD HEIGHT="31" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Description</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">description</TD>
					</TR>
					<TR>
					  <TD HEIGHT="19" colspan="8" ALIGN="LEFT">&nbsp;</TD>
					</TR>
					<TR>
					  <TD HEIGHT="34" ALIGN="LEFT" bgcolor="#E1E1E1"><strong style="color: #666">Amount to be paid</strong><BR></TD>
					  <TD colspan="7" ALIGN="LEFT" bgcolor="#EEEEEE">invoice_amount</TD>
					</TR>
					<TR>
					  <TD HEIGHT="139" colspan="8" ALIGN="center">linkOri</TD>
					</TR>
					<TR>
					  <TD HEIGHT="40" COLSPAN="8" ALIGN="CENTER" bgcolor="#000000"><strong><em style="color: #FFF; font-size: 16px;">- - - Deliver cutting edge service & value - - -</em></strong></TD>
					</TR>
				  </TBODY>
				</TABLE>

		';

    $mailsettings = new EmailSettings();
    $mailsettings->setId(1);
    $settingsData = $mailsettings -> getById();
    $mailsettings->extractor($settingsData);

    $mail  = new PHPMailer();
    $mail->IsSMTP();

    $mail->SMTPAuth = false;
    if ($mailsettings->smtpAuthentication() == 1) {
        $mail->SMTPAuth = true; // enable SMTP authentication
    }
    $mail->SMTPSecure = "ssl";
    $mail->Host       = $mailsettings->smtpHost();
    $mail->Port       = $mailsettings->smtpPort();
    $mail->Username   = $mailsettings->smtpUsername();
    $mail->Password   = $mailsettings->smtpPassword();
    $mail->From       = $mailsettings->smtpUsername();
    $mail->FromName   = 'ISIC.LK';

    $mail->Subject    = "Your ISIC card Details";
    $mail->WordWrap   = 50; // set word wrap

    $mail->MsgHTML($msg);
    $mail->AddAddress($email,"ISIC.LK - ISIC Card Details");
    $mail->AddAddress('asith2u@yahoo.com', 'Admin copy');

//    $email_to = explode(',', $settingsData[0]['invoice_mail']);
//    foreach ($email_to as $cv => $cb ){
//        if( $emailAddress!=$cb ){
//            $mail->AddAddress($cb);
//        }
//    }

    $mail->IsHTML(true); // send as HTML

    if($mail->Send()){
        Default_Common::jsonSuccess("Thank You! Your message has been sent.");
    }else{
        Default_Common::jsonError("Oops! Something went wrong and we couldn't send your message.");
    }

}
