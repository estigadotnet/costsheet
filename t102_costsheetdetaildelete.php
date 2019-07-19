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
$t102_costsheetdetail_delete = new t102_costsheetdetail_delete();

// Run the page
$t102_costsheetdetail_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_costsheetdetail_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft102_costsheetdetaildelete = currentForm = new ew.Form("ft102_costsheetdetaildelete", "delete");

// Form_CustomValidate event
ft102_costsheetdetaildelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft102_costsheetdetaildelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft102_costsheetdetaildelete.lists["x_chargecode_id"] = <?php echo $t102_costsheetdetail_delete->chargecode_id->Lookup->toClientList() ?>;
ft102_costsheetdetaildelete.lists["x_chargecode_id"].options = <?php echo JsonEncode($t102_costsheetdetail_delete->chargecode_id->lookupOptions()) ?>;
ft102_costsheetdetaildelete.lists["x_vendor_id"] = <?php echo $t102_costsheetdetail_delete->vendor_id->Lookup->toClientList() ?>;
ft102_costsheetdetaildelete.lists["x_vendor_id"].options = <?php echo JsonEncode($t102_costsheetdetail_delete->vendor_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t102_costsheetdetail_delete->showPageHeader(); ?>
<?php
$t102_costsheetdetail_delete->showMessage();
?>
<form name="ft102_costsheetdetaildelete" id="ft102_costsheetdetaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t102_costsheetdetail_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t102_costsheetdetail_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_costsheetdetail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t102_costsheetdetail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
		<th class="<?php echo $t102_costsheetdetail->chargecode_id->headerCellClass() ?>"><span id="elh_t102_costsheetdetail_chargecode_id" class="t102_costsheetdetail_chargecode_id"><?php echo $t102_costsheetdetail->chargecode_id->caption() ?></span></th>
<?php } ?>
<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
		<th class="<?php echo $t102_costsheetdetail->vendor_id->headerCellClass() ?>"><span id="elh_t102_costsheetdetail_vendor_id" class="t102_costsheetdetail_vendor_id"><?php echo $t102_costsheetdetail->vendor_id->caption() ?></span></th>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
		<th class="<?php echo $t102_costsheetdetail->ptl_amount->headerCellClass() ?>"><span id="elh_t102_costsheetdetail_ptl_amount" class="t102_costsheetdetail_ptl_amount"><?php echo $t102_costsheetdetail->ptl_amount->caption() ?></span></th>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
		<th class="<?php echo $t102_costsheetdetail->ptl_total->headerCellClass() ?>"><span id="elh_t102_costsheetdetail_ptl_total" class="t102_costsheetdetail_ptl_total"><?php echo $t102_costsheetdetail->ptl_total->caption() ?></span></th>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
		<th class="<?php echo $t102_costsheetdetail->rfc_amount->headerCellClass() ?>"><span id="elh_t102_costsheetdetail_rfc_amount" class="t102_costsheetdetail_rfc_amount"><?php echo $t102_costsheetdetail->rfc_amount->caption() ?></span></th>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
		<th class="<?php echo $t102_costsheetdetail->rfc_total->headerCellClass() ?>"><span id="elh_t102_costsheetdetail_rfc_total" class="t102_costsheetdetail_rfc_total"><?php echo $t102_costsheetdetail->rfc_total->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t102_costsheetdetail_delete->RecCnt = 0;
$i = 0;
while (!$t102_costsheetdetail_delete->Recordset->EOF) {
	$t102_costsheetdetail_delete->RecCnt++;
	$t102_costsheetdetail_delete->RowCnt++;

	// Set row properties
	$t102_costsheetdetail->resetAttributes();
	$t102_costsheetdetail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t102_costsheetdetail_delete->loadRowValues($t102_costsheetdetail_delete->Recordset);

	// Render row
	$t102_costsheetdetail_delete->renderRow();
?>
	<tr<?php echo $t102_costsheetdetail->rowAttributes() ?>>
<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
		<td<?php echo $t102_costsheetdetail->chargecode_id->cellAttributes() ?>>
<span id="el<?php echo $t102_costsheetdetail_delete->RowCnt ?>_t102_costsheetdetail_chargecode_id" class="t102_costsheetdetail_chargecode_id">
<span<?php echo $t102_costsheetdetail->chargecode_id->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->chargecode_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
		<td<?php echo $t102_costsheetdetail->vendor_id->cellAttributes() ?>>
<span id="el<?php echo $t102_costsheetdetail_delete->RowCnt ?>_t102_costsheetdetail_vendor_id" class="t102_costsheetdetail_vendor_id">
<span<?php echo $t102_costsheetdetail->vendor_id->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->vendor_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
		<td<?php echo $t102_costsheetdetail->ptl_amount->cellAttributes() ?>>
<span id="el<?php echo $t102_costsheetdetail_delete->RowCnt ?>_t102_costsheetdetail_ptl_amount" class="t102_costsheetdetail_ptl_amount">
<span<?php echo $t102_costsheetdetail->ptl_amount->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->ptl_amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
		<td<?php echo $t102_costsheetdetail->ptl_total->cellAttributes() ?>>
<span id="el<?php echo $t102_costsheetdetail_delete->RowCnt ?>_t102_costsheetdetail_ptl_total" class="t102_costsheetdetail_ptl_total">
<span<?php echo $t102_costsheetdetail->ptl_total->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->ptl_total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
		<td<?php echo $t102_costsheetdetail->rfc_amount->cellAttributes() ?>>
<span id="el<?php echo $t102_costsheetdetail_delete->RowCnt ?>_t102_costsheetdetail_rfc_amount" class="t102_costsheetdetail_rfc_amount">
<span<?php echo $t102_costsheetdetail->rfc_amount->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->rfc_amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
		<td<?php echo $t102_costsheetdetail->rfc_total->cellAttributes() ?>>
<span id="el<?php echo $t102_costsheetdetail_delete->RowCnt ?>_t102_costsheetdetail_rfc_total" class="t102_costsheetdetail_rfc_total">
<span<?php echo $t102_costsheetdetail->rfc_total->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->rfc_total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t102_costsheetdetail_delete->Recordset->moveNext();
}
$t102_costsheetdetail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t102_costsheetdetail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t102_costsheetdetail_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t102_costsheetdetail_delete->terminate();
?>