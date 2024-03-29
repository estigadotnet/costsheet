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
$t001_liner_delete = new t001_liner_delete();

// Run the page
$t001_liner_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_liner_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft001_linerdelete = currentForm = new ew.Form("ft001_linerdelete", "delete");

// Form_CustomValidate event
ft001_linerdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft001_linerdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t001_liner_delete->showPageHeader(); ?>
<?php
$t001_liner_delete->showMessage();
?>
<form name="ft001_linerdelete" id="ft001_linerdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t001_liner_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t001_liner_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_liner">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t001_liner_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t001_liner->Name->Visible) { // Name ?>
		<th class="<?php echo $t001_liner->Name->headerCellClass() ?>"><span id="elh_t001_liner_Name" class="t001_liner_Name"><?php echo $t001_liner->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t001_liner_delete->RecCnt = 0;
$i = 0;
while (!$t001_liner_delete->Recordset->EOF) {
	$t001_liner_delete->RecCnt++;
	$t001_liner_delete->RowCnt++;

	// Set row properties
	$t001_liner->resetAttributes();
	$t001_liner->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t001_liner_delete->loadRowValues($t001_liner_delete->Recordset);

	// Render row
	$t001_liner_delete->renderRow();
?>
	<tr<?php echo $t001_liner->rowAttributes() ?>>
<?php if ($t001_liner->Name->Visible) { // Name ?>
		<td<?php echo $t001_liner->Name->cellAttributes() ?>>
<span id="el<?php echo $t001_liner_delete->RowCnt ?>_t001_liner_Name" class="t001_liner_Name">
<span<?php echo $t001_liner->Name->viewAttributes() ?>>
<?php echo $t001_liner->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t001_liner_delete->Recordset->moveNext();
}
$t001_liner_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_liner_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t001_liner_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t001_liner_delete->terminate();
?>