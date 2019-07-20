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
$t101_costsheethead_delete = new t101_costsheethead_delete();

// Run the page
$t101_costsheethead_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_costsheethead_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft101_costsheetheaddelete = currentForm = new ew.Form("ft101_costsheetheaddelete", "delete");

// Form_CustomValidate event
ft101_costsheetheaddelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_costsheetheaddelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_costsheetheaddelete.lists["x_liner_id"] = <?php echo $t101_costsheethead_delete->liner_id->Lookup->toClientList() ?>;
ft101_costsheetheaddelete.lists["x_liner_id"].options = <?php echo JsonEncode($t101_costsheethead_delete->liner_id->lookupOptions()) ?>;
ft101_costsheetheaddelete.lists["x_shipper_id"] = <?php echo $t101_costsheethead_delete->shipper_id->Lookup->toClientList() ?>;
ft101_costsheetheaddelete.lists["x_shipper_id"].options = <?php echo JsonEncode($t101_costsheethead_delete->shipper_id->lookupOptions()) ?>;
ft101_costsheetheaddelete.lists["x_top_1"] = <?php echo $t101_costsheethead_delete->top_1->Lookup->toClientList() ?>;
ft101_costsheetheaddelete.lists["x_top_1"].options = <?php echo JsonEncode($t101_costsheethead_delete->top_1->options(FALSE, TRUE)) ?>;
ft101_costsheetheaddelete.lists["x_cont"] = <?php echo $t101_costsheethead_delete->cont->Lookup->toClientList() ?>;
ft101_costsheetheaddelete.lists["x_cont"].options = <?php echo JsonEncode($t101_costsheethead_delete->cont->options(FALSE, TRUE)) ?>;
ft101_costsheetheaddelete.lists["x_top_2"] = <?php echo $t101_costsheethead_delete->top_2->Lookup->toClientList() ?>;
ft101_costsheetheaddelete.lists["x_top_2"].options = <?php echo JsonEncode($t101_costsheethead_delete->top_2->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t101_costsheethead_delete->showPageHeader(); ?>
<?php
$t101_costsheethead_delete->showMessage();
?>
<form name="ft101_costsheetheaddelete" id="ft101_costsheetheaddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_costsheethead_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_costsheethead_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_costsheethead">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_costsheethead_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_costsheethead->liner_id->Visible) { // liner_id ?>
		<th class="<?php echo $t101_costsheethead->liner_id->headerCellClass() ?>"><span id="elh_t101_costsheethead_liner_id" class="t101_costsheethead_liner_id"><?php echo $t101_costsheethead->liner_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->no_bl->Visible) { // no_bl ?>
		<th class="<?php echo $t101_costsheethead->no_bl->headerCellClass() ?>"><span id="elh_t101_costsheethead_no_bl" class="t101_costsheethead_no_bl"><?php echo $t101_costsheethead->no_bl->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->shipper_id->Visible) { // shipper_id ?>
		<th class="<?php echo $t101_costsheethead->shipper_id->headerCellClass() ?>"><span id="elh_t101_costsheethead_shipper_id" class="t101_costsheethead_shipper_id"><?php echo $t101_costsheethead->shipper_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->top_1->Visible) { // top_1 ?>
		<th class="<?php echo $t101_costsheethead->top_1->headerCellClass() ?>"><span id="elh_t101_costsheethead_top_1" class="t101_costsheethead_top_1"><?php echo $t101_costsheethead->top_1->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->vol->Visible) { // vol ?>
		<th class="<?php echo $t101_costsheethead->vol->headerCellClass() ?>"><span id="elh_t101_costsheethead_vol" class="t101_costsheethead_vol"><?php echo $t101_costsheethead->vol->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->cont->Visible) { // cont ?>
		<th class="<?php echo $t101_costsheethead->cont->headerCellClass() ?>"><span id="elh_t101_costsheethead_cont" class="t101_costsheethead_cont"><?php echo $t101_costsheethead->cont->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->no_ref->Visible) { // no_ref ?>
		<th class="<?php echo $t101_costsheethead->no_ref->headerCellClass() ?>"><span id="elh_t101_costsheethead_no_ref" class="t101_costsheethead_no_ref"><?php echo $t101_costsheethead->no_ref->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->vsl_voy->Visible) { // vsl_voy ?>
		<th class="<?php echo $t101_costsheethead->vsl_voy->headerCellClass() ?>"><span id="elh_t101_costsheethead_vsl_voy" class="t101_costsheethead_vsl_voy"><?php echo $t101_costsheethead->vsl_voy->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->pol_pod->Visible) { // pol_pod ?>
		<th class="<?php echo $t101_costsheethead->pol_pod->headerCellClass() ?>"><span id="elh_t101_costsheethead_pol_pod" class="t101_costsheethead_pol_pod"><?php echo $t101_costsheethead->pol_pod->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->top_2->Visible) { // top_2 ?>
		<th class="<?php echo $t101_costsheethead->top_2->headerCellClass() ?>"><span id="elh_t101_costsheethead_top_2" class="t101_costsheethead_top_2"><?php echo $t101_costsheethead->top_2->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->no_cont->Visible) { // no_cont ?>
		<th class="<?php echo $t101_costsheethead->no_cont->headerCellClass() ?>"><span id="elh_t101_costsheethead_no_cont" class="t101_costsheethead_no_cont"><?php echo $t101_costsheethead->no_cont->caption() ?></span></th>
<?php } ?>
<?php if ($t101_costsheethead->cs_date->Visible) { // cs_date ?>
		<th class="<?php echo $t101_costsheethead->cs_date->headerCellClass() ?>"><span id="elh_t101_costsheethead_cs_date" class="t101_costsheethead_cs_date"><?php echo $t101_costsheethead->cs_date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_costsheethead_delete->RecCnt = 0;
$i = 0;
while (!$t101_costsheethead_delete->Recordset->EOF) {
	$t101_costsheethead_delete->RecCnt++;
	$t101_costsheethead_delete->RowCnt++;

	// Set row properties
	$t101_costsheethead->resetAttributes();
	$t101_costsheethead->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_costsheethead_delete->loadRowValues($t101_costsheethead_delete->Recordset);

	// Render row
	$t101_costsheethead_delete->renderRow();
?>
	<tr<?php echo $t101_costsheethead->rowAttributes() ?>>
<?php if ($t101_costsheethead->liner_id->Visible) { // liner_id ?>
		<td<?php echo $t101_costsheethead->liner_id->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_liner_id" class="t101_costsheethead_liner_id">
<span<?php echo $t101_costsheethead->liner_id->viewAttributes() ?>>
<?php echo $t101_costsheethead->liner_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->no_bl->Visible) { // no_bl ?>
		<td<?php echo $t101_costsheethead->no_bl->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_no_bl" class="t101_costsheethead_no_bl">
<span<?php echo $t101_costsheethead->no_bl->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_bl->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->shipper_id->Visible) { // shipper_id ?>
		<td<?php echo $t101_costsheethead->shipper_id->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_shipper_id" class="t101_costsheethead_shipper_id">
<span<?php echo $t101_costsheethead->shipper_id->viewAttributes() ?>>
<?php echo $t101_costsheethead->shipper_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->top_1->Visible) { // top_1 ?>
		<td<?php echo $t101_costsheethead->top_1->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_top_1" class="t101_costsheethead_top_1">
<span<?php echo $t101_costsheethead->top_1->viewAttributes() ?>>
<?php echo $t101_costsheethead->top_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->vol->Visible) { // vol ?>
		<td<?php echo $t101_costsheethead->vol->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_vol" class="t101_costsheethead_vol">
<span<?php echo $t101_costsheethead->vol->viewAttributes() ?>>
<?php echo $t101_costsheethead->vol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->cont->Visible) { // cont ?>
		<td<?php echo $t101_costsheethead->cont->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_cont" class="t101_costsheethead_cont">
<span<?php echo $t101_costsheethead->cont->viewAttributes() ?>>
<?php echo $t101_costsheethead->cont->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->no_ref->Visible) { // no_ref ?>
		<td<?php echo $t101_costsheethead->no_ref->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_no_ref" class="t101_costsheethead_no_ref">
<span<?php echo $t101_costsheethead->no_ref->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_ref->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->vsl_voy->Visible) { // vsl_voy ?>
		<td<?php echo $t101_costsheethead->vsl_voy->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_vsl_voy" class="t101_costsheethead_vsl_voy">
<span<?php echo $t101_costsheethead->vsl_voy->viewAttributes() ?>>
<?php echo $t101_costsheethead->vsl_voy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->pol_pod->Visible) { // pol_pod ?>
		<td<?php echo $t101_costsheethead->pol_pod->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_pol_pod" class="t101_costsheethead_pol_pod">
<span<?php echo $t101_costsheethead->pol_pod->viewAttributes() ?>>
<?php echo $t101_costsheethead->pol_pod->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->top_2->Visible) { // top_2 ?>
		<td<?php echo $t101_costsheethead->top_2->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_top_2" class="t101_costsheethead_top_2">
<span<?php echo $t101_costsheethead->top_2->viewAttributes() ?>>
<?php echo $t101_costsheethead->top_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->no_cont->Visible) { // no_cont ?>
		<td<?php echo $t101_costsheethead->no_cont->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_no_cont" class="t101_costsheethead_no_cont">
<span<?php echo $t101_costsheethead->no_cont->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_cont->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_costsheethead->cs_date->Visible) { // cs_date ?>
		<td<?php echo $t101_costsheethead->cs_date->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_delete->RowCnt ?>_t101_costsheethead_cs_date" class="t101_costsheethead_cs_date">
<span<?php echo $t101_costsheethead->cs_date->viewAttributes() ?>>
<?php echo $t101_costsheethead->cs_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_costsheethead_delete->Recordset->moveNext();
}
$t101_costsheethead_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_costsheethead_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_costsheethead_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t101_costsheethead_delete->terminate();
?>