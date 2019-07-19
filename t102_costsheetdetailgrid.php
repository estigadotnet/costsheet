<?php
namespace PHPMaker2019\costsheet_prj;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t102_costsheetdetail_grid))
	$t102_costsheetdetail_grid = new t102_costsheetdetail_grid();

// Run the page
$t102_costsheetdetail_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_costsheetdetail_grid->Page_Render();
?>
<?php if (!$t102_costsheetdetail->isExport()) { ?>
<script>

// Form object
var ft102_costsheetdetailgrid = new ew.Form("ft102_costsheetdetailgrid", "grid");
ft102_costsheetdetailgrid.formKeyCountName = '<?php echo $t102_costsheetdetail_grid->FormKeyCountName ?>';

// Validate form
ft102_costsheetdetailgrid.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($t102_costsheetdetail_grid->chargecode_id->Required) { ?>
			elm = this.getElements("x" + infix + "_chargecode_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->chargecode_id->caption(), $t102_costsheetdetail->chargecode_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t102_costsheetdetail_grid->vendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_vendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->vendor_id->caption(), $t102_costsheetdetail->vendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t102_costsheetdetail_grid->ptl_amount->Required) { ?>
			elm = this.getElements("x" + infix + "_ptl_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->ptl_amount->caption(), $t102_costsheetdetail->ptl_amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ptl_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t102_costsheetdetail->ptl_amount->errorMessage()) ?>");
		<?php if ($t102_costsheetdetail_grid->ptl_total->Required) { ?>
			elm = this.getElements("x" + infix + "_ptl_total");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->ptl_total->caption(), $t102_costsheetdetail->ptl_total->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ptl_total");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t102_costsheetdetail->ptl_total->errorMessage()) ?>");
		<?php if ($t102_costsheetdetail_grid->rfc_amount->Required) { ?>
			elm = this.getElements("x" + infix + "_rfc_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->rfc_amount->caption(), $t102_costsheetdetail->rfc_amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_rfc_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t102_costsheetdetail->rfc_amount->errorMessage()) ?>");
		<?php if ($t102_costsheetdetail_grid->rfc_total->Required) { ?>
			elm = this.getElements("x" + infix + "_rfc_total");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->rfc_total->caption(), $t102_costsheetdetail->rfc_total->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_rfc_total");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t102_costsheetdetail->rfc_total->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
ft102_costsheetdetailgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "chargecode_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "vendor_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "ptl_amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "ptl_total", false)) return false;
	if (ew.valueChanged(fobj, infix, "rfc_amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "rfc_total", false)) return false;
	return true;
}

// Form_CustomValidate event
ft102_costsheetdetailgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft102_costsheetdetailgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft102_costsheetdetailgrid.lists["x_chargecode_id"] = <?php echo $t102_costsheetdetail_grid->chargecode_id->Lookup->toClientList() ?>;
ft102_costsheetdetailgrid.lists["x_chargecode_id"].options = <?php echo JsonEncode($t102_costsheetdetail_grid->chargecode_id->lookupOptions()) ?>;
ft102_costsheetdetailgrid.lists["x_vendor_id"] = <?php echo $t102_costsheetdetail_grid->vendor_id->Lookup->toClientList() ?>;
ft102_costsheetdetailgrid.lists["x_vendor_id"].options = <?php echo JsonEncode($t102_costsheetdetail_grid->vendor_id->lookupOptions()) ?>;

// Form object for search
</script>
<?php } ?>
<?php
$t102_costsheetdetail_grid->renderOtherOptions();
?>
<?php $t102_costsheetdetail_grid->showPageHeader(); ?>
<?php
$t102_costsheetdetail_grid->showMessage();
?>
<?php if ($t102_costsheetdetail_grid->TotalRecs > 0 || $t102_costsheetdetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t102_costsheetdetail_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t102_costsheetdetail">
<div id="ft102_costsheetdetailgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t102_costsheetdetail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_t102_costsheetdetailgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t102_costsheetdetail_grid->RowType = ROWTYPE_HEADER;

// Render list options
$t102_costsheetdetail_grid->renderListOptions();

// Render list options (header, left)
$t102_costsheetdetail_grid->ListOptions->render("header", "left");
?>
<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->chargecode_id) == "") { ?>
		<th data-name="chargecode_id" class="<?php echo $t102_costsheetdetail->chargecode_id->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_chargecode_id" class="t102_costsheetdetail_chargecode_id"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->chargecode_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="chargecode_id" class="<?php echo $t102_costsheetdetail->chargecode_id->headerCellClass() ?>"><div><div id="elh_t102_costsheetdetail_chargecode_id" class="t102_costsheetdetail_chargecode_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->chargecode_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->chargecode_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->chargecode_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->vendor_id) == "") { ?>
		<th data-name="vendor_id" class="<?php echo $t102_costsheetdetail->vendor_id->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_vendor_id" class="t102_costsheetdetail_vendor_id"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->vendor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vendor_id" class="<?php echo $t102_costsheetdetail->vendor_id->headerCellClass() ?>"><div><div id="elh_t102_costsheetdetail_vendor_id" class="t102_costsheetdetail_vendor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->vendor_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->vendor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->vendor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->ptl_amount) == "") { ?>
		<th data-name="ptl_amount" class="<?php echo $t102_costsheetdetail->ptl_amount->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_ptl_amount" class="t102_costsheetdetail_ptl_amount"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->ptl_amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ptl_amount" class="<?php echo $t102_costsheetdetail->ptl_amount->headerCellClass() ?>"><div><div id="elh_t102_costsheetdetail_ptl_amount" class="t102_costsheetdetail_ptl_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->ptl_amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->ptl_amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->ptl_amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->ptl_total) == "") { ?>
		<th data-name="ptl_total" class="<?php echo $t102_costsheetdetail->ptl_total->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_ptl_total" class="t102_costsheetdetail_ptl_total"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->ptl_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ptl_total" class="<?php echo $t102_costsheetdetail->ptl_total->headerCellClass() ?>"><div><div id="elh_t102_costsheetdetail_ptl_total" class="t102_costsheetdetail_ptl_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->ptl_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->ptl_total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->ptl_total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->rfc_amount) == "") { ?>
		<th data-name="rfc_amount" class="<?php echo $t102_costsheetdetail->rfc_amount->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_rfc_amount" class="t102_costsheetdetail_rfc_amount"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->rfc_amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rfc_amount" class="<?php echo $t102_costsheetdetail->rfc_amount->headerCellClass() ?>"><div><div id="elh_t102_costsheetdetail_rfc_amount" class="t102_costsheetdetail_rfc_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->rfc_amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->rfc_amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->rfc_amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->rfc_total) == "") { ?>
		<th data-name="rfc_total" class="<?php echo $t102_costsheetdetail->rfc_total->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_rfc_total" class="t102_costsheetdetail_rfc_total"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->rfc_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rfc_total" class="<?php echo $t102_costsheetdetail->rfc_total->headerCellClass() ?>"><div><div id="elh_t102_costsheetdetail_rfc_total" class="t102_costsheetdetail_rfc_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->rfc_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->rfc_total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->rfc_total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t102_costsheetdetail_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t102_costsheetdetail_grid->StartRec = 1;
$t102_costsheetdetail_grid->StopRec = $t102_costsheetdetail_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $t102_costsheetdetail_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t102_costsheetdetail_grid->FormKeyCountName) && ($t102_costsheetdetail->isGridAdd() || $t102_costsheetdetail->isGridEdit() || $t102_costsheetdetail->isConfirm())) {
		$t102_costsheetdetail_grid->KeyCount = $CurrentForm->getValue($t102_costsheetdetail_grid->FormKeyCountName);
		$t102_costsheetdetail_grid->StopRec = $t102_costsheetdetail_grid->StartRec + $t102_costsheetdetail_grid->KeyCount - 1;
	}
}
$t102_costsheetdetail_grid->RecCnt = $t102_costsheetdetail_grid->StartRec - 1;
if ($t102_costsheetdetail_grid->Recordset && !$t102_costsheetdetail_grid->Recordset->EOF) {
	$t102_costsheetdetail_grid->Recordset->moveFirst();
	$selectLimit = $t102_costsheetdetail_grid->UseSelectLimit;
	if (!$selectLimit && $t102_costsheetdetail_grid->StartRec > 1)
		$t102_costsheetdetail_grid->Recordset->move($t102_costsheetdetail_grid->StartRec - 1);
} elseif (!$t102_costsheetdetail->AllowAddDeleteRow && $t102_costsheetdetail_grid->StopRec == 0) {
	$t102_costsheetdetail_grid->StopRec = $t102_costsheetdetail->GridAddRowCount;
}

