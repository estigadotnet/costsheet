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
$t004_vendor_delete = new t004_vendor_delete();

// Run the page
$t004_vendor_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_vendor_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft004_vendordelete = currentForm = new ew.Form("ft004_vendordelete", "delete");

// Form_CustomValidate event
ft004_vendordelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft004_vendordelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t004_vendor_delete->showPageHeader(); ?>
<?php
$t004_vendor_delete->showMessage();
?>
<form name="ft004_vendordelete" id="ft004_vendordelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t004_vendor_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t004_vendor_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_vendor">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t004_vendor_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t004_vendor->Name->Visible) { // Name ?>
		<th class="<?php echo $t004_vendor->Name->headerCellClass() ?>"><span id="elh_t004_vendor_Name" class="t004_vendor_Name"><?php echo $t004_vendor->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t004_vendor_delete->RecCnt = 0;
$i = 0;
while (!$t004_vendor_delete->Recordset->EOF) {
	$t004_vendor_delete->RecCnt++;
	$t004_vendor_delete->RowCnt++;

	// Set row properties
	$t004_vendor->resetAttributes();
	$t004_vendor->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t004_vendor_delete->loadRowValues($t004_vendor_delete->Recordset);

	// Render row
	$t004_vendor_delete->renderRow();
?>
	<tr<?php echo $t004_vendor->rowAttributes() ?>>
<?php if ($t004_vendor->Name->Visible) { // Name ?>
		<td<?php echo $t004_vendor->Name->cellAttributes() ?>>
<span id="el<?php echo $t004_vendor_delete->RowCnt ?>_t004_vendor_Name" class="t004_vendor_Name">
<span<?php echo $t004_vendor->Name->viewAttributes() ?>>
<?php echo $t004_vendor->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t004_vendor_delete->Recordset->moveNext();
}
$t004_vendor_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t004_vendor_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t004_vendor_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t004_vendor_delete->terminate();
?>