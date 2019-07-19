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
$t002_shipper_delete = new t002_shipper_delete();

// Run the page
$t002_shipper_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_shipper_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft002_shipperdelete = currentForm = new ew.Form("ft002_shipperdelete", "delete");

// Form_CustomValidate event
ft002_shipperdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft002_shipperdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t002_shipper_delete->showPageHeader(); ?>
<?php
$t002_shipper_delete->showMessage();
?>
<form name="ft002_shipperdelete" id="ft002_shipperdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t002_shipper_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t002_shipper_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_shipper">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t002_shipper_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t002_shipper->Name->Visible) { // Name ?>
		<th class="<?php echo $t002_shipper->Name->headerCellClass() ?>"><span id="elh_t002_shipper_Name" class="t002_shipper_Name"><?php echo $t002_shipper->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t002_shipper_delete->RecCnt = 0;
$i = 0;
while (!$t002_shipper_delete->Recordset->EOF) {
	$t002_shipper_delete->RecCnt++;
	$t002_shipper_delete->RowCnt++;

	// Set row properties
	$t002_shipper->resetAttributes();
	$t002_shipper->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t002_shipper_delete->loadRowValues($t002_shipper_delete->Recordset);

	// Render row
	$t002_shipper_delete->renderRow();
?>
	<tr<?php echo $t002_shipper->rowAttributes() ?>>
<?php if ($t002_shipper->Name->Visible) { // Name ?>
		<td<?php echo $t002_shipper->Name->cellAttributes() ?>>
<span id="el<?php echo $t002_shipper_delete->RowCnt ?>_t002_shipper_Name" class="t002_shipper_Name">
<span<?php echo $t002_shipper->Name->viewAttributes() ?>>
<?php echo $t002_shipper->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t002_shipper_delete->Recordset->moveNext();
}
$t002_shipper_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_shipper_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t002_shipper_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t002_shipper_delete->terminate();
?>