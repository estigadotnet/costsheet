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
$t004_vendor_view = new t004_vendor_view();

// Run the page
$t004_vendor_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_vendor_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t004_vendor->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft004_vendorview = currentForm = new ew.Form("ft004_vendorview", "view");

// Form_CustomValidate event
ft004_vendorview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft004_vendorview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t004_vendor->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t004_vendor_view->ExportOptions->render("body") ?>
<?php $t004_vendor_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t004_vendor_view->showPageHeader(); ?>
<?php
$t004_vendor_view->showMessage();
?>
<form name="ft004_vendorview" id="ft004_vendorview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t004_vendor_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t004_vendor_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_vendor">
<input type="hidden" name="modal" value="<?php echo (int)$t004_vendor_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t004_vendor->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t004_vendor_view->TableLeftColumnClass ?>"><span id="elh_t004_vendor_id"><?php echo $t004_vendor->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t004_vendor->id->cellAttributes() ?>>
<span id="el_t004_vendor_id">
<span<?php echo $t004_vendor->id->viewAttributes() ?>>
<?php echo $t004_vendor->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_vendor->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $t004_vendor_view->TableLeftColumnClass ?>"><span id="elh_t004_vendor_Name"><?php echo $t004_vendor->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $t004_vendor->Name->cellAttributes() ?>>
<span id="el_t004_vendor_Name">
<span<?php echo $t004_vendor->Name->viewAttributes() ?>>
<?php echo $t004_vendor->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t004_vendor_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t004_vendor->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t004_vendor_view->terminate();
?>