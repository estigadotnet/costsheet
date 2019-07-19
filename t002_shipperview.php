<?php
namespace PHPMaker2019\costsheet_prj;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t002_shipper_view = new t002_shipper_view();

// Run the page
$t002_shipper_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_shipper_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t002_shipper->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft002_shipperview = currentForm = new ew.Form("ft002_shipperview", "view");

// Form_CustomValidate event
ft002_shipperview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft002_shipperview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t002_shipper->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t002_shipper_view->ExportOptions->render("body") ?>
<?php $t002_shipper_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t002_shipper_view->showPageHeader(); ?>
<?php
$t002_shipper_view->showMessage();
?>
<form name="ft002_shipperview" id="ft002_shipperview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t002_shipper_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t002_shipper_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_shipper">
<input type="hidden" name="modal" value="<?php echo (int)$t002_shipper_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t002_shipper->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $t002_shipper_view->TableLeftColumnClass ?>"><span id="elh_t002_shipper_Name"><?php echo $t002_shipper->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $t002_shipper->Name->cellAttributes() ?>>
<span id="el_t002_shipper_Name">
<span<?php echo $t002_shipper->Name->viewAttributes() ?>>
<?php echo $t002_shipper->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t002_shipper_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t002_shipper->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t002_shipper_view->terminate();
?>