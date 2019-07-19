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
$t003_chargecode_delete = new t003_chargecode_delete();

// Run the page
$t003_chargecode_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_chargecode_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft003_chargecodedelete = currentForm = new ew.Form("ft003_chargecodedelete", "delete");

// Form_CustomValidate event
ft003_chargecodedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft003_chargecodedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t003_chargecode_delete->showPageHeader(); ?>
<?php
$t003_chargecode_delete->showMessage();
?>
<form name="ft003_chargecodedelete" id="ft003_chargecodedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t003_chargecode_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t003_chargecode_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_chargecode">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t003_chargecode_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t003_chargecode->id->Visible) { // id ?>
		<th class="<?php echo $t003_chargecode->id->headerCellClass() ?>"><span id="elh_t003_chargecode_id" class="t003_chargecode_id"><?php echo $t003_chargecode->id->caption() ?></span></th>
<?php } ?>
<?php if ($t003_chargecode->Charge_Code->Visible) { // Charge_Code ?>
		<th class="<?php echo $t003_chargecode->Charge_Code->headerCellClass() ?>"><span id="elh_t003_chargecode_Charge_Code" class="t003_chargecode_Charge_Code"><?php echo $t003_chargecode->Charge_Code->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t003_chargecode_delete->RecCnt = 0;
$i = 0;
while (!$t003_chargecode_delete->Recordset->EOF) {
	$t003_chargecode_delete->RecCnt++;
	$t003_chargecode_delete->RowCnt++;

	// Set row properties
	$t003_chargecode->resetAttributes();
	$t003_chargecode->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t003_chargecode_delete->loadRowValues($t003_chargecode_delete->Recordset);

	// Render row
	$t003_chargecode_delete->renderRow();
?>
	<tr<?php echo $t003_chargecode->rowAttributes() ?>>
<?php if ($t003_chargecode->id->Visible) { // id ?>
		<td<?php echo $t003_chargecode->id->cellAttributes() ?>>
<span id="el<?php echo $t003_chargecode_delete->RowCnt ?>_t003_chargecode_id" class="t003_chargecode_id">
<span<?php echo $t003_chargecode->id->viewAttributes() ?>>
<?php echo $t003_chargecode->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t003_chargecode->Charge_Code->Visible) { // Charge_Code ?>
		<td<?php echo $t003_chargecode->Charge_Code->cellAttributes() ?>>
<span id="el<?php echo $t003_chargecode_delete->RowCnt ?>_t003_chargecode_Charge_Code" class="t003_chargecode_Charge_Code">
<span<?php echo $t003_chargecode->Charge_Code->viewAttributes() ?>>
<?php echo $t003_chargecode->Charge_Code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t003_chargecode_delete->Recordset->moveNext();
}
$t003_chargecode_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t003_chargecode_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t003_chargecode_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t003_chargecode_delete->terminate();
?>