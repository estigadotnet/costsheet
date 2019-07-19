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
$t102_costsheetdetail_view = new t102_costsheetdetail_view();

// Run the page
$t102_costsheetdetail_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_costsheetdetail_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t102_costsheetdetail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft102_costsheetdetailview = currentForm = new ew.Form("ft102_costsheetdetailview", "view");

// Form_CustomValidate event
ft102_costsheetdetailview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft102_costsheetdetailview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft102_costsheetdetailview.lists["x_chargecode_id"] = <?php echo $t102_costsheetdetail_view->chargecode_id->Lookup->toClientList() ?>;
ft102_costsheetdetailview.lists["x_chargecode_id"].options = <?php echo JsonEncode($t102_costsheetdetail_view->chargecode_id->lookupOptions()) ?>;
ft102_costsheetdetailview.lists["x_vendor_id"] = <?php echo $t102_costsheetdetail_view->vendor_id->Lookup->toClientList() ?>;
ft102_costsheetdetailview.lists["x_vendor_id"].options = <?php echo JsonEncode($t102_costsheetdetail_view->vendor_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t102_costsheetdetail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t102_costsheetdetail_view->ExportOptions->render("body") ?>
<?php $t102_costsheetdetail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t102_costsheetdetail_view->showPageHeader(); ?>
<?php
$t102_costsheetdetail_view->showMessage();
?>
<form name="ft102_costsheetdetailview" id="ft102_costsheetdetailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t102_costsheetdetail_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t102_costsheetdetail_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_costsheetdetail">
<input type="hidden" name="modal" value="<?php echo (int)$t102_costsheetdetail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
	<tr id="r_chargecode_id">
		<td class="<?php echo $t102_costsheetdetail_view->TableLeftColumnClass ?>"><span id="elh_t102_costsheetdetail_chargecode_id"><?php echo $t102_costsheetdetail->chargecode_id->caption() ?></span></td>
		<td data-name="chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_chargecode_id">
<span<?php echo $t102_costsheetdetail->chargecode_id->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->chargecode_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
	<tr id="r_vendor_id">
		<td class="<?php echo $t102_costsheetdetail_view->TableLeftColumnClass ?>"><span id="elh_t102_costsheetdetail_vendor_id"><?php echo $t102_costsheetdetail->vendor_id->caption() ?></span></td>
		<td data-name="vendor_id"<?php echo $t102_costsheetdetail->vendor_id->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_vendor_id">
<span<?php echo $t102_costsheetdetail->vendor_id->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->vendor_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
	<tr id="r_ptl_amount">
		<td class="<?php echo $t102_costsheetdetail_view->TableLeftColumnClass ?>"><span id="elh_t102_costsheetdetail_ptl_amount"><?php echo $t102_costsheetdetail->ptl_amount->caption() ?></span></td>
		<td data-name="ptl_amount"<?php echo $t102_costsheetdetail->ptl_amount->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_ptl_amount">
<span<?php echo $t102_costsheetdetail->ptl_amount->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->ptl_amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
	<tr id="r_ptl_total">
		<td class="<?php echo $t102_costsheetdetail_view->TableLeftColumnClass ?>"><span id="elh_t102_costsheetdetail_ptl_total"><?php echo $t102_costsheetdetail->ptl_total->caption() ?></span></td>
		<td data-name="ptl_total"<?php echo $t102_costsheetdetail->ptl_total->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_ptl_total">
<span<?php echo $t102_costsheetdetail->ptl_total->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->ptl_total->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
	<tr id="r_rfc_amount">
		<td class="<?php echo $t102_costsheetdetail_view->TableLeftColumnClass ?>"><span id="elh_t102_costsheetdetail_rfc_amount"><?php echo $t102_costsheetdetail->rfc_amount->caption() ?></span></td>
		<td data-name="rfc_amount"<?php echo $t102_costsheetdetail->rfc_amount->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_rfc_amount">
<span<?php echo $t102_costsheetdetail->rfc_amount->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->rfc_amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
	<tr id="r_rfc_total">
		<td class="<?php echo $t102_costsheetdetail_view->TableLeftColumnClass ?>"><span id="elh_t102_costsheetdetail_rfc_total"><?php echo $t102_costsheetdetail->rfc_total->caption() ?></span></td>
		<td data-name="rfc_total"<?php echo $t102_costsheetdetail->rfc_total->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_rfc_total">
<span<?php echo $t102_costsheetdetail->rfc_total->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->rfc_total->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t102_costsheetdetail_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t102_costsheetdetail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t102_costsheetdetail_view->terminate();
?>