// Initialize aggregate
$t102_costsheetdetail->RowType = ROWTYPE_AGGREGATEINIT;
$t102_costsheetdetail->resetAttributes();
$t102_costsheetdetail_grid->renderRow();
if ($t102_costsheetdetail->isGridAdd())
	$t102_costsheetdetail_grid->RowIndex = 0;
if ($t102_costsheetdetail->isGridEdit())
	$t102_costsheetdetail_grid->RowIndex = 0;
while ($t102_costsheetdetail_grid->RecCnt < $t102_costsheetdetail_grid->StopRec) {
	$t102_costsheetdetail_grid->RecCnt++;
	if ($t102_costsheetdetail_grid->RecCnt >= $t102_costsheetdetail_grid->StartRec) {
		$t102_costsheetdetail_grid->RowCnt++;
		if ($t102_costsheetdetail->isGridAdd() || $t102_costsheetdetail->isGridEdit() || $t102_costsheetdetail->isConfirm()) {
			$t102_costsheetdetail_grid->RowIndex++;
			$CurrentForm->Index = $t102_costsheetdetail_grid->RowIndex;
			if ($CurrentForm->hasValue($t102_costsheetdetail_grid->FormActionName) && $t102_costsheetdetail_grid->EventCancelled)
				$t102_costsheetdetail_grid->RowAction = strval($CurrentForm->getValue($t102_costsheetdetail_grid->FormActionName));
			elseif ($t102_costsheetdetail->isGridAdd())
				$t102_costsheetdetail_grid->RowAction = "insert";
			else
				$t102_costsheetdetail_grid->RowAction = "";
		}

		// Set up key count
		$t102_costsheetdetail_grid->KeyCount = $t102_costsheetdetail_grid->RowIndex;

		// Init row class and style
		$t102_costsheetdetail->resetAttributes();
		$t102_costsheetdetail->CssClass = "";
		if ($t102_costsheetdetail->isGridAdd()) {
			if ($t102_costsheetdetail->CurrentMode == "copy") {
				$t102_costsheetdetail_grid->loadRowValues($t102_costsheetdetail_grid->Recordset); // Load row values
				$t102_costsheetdetail_grid->setRecordKey($t102_costsheetdetail_grid->RowOldKey, $t102_costsheetdetail_grid->Recordset); // Set old record key
			} else {
				$t102_costsheetdetail_grid->loadRowValues(); // Load default values
				$t102_costsheetdetail_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t102_costsheetdetail_grid->loadRowValues($t102_costsheetdetail_grid->Recordset); // Load row values
		}
		$t102_costsheetdetail->RowType = ROWTYPE_VIEW; // Render view
		if ($t102_costsheetdetail->isGridAdd()) // Grid add
			$t102_costsheetdetail->RowType = ROWTYPE_ADD; // Render add
		if ($t102_costsheetdetail->isGridAdd() && $t102_costsheetdetail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t102_costsheetdetail_grid->restoreCurrentRowFormValues($t102_costsheetdetail_grid->RowIndex); // Restore form values
		if ($t102_costsheetdetail->isGridEdit()) { // Grid edit
			if ($t102_costsheetdetail->EventCancelled)
				$t102_costsheetdetail_grid->restoreCurrentRowFormValues($t102_costsheetdetail_grid->RowIndex); // Restore form values
			if ($t102_costsheetdetail_grid->RowAction == "insert")
				$t102_costsheetdetail->RowType = ROWTYPE_ADD; // Render add
			else
				$t102_costsheetdetail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t102_costsheetdetail->isGridEdit() && ($t102_costsheetdetail->RowType == ROWTYPE_EDIT || $t102_costsheetdetail->RowType == ROWTYPE_ADD) && $t102_costsheetdetail->EventCancelled) // Update failed
			$t102_costsheetdetail_grid->restoreCurrentRowFormValues($t102_costsheetdetail_grid->RowIndex); // Restore form values
		if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) // Edit row
			$t102_costsheetdetail_grid->EditRowCnt++;
		if ($t102_costsheetdetail->isConfirm()) // Confirm row
			$t102_costsheetdetail_grid->restoreCurrentRowFormValues($t102_costsheetdetail_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t102_costsheetdetail->RowAttrs = array_merge($t102_costsheetdetail->RowAttrs, array('data-rowindex'=>$t102_costsheetdetail_grid->RowCnt, 'id'=>'r' . $t102_costsheetdetail_grid->RowCnt . '_t102_costsheetdetail', 'data-rowtype'=>$t102_costsheetdetail->RowType));

		// Render row
		$t102_costsheetdetail_grid->renderRow();

		// Render list options
		$t102_costsheetdetail_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t102_costsheetdetail_grid->RowAction <> "delete" && $t102_costsheetdetail_grid->RowAction <> "insertdelete" && !($t102_costsheetdetail_grid->RowAction == "insert" && $t102_costsheetdetail->isConfirm() && $t102_costsheetdetail_grid->emptyRow())) {
?>
	<tr<?php echo $t102_costsheetdetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_costsheetdetail_grid->ListOptions->render("body", "left", $t102_costsheetdetail_grid->RowCnt);
?>
	<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
		<td data-name="chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_chargecode_id" class="form-group t102_costsheetdetail_chargecode_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_chargecode_id" data-value-separator="<?php echo $t102_costsheetdetail->chargecode_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->chargecode_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t003_chargecode") && !$t102_costsheetdetail->chargecode_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->chargecode_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->chargecode_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id',url:'t003_chargecodeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->chargecode_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_grid->RowIndex . "_chargecode_id") ?>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_chargecode_id" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" value="<?php echo HtmlEncode($t102_costsheetdetail->chargecode_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_chargecode_id" class="form-group t102_costsheetdetail_chargecode_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_chargecode_id" data-value-separator="<?php echo $t102_costsheetdetail->chargecode_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->chargecode_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t003_chargecode") && !$t102_costsheetdetail->chargecode_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->chargecode_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->chargecode_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id',url:'t003_chargecodeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->chargecode_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_grid->RowIndex . "_chargecode_id") ?>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_chargecode_id" class="t102_costsheetdetail_chargecode_id">
<span<?php echo $t102_costsheetdetail->chargecode_id->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->chargecode_id->getViewValue() ?></span>
</span>
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_chargecode_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" value="<?php echo HtmlEncode($t102_costsheetdetail->chargecode_id->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_chargecode_id" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" value="<?php echo HtmlEncode($t102_costsheetdetail->chargecode_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_chargecode_id" name="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" id="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" value="<?php echo HtmlEncode($t102_costsheetdetail->chargecode_id->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_chargecode_id" name="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" id="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" value="<?php echo HtmlEncode($t102_costsheetdetail->chargecode_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_id" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_costsheetdetail->id->CurrentValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_id" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_id" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_costsheetdetail->id->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT || $t102_costsheetdetail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_id" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_costsheetdetail->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
		<td data-name="vendor_id"<?php echo $t102_costsheetdetail->vendor_id->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_vendor_id" class="form-group t102_costsheetdetail_vendor_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_vendor_id" data-value-separator="<?php echo $t102_costsheetdetail->vendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id"<?php echo $t102_costsheetdetail->vendor_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->vendor_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t004_vendor") && !$t102_costsheetdetail->vendor_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->vendor_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->vendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id',url:'t004_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->vendor_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_grid->RowIndex . "_vendor_id") ?>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_vendor_id" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" value="<?php echo HtmlEncode($t102_costsheetdetail->vendor_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_vendor_id" class="form-group t102_costsheetdetail_vendor_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_vendor_id" data-value-separator="<?php echo $t102_costsheetdetail->vendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id"<?php echo $t102_costsheetdetail->vendor_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->vendor_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t004_vendor") && !$t102_costsheetdetail->vendor_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->vendor_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->vendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id',url:'t004_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->vendor_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_grid->RowIndex . "_vendor_id") ?>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_vendor_id" class="t102_costsheetdetail_vendor_id">
<span<?php echo $t102_costsheetdetail->vendor_id->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->vendor_id->getViewValue() ?></span>
</span>
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_vendor_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" value="<?php echo HtmlEncode($t102_costsheetdetail->vendor_id->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_vendor_id" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" value="<?php echo HtmlEncode($t102_costsheetdetail->vendor_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_vendor_id" name="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" id="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" value="<?php echo HtmlEncode($t102_costsheetdetail->vendor_id->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_vendor_id" name="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" id="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" value="<?php echo HtmlEncode($t102_costsheetdetail->vendor_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
		<td data-name="ptl_amount"<?php echo $t102_costsheetdetail->ptl_amount->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_ptl_amount" class="form-group t102_costsheetdetail_ptl_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_amount->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_ptl_amount" class="form-group t102_costsheetdetail_ptl_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_amount->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_ptl_amount" class="t102_costsheetdetail_ptl_amount">
<span<?php echo $t102_costsheetdetail->ptl_amount->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->ptl_amount->getViewValue() ?></span>
</span>
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" id="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" id="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
		<td data-name="ptl_total"<?php echo $t102_costsheetdetail->ptl_total->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_ptl_total" class="form-group t102_costsheetdetail_ptl_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_total->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_ptl_total" class="form-group t102_costsheetdetail_ptl_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_total->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_ptl_total" class="t102_costsheetdetail_ptl_total">
<span<?php echo $t102_costsheetdetail->ptl_total->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->ptl_total->getViewValue() ?></span>
</span>
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" id="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" id="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
		<td data-name="rfc_amount"<?php echo $t102_costsheetdetail->rfc_amount->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_rfc_amount" class="form-group t102_costsheetdetail_rfc_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_amount->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_rfc_amount" class="form-group t102_costsheetdetail_rfc_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_amount->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_rfc_amount" class="t102_costsheetdetail_rfc_amount">
<span<?php echo $t102_costsheetdetail->rfc_amount->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->rfc_amount->getViewValue() ?></span>
</span>
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" id="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" id="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
		<td data-name="rfc_total"<?php echo $t102_costsheetdetail->rfc_total->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_rfc_total" class="form-group t102_costsheetdetail_rfc_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_total->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_rfc_total" class="form-group t102_costsheetdetail_rfc_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_total->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_grid->RowCnt ?>_t102_costsheetdetail_rfc_total" class="t102_costsheetdetail_rfc_total">
<span<?php echo $t102_costsheetdetail->rfc_total->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->rfc_total->getViewValue() ?></span>
</span>
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" id="ft102_costsheetdetailgrid$x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->FormValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" id="ft102_costsheetdetailgrid$o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_costsheetdetail_grid->ListOptions->render("body", "right", $t102_costsheetdetail_grid->RowCnt);
?>
	</tr>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD || $t102_costsheetdetail->RowType == ROWTYPE_EDIT) { ?>
<script>
ft102_costsheetdetailgrid.updateLists(<?php echo $t102_costsheetdetail_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t102_costsheetdetail->isGridAdd() || $t102_costsheetdetail->CurrentMode == "copy")
		if (!$t102_costsheetdetail_grid->Recordset->EOF)
			$t102_costsheetdetail_grid->Recordset->moveNext();
}
?>
<?php
	if ($t102_costsheetdetail->CurrentMode == "add" || $t102_costsheetdetail->CurrentMode == "copy" || $t102_costsheetdetail->CurrentMode == "edit") {
		$t102_costsheetdetail_grid->RowIndex = '$rowindex$';
		$t102_costsheetdetail_grid->loadRowValues();

		// Set row properties
		$t102_costsheetdetail->resetAttributes();
		$t102_costsheetdetail->RowAttrs = array_merge($t102_costsheetdetail->RowAttrs, array('data-rowindex'=>$t102_costsheetdetail_grid->RowIndex, 'id'=>'r0_t102_costsheetdetail', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t102_costsheetdetail->RowAttrs["class"], "ew-template");
		$t102_costsheetdetail->RowType = ROWTYPE_ADD;

		// Render row
		$t102_costsheetdetail_grid->renderRow();

		// Render list options
		$t102_costsheetdetail_grid->renderListOptions();
		$t102_costsheetdetail_grid->StartRowCnt = 0;
?>
	<tr<?php echo $t102_costsheetdetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_costsheetdetail_grid->ListOptions->render("body", "left", $t102_costsheetdetail_grid->RowIndex);
?>
	<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
		<td data-name="chargecode_id">
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<span id="el$rowindex$_t102_costsheetdetail_chargecode_id" class="form-group t102_costsheetdetail_chargecode_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_chargecode_id" data-value-separator="<?php echo $t102_costsheetdetail->chargecode_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->chargecode_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t003_chargecode") && !$t102_costsheetdetail->chargecode_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->chargecode_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->chargecode_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id',url:'t003_chargecodeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->chargecode_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_grid->RowIndex . "_chargecode_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_costsheetdetail_chargecode_id" class="form-group t102_costsheetdetail_chargecode_id">
<span<?php echo $t102_costsheetdetail->chargecode_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t102_costsheetdetail->chargecode_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_chargecode_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" value="<?php echo HtmlEncode($t102_costsheetdetail->chargecode_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_chargecode_id" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_chargecode_id" value="<?php echo HtmlEncode($t102_costsheetdetail->chargecode_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
		<td data-name="vendor_id">
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<span id="el$rowindex$_t102_costsheetdetail_vendor_id" class="form-group t102_costsheetdetail_vendor_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_vendor_id" data-value-separator="<?php echo $t102_costsheetdetail->vendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id"<?php echo $t102_costsheetdetail->vendor_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->vendor_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t004_vendor") && !$t102_costsheetdetail->vendor_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->vendor_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->vendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id',url:'t004_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->vendor_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_grid->RowIndex . "_vendor_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_costsheetdetail_vendor_id" class="form-group t102_costsheetdetail_vendor_id">
<span<?php echo $t102_costsheetdetail->vendor_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t102_costsheetdetail->vendor_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_vendor_id" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" value="<?php echo HtmlEncode($t102_costsheetdetail->vendor_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_vendor_id" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_vendor_id" value="<?php echo HtmlEncode($t102_costsheetdetail->vendor_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
		<td data-name="ptl_amount">
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<span id="el$rowindex$_t102_costsheetdetail_ptl_amount" class="form-group t102_costsheetdetail_ptl_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_amount->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_costsheetdetail_ptl_amount" class="form-group t102_costsheetdetail_ptl_amount">
<span<?php echo $t102_costsheetdetail->ptl_amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t102_costsheetdetail->ptl_amount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
		<td data-name="ptl_total">
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<span id="el$rowindex$_t102_costsheetdetail_ptl_total" class="form-group t102_costsheetdetail_ptl_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_total->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_costsheetdetail_ptl_total" class="form-group t102_costsheetdetail_ptl_total">
<span<?php echo $t102_costsheetdetail->ptl_total->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t102_costsheetdetail->ptl_total->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_ptl_total" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
		<td data-name="rfc_amount">
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<span id="el$rowindex$_t102_costsheetdetail_rfc_amount" class="form-group t102_costsheetdetail_rfc_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_amount->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_costsheetdetail_rfc_amount" class="form-group t102_costsheetdetail_rfc_amount">
<span<?php echo $t102_costsheetdetail->rfc_amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t102_costsheetdetail->rfc_amount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
		<td data-name="rfc_total">
<?php if (!$t102_costsheetdetail->isConfirm()) { ?>
<span id="el$rowindex$_t102_costsheetdetail_rfc_total" class="form-group t102_costsheetdetail_rfc_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_total->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_costsheetdetail_rfc_total" class="form-group t102_costsheetdetail_rfc_total">
<span<?php echo $t102_costsheetdetail->rfc_total->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t102_costsheetdetail->rfc_total->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" id="x<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" id="o<?php echo $t102_costsheetdetail_grid->RowIndex ?>_rfc_total" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_costsheetdetail_grid->ListOptions->render("body", "right", $t102_costsheetdetail_grid->RowIndex);
?>
<script>
ft102_costsheetdetailgrid.updateLists(<?php echo $t102_costsheetdetail_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($t102_costsheetdetail->CurrentMode == "add" || $t102_costsheetdetail->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t102_costsheetdetail_grid->FormKeyCountName ?>" id="<?php echo $t102_costsheetdetail_grid->FormKeyCountName ?>" value="<?php echo $t102_costsheetdetail_grid->KeyCount ?>">
<?php echo $t102_costsheetdetail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_costsheetdetail->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t102_costsheetdetail_grid->FormKeyCountName ?>" id="<?php echo $t102_costsheetdetail_grid->FormKeyCountName ?>" value="<?php echo $t102_costsheetdetail_grid->KeyCount ?>">
<?php echo $t102_costsheetdetail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_costsheetdetail->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft102_costsheetdetailgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($t102_costsheetdetail_grid->Recordset)
	$t102_costsheetdetail_grid->Recordset->Close();
?>
</div>
<?php if ($t102_costsheetdetail_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t102_costsheetdetail_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t102_costsheetdetail_grid->TotalRecs == 0 && !$t102_costsheetdetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t102_costsheetdetail_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t102_costsheetdetail_grid->terminate();
?>