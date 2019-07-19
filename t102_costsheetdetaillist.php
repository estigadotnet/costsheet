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
$t102_costsheetdetail_list = new t102_costsheetdetail_list();

// Run the page
$t102_costsheetdetail_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_costsheetdetail_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t102_costsheetdetail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft102_costsheetdetaillist = currentForm = new ew.Form("ft102_costsheetdetaillist", "list");
ft102_costsheetdetaillist.formKeyCountName = '<?php echo $t102_costsheetdetail_list->FormKeyCountName ?>';

// Validate form
ft102_costsheetdetaillist.validate = function() {
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
		<?php if ($t102_costsheetdetail_list->chargecode_id->Required) { ?>
			elm = this.getElements("x" + infix + "_chargecode_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->chargecode_id->caption(), $t102_costsheetdetail->chargecode_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t102_costsheetdetail_list->vendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_vendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->vendor_id->caption(), $t102_costsheetdetail->vendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t102_costsheetdetail_list->ptl_amount->Required) { ?>
			elm = this.getElements("x" + infix + "_ptl_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->ptl_amount->caption(), $t102_costsheetdetail->ptl_amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ptl_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t102_costsheetdetail->ptl_amount->errorMessage()) ?>");
		<?php if ($t102_costsheetdetail_list->ptl_total->Required) { ?>
			elm = this.getElements("x" + infix + "_ptl_total");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->ptl_total->caption(), $t102_costsheetdetail->ptl_total->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ptl_total");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t102_costsheetdetail->ptl_total->errorMessage()) ?>");
		<?php if ($t102_costsheetdetail_list->rfc_amount->Required) { ?>
			elm = this.getElements("x" + infix + "_rfc_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->rfc_amount->caption(), $t102_costsheetdetail->rfc_amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_rfc_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t102_costsheetdetail->rfc_amount->errorMessage()) ?>");
		<?php if ($t102_costsheetdetail_list->rfc_total->Required) { ?>
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
	if (gridinsert && addcnt == 0) { // No row added
		ew.alert(ew.language.phrase("NoAddRecord"));
		return false;
	}
	return true;
}

// Check empty row
ft102_costsheetdetaillist.emptyRow = function(infix) {
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
ft102_costsheetdetaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft102_costsheetdetaillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft102_costsheetdetaillist.lists["x_chargecode_id"] = <?php echo $t102_costsheetdetail_list->chargecode_id->Lookup->toClientList() ?>;
ft102_costsheetdetaillist.lists["x_chargecode_id"].options = <?php echo JsonEncode($t102_costsheetdetail_list->chargecode_id->lookupOptions()) ?>;
ft102_costsheetdetaillist.lists["x_vendor_id"] = <?php echo $t102_costsheetdetail_list->vendor_id->Lookup->toClientList() ?>;
ft102_costsheetdetaillist.lists["x_vendor_id"].options = <?php echo JsonEncode($t102_costsheetdetail_list->vendor_id->lookupOptions()) ?>;

// Form object for search
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "right" : "left";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t102_costsheetdetail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t102_costsheetdetail_list->TotalRecs > 0 && $t102_costsheetdetail_list->ExportOptions->visible()) { ?>
<?php $t102_costsheetdetail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t102_costsheetdetail_list->ImportOptions->visible()) { ?>
<?php $t102_costsheetdetail_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t102_costsheetdetail->isExport() || EXPORT_MASTER_RECORD && $t102_costsheetdetail->isExport("print")) { ?>
<?php
if ($t102_costsheetdetail_list->DbMasterFilter <> "" && $t102_costsheetdetail->getCurrentMasterTable() == "t101_costsheethead") {
	if ($t102_costsheetdetail_list->MasterRecordExists) {
		include_once "t101_costsheetheadmaster.php";
	}
}
?>
<?php } ?>
<?php
$t102_costsheetdetail_list->renderOtherOptions();
?>
<?php $t102_costsheetdetail_list->showPageHeader(); ?>
<?php
$t102_costsheetdetail_list->showMessage();
?>
<?php if ($t102_costsheetdetail_list->TotalRecs > 0 || $t102_costsheetdetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t102_costsheetdetail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t102_costsheetdetail">
<form name="ft102_costsheetdetaillist" id="ft102_costsheetdetaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t102_costsheetdetail_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t102_costsheetdetail_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_costsheetdetail">
<?php if ($t102_costsheetdetail->getCurrentMasterTable() == "t101_costsheethead" && $t102_costsheetdetail->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t101_costsheethead">
<input type="hidden" name="fk_id" value="<?php echo $t102_costsheetdetail->costsheethead_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_t102_costsheetdetail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t102_costsheetdetail_list->TotalRecs > 0 || $t102_costsheetdetail->isAdd() || $t102_costsheetdetail->isCopy() || $t102_costsheetdetail->isGridEdit()) { ?>
<table id="tbl_t102_costsheetdetaillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t102_costsheetdetail_list->RowType = ROWTYPE_HEADER;

// Render list options
$t102_costsheetdetail_list->renderListOptions();

// Render list options (header, left)
$t102_costsheetdetail_list->ListOptions->render("header", "left");
?>
<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->chargecode_id) == "") { ?>
		<th data-name="chargecode_id" class="<?php echo $t102_costsheetdetail->chargecode_id->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_chargecode_id" class="t102_costsheetdetail_chargecode_id"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->chargecode_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="chargecode_id" class="<?php echo $t102_costsheetdetail->chargecode_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t102_costsheetdetail->SortUrl($t102_costsheetdetail->chargecode_id) ?>',2);"><div id="elh_t102_costsheetdetail_chargecode_id" class="t102_costsheetdetail_chargecode_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->chargecode_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->chargecode_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->chargecode_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->vendor_id) == "") { ?>
		<th data-name="vendor_id" class="<?php echo $t102_costsheetdetail->vendor_id->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_vendor_id" class="t102_costsheetdetail_vendor_id"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->vendor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vendor_id" class="<?php echo $t102_costsheetdetail->vendor_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t102_costsheetdetail->SortUrl($t102_costsheetdetail->vendor_id) ?>',2);"><div id="elh_t102_costsheetdetail_vendor_id" class="t102_costsheetdetail_vendor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->vendor_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->vendor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->vendor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->ptl_amount) == "") { ?>
		<th data-name="ptl_amount" class="<?php echo $t102_costsheetdetail->ptl_amount->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_ptl_amount" class="t102_costsheetdetail_ptl_amount"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->ptl_amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ptl_amount" class="<?php echo $t102_costsheetdetail->ptl_amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t102_costsheetdetail->SortUrl($t102_costsheetdetail->ptl_amount) ?>',2);"><div id="elh_t102_costsheetdetail_ptl_amount" class="t102_costsheetdetail_ptl_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->ptl_amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->ptl_amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->ptl_amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->ptl_total) == "") { ?>
		<th data-name="ptl_total" class="<?php echo $t102_costsheetdetail->ptl_total->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_ptl_total" class="t102_costsheetdetail_ptl_total"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->ptl_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ptl_total" class="<?php echo $t102_costsheetdetail->ptl_total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t102_costsheetdetail->SortUrl($t102_costsheetdetail->ptl_total) ?>',2);"><div id="elh_t102_costsheetdetail_ptl_total" class="t102_costsheetdetail_ptl_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->ptl_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->ptl_total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->ptl_total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->rfc_amount) == "") { ?>
		<th data-name="rfc_amount" class="<?php echo $t102_costsheetdetail->rfc_amount->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_rfc_amount" class="t102_costsheetdetail_rfc_amount"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->rfc_amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rfc_amount" class="<?php echo $t102_costsheetdetail->rfc_amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t102_costsheetdetail->SortUrl($t102_costsheetdetail->rfc_amount) ?>',2);"><div id="elh_t102_costsheetdetail_rfc_amount" class="t102_costsheetdetail_rfc_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->rfc_amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->rfc_amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->rfc_amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
	<?php if ($t102_costsheetdetail->sortUrl($t102_costsheetdetail->rfc_total) == "") { ?>
		<th data-name="rfc_total" class="<?php echo $t102_costsheetdetail->rfc_total->headerCellClass() ?>"><div id="elh_t102_costsheetdetail_rfc_total" class="t102_costsheetdetail_rfc_total"><div class="ew-table-header-caption"><?php echo $t102_costsheetdetail->rfc_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rfc_total" class="<?php echo $t102_costsheetdetail->rfc_total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t102_costsheetdetail->SortUrl($t102_costsheetdetail->rfc_total) ?>',2);"><div id="elh_t102_costsheetdetail_rfc_total" class="t102_costsheetdetail_rfc_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->rfc_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_costsheetdetail->rfc_total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_costsheetdetail->rfc_total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t102_costsheetdetail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t102_costsheetdetail->isAdd() || $t102_costsheetdetail->isCopy()) {
		$t102_costsheetdetail_list->RowIndex = 0;
		$t102_costsheetdetail_list->KeyCount = $t102_costsheetdetail_list->RowIndex;
		if ($t102_costsheetdetail->isCopy() && !$t102_costsheetdetail_list->loadRow())
			$t102_costsheetdetail->CurrentAction = "add";
		if ($t102_costsheetdetail->isAdd())
			$t102_costsheetdetail_list->loadRowValues();
		if ($t102_costsheetdetail->EventCancelled) // Insert failed
			$t102_costsheetdetail_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t102_costsheetdetail->resetAttributes();
		$t102_costsheetdetail->RowAttrs = array_merge($t102_costsheetdetail->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_t102_costsheetdetail', 'data-rowtype'=>ROWTYPE_ADD));
		$t102_costsheetdetail->RowType = ROWTYPE_ADD;

		// Render row
		$t102_costsheetdetail_list->renderRow();

		// Render list options
		$t102_costsheetdetail_list->renderListOptions();
		$t102_costsheetdetail_list->StartRowCnt = 0;
?>
	<tr<?php echo $t102_costsheetdetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_costsheetdetail_list->ListOptions->render("body", "left", $t102_costsheetdetail_list->RowCnt);
?>
	<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
		<td data-name="chargecode_id">
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_chargecode_id" class="form-group t102_costsheetdetail_chargecode_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_chargecode_id" data-value-separator="<?php echo $t102_costsheetdetail->chargecode_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->chargecode_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t003_chargecode") && !$t102_costsheetdetail->chargecode_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->chargecode_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->chargecode_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id',url:'t003_chargecodeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->chargecode_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_list->RowIndex . "_chargecode_id") ?>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_chargecode_id" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" value="<?php echo HtmlEncode($t102_costsheetdetail->chargecode_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
		<td data-name="vendor_id">
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_vendor_id" class="form-group t102_costsheetdetail_vendor_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_vendor_id" data-value-separator="<?php echo $t102_costsheetdetail->vendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id"<?php echo $t102_costsheetdetail->vendor_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->vendor_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t004_vendor") && !$t102_costsheetdetail->vendor_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->vendor_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->vendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id',url:'t004_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->vendor_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_list->RowIndex . "_vendor_id") ?>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_vendor_id" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" value="<?php echo HtmlEncode($t102_costsheetdetail->vendor_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
		<td data-name="ptl_amount">
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_ptl_amount" class="form-group t102_costsheetdetail_ptl_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_amount->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
		<td data-name="ptl_total">
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_ptl_total" class="form-group t102_costsheetdetail_ptl_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_total->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
		<td data-name="rfc_amount">
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_rfc_amount" class="form-group t102_costsheetdetail_rfc_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_amount->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
		<td data-name="rfc_total">
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_rfc_total" class="form-group t102_costsheetdetail_rfc_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_total->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_costsheetdetail_list->ListOptions->render("body", "right", $t102_costsheetdetail_list->RowCnt);
?>
<script>
ft102_costsheetdetaillist.updateLists(<?php echo $t102_costsheetdetail_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($t102_costsheetdetail->ExportAll && $t102_costsheetdetail->isExport()) {
	$t102_costsheetdetail_list->StopRec = $t102_costsheetdetail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t102_costsheetdetail_list->TotalRecs > $t102_costsheetdetail_list->StartRec + $t102_costsheetdetail_list->DisplayRecs - 1)
		$t102_costsheetdetail_list->StopRec = $t102_costsheetdetail_list->StartRec + $t102_costsheetdetail_list->DisplayRecs - 1;
	else
		$t102_costsheetdetail_list->StopRec = $t102_costsheetdetail_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $t102_costsheetdetail_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t102_costsheetdetail_list->FormKeyCountName) && ($t102_costsheetdetail->isGridAdd() || $t102_costsheetdetail->isGridEdit() || $t102_costsheetdetail->isConfirm())) {
		$t102_costsheetdetail_list->KeyCount = $CurrentForm->getValue($t102_costsheetdetail_list->FormKeyCountName);
		$t102_costsheetdetail_list->StopRec = $t102_costsheetdetail_list->StartRec + $t102_costsheetdetail_list->KeyCount - 1;
	}
}
$t102_costsheetdetail_list->RecCnt = $t102_costsheetdetail_list->StartRec - 1;
if ($t102_costsheetdetail_list->Recordset && !$t102_costsheetdetail_list->Recordset->EOF) {
	$t102_costsheetdetail_list->Recordset->moveFirst();
	$selectLimit = $t102_costsheetdetail_list->UseSelectLimit;
	if (!$selectLimit && $t102_costsheetdetail_list->StartRec > 1)
		$t102_costsheetdetail_list->Recordset->move($t102_costsheetdetail_list->StartRec - 1);
} elseif (!$t102_costsheetdetail->AllowAddDeleteRow && $t102_costsheetdetail_list->StopRec == 0) {
	$t102_costsheetdetail_list->StopRec = $t102_costsheetdetail->GridAddRowCount;
}

// Initialize aggregate
$t102_costsheetdetail->RowType = ROWTYPE_AGGREGATEINIT;
$t102_costsheetdetail->resetAttributes();
$t102_costsheetdetail_list->renderRow();
$t102_costsheetdetail_list->EditRowCnt = 0;
if ($t102_costsheetdetail->isEdit())
	$t102_costsheetdetail_list->RowIndex = 1;
if ($t102_costsheetdetail->isGridAdd())
	$t102_costsheetdetail_list->RowIndex = 0;
if ($t102_costsheetdetail->isGridEdit())
	$t102_costsheetdetail_list->RowIndex = 0;
while ($t102_costsheetdetail_list->RecCnt < $t102_costsheetdetail_list->StopRec) {
	$t102_costsheetdetail_list->RecCnt++;
	if ($t102_costsheetdetail_list->RecCnt >= $t102_costsheetdetail_list->StartRec) {
		$t102_costsheetdetail_list->RowCnt++;
		if ($t102_costsheetdetail->isGridAdd() || $t102_costsheetdetail->isGridEdit() || $t102_costsheetdetail->isConfirm()) {
			$t102_costsheetdetail_list->RowIndex++;
			$CurrentForm->Index = $t102_costsheetdetail_list->RowIndex;
			if ($CurrentForm->hasValue($t102_costsheetdetail_list->FormActionName) && $t102_costsheetdetail_list->EventCancelled)
				$t102_costsheetdetail_list->RowAction = strval($CurrentForm->getValue($t102_costsheetdetail_list->FormActionName));
			elseif ($t102_costsheetdetail->isGridAdd())
				$t102_costsheetdetail_list->RowAction = "insert";
			else
				$t102_costsheetdetail_list->RowAction = "";
		}

		// Set up key count
		$t102_costsheetdetail_list->KeyCount = $t102_costsheetdetail_list->RowIndex;

		// Init row class and style
		$t102_costsheetdetail->resetAttributes();
		$t102_costsheetdetail->CssClass = "";
		if ($t102_costsheetdetail->isGridAdd()) {
			$t102_costsheetdetail_list->loadRowValues(); // Load default values
		} else {
			$t102_costsheetdetail_list->loadRowValues($t102_costsheetdetail_list->Recordset); // Load row values
		}
		$t102_costsheetdetail->RowType = ROWTYPE_VIEW; // Render view
		if ($t102_costsheetdetail->isGridAdd()) // Grid add
			$t102_costsheetdetail->RowType = ROWTYPE_ADD; // Render add
		if ($t102_costsheetdetail->isGridAdd() && $t102_costsheetdetail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t102_costsheetdetail_list->restoreCurrentRowFormValues($t102_costsheetdetail_list->RowIndex); // Restore form values
		if ($t102_costsheetdetail->isEdit()) {
			if ($t102_costsheetdetail_list->checkInlineEditKey() && $t102_costsheetdetail_list->EditRowCnt == 0) { // Inline edit
				$t102_costsheetdetail->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t102_costsheetdetail->isGridEdit()) { // Grid edit
			if ($t102_costsheetdetail->EventCancelled)
				$t102_costsheetdetail_list->restoreCurrentRowFormValues($t102_costsheetdetail_list->RowIndex); // Restore form values
			if ($t102_costsheetdetail_list->RowAction == "insert")
				$t102_costsheetdetail->RowType = ROWTYPE_ADD; // Render add
			else
				$t102_costsheetdetail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t102_costsheetdetail->isEdit() && $t102_costsheetdetail->RowType == ROWTYPE_EDIT && $t102_costsheetdetail->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t102_costsheetdetail_list->restoreFormValues(); // Restore form values
		}
		if ($t102_costsheetdetail->isGridEdit() && ($t102_costsheetdetail->RowType == ROWTYPE_EDIT || $t102_costsheetdetail->RowType == ROWTYPE_ADD) && $t102_costsheetdetail->EventCancelled) // Update failed
			$t102_costsheetdetail_list->restoreCurrentRowFormValues($t102_costsheetdetail_list->RowIndex); // Restore form values
		if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) // Edit row
			$t102_costsheetdetail_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$t102_costsheetdetail->RowAttrs = array_merge($t102_costsheetdetail->RowAttrs, array('data-rowindex'=>$t102_costsheetdetail_list->RowCnt, 'id'=>'r' . $t102_costsheetdetail_list->RowCnt . '_t102_costsheetdetail', 'data-rowtype'=>$t102_costsheetdetail->RowType));

		// Render row
		$t102_costsheetdetail_list->renderRow();

		// Render list options
		$t102_costsheetdetail_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t102_costsheetdetail_list->RowAction <> "delete" && $t102_costsheetdetail_list->RowAction <> "insertdelete" && !($t102_costsheetdetail_list->RowAction == "insert" && $t102_costsheetdetail->isConfirm() && $t102_costsheetdetail_list->emptyRow())) {
?>
	<tr<?php echo $t102_costsheetdetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_costsheetdetail_list->ListOptions->render("body", "left", $t102_costsheetdetail_list->RowCnt);
?>
	<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
		<td data-name="chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_chargecode_id" class="form-group t102_costsheetdetail_chargecode_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_chargecode_id" data-value-separator="<?php echo $t102_costsheetdetail->chargecode_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->chargecode_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t003_chargecode") && !$t102_costsheetdetail->chargecode_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->chargecode_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->chargecode_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id',url:'t003_chargecodeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->chargecode_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_list->RowIndex . "_chargecode_id") ?>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_chargecode_id" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" value="<?php echo HtmlEncode($t102_costsheetdetail->chargecode_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_chargecode_id" class="form-group t102_costsheetdetail_chargecode_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_chargecode_id" data-value-separator="<?php echo $t102_costsheetdetail->chargecode_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->chargecode_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t003_chargecode") && !$t102_costsheetdetail->chargecode_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->chargecode_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->chargecode_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id',url:'t003_chargecodeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->chargecode_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_list->RowIndex . "_chargecode_id") ?>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_chargecode_id" class="t102_costsheetdetail_chargecode_id">
<span<?php echo $t102_costsheetdetail->chargecode_id->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->chargecode_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_id" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_id" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_costsheetdetail->id->CurrentValue) ?>">
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_id" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_id" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_costsheetdetail->id->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT || $t102_costsheetdetail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_id" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_id" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_costsheetdetail->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
		<td data-name="vendor_id"<?php echo $t102_costsheetdetail->vendor_id->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_vendor_id" class="form-group t102_costsheetdetail_vendor_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_vendor_id" data-value-separator="<?php echo $t102_costsheetdetail->vendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id"<?php echo $t102_costsheetdetail->vendor_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->vendor_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t004_vendor") && !$t102_costsheetdetail->vendor_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->vendor_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->vendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id',url:'t004_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->vendor_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_list->RowIndex . "_vendor_id") ?>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_vendor_id" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" value="<?php echo HtmlEncode($t102_costsheetdetail->vendor_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_vendor_id" class="form-group t102_costsheetdetail_vendor_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_vendor_id" data-value-separator="<?php echo $t102_costsheetdetail->vendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id"<?php echo $t102_costsheetdetail->vendor_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->vendor_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t004_vendor") && !$t102_costsheetdetail->vendor_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->vendor_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->vendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id',url:'t004_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->vendor_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_list->RowIndex . "_vendor_id") ?>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_vendor_id" class="t102_costsheetdetail_vendor_id">
<span<?php echo $t102_costsheetdetail->vendor_id->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->vendor_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
		<td data-name="ptl_amount"<?php echo $t102_costsheetdetail->ptl_amount->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_ptl_amount" class="form-group t102_costsheetdetail_ptl_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_amount->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_ptl_amount" class="form-group t102_costsheetdetail_ptl_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_amount->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_ptl_amount" class="t102_costsheetdetail_ptl_amount">
<span<?php echo $t102_costsheetdetail->ptl_amount->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->ptl_amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
		<td data-name="ptl_total"<?php echo $t102_costsheetdetail->ptl_total->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_ptl_total" class="form-group t102_costsheetdetail_ptl_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_total->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_ptl_total" class="form-group t102_costsheetdetail_ptl_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_total->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_ptl_total" class="t102_costsheetdetail_ptl_total">
<span<?php echo $t102_costsheetdetail->ptl_total->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->ptl_total->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
		<td data-name="rfc_amount"<?php echo $t102_costsheetdetail->rfc_amount->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_rfc_amount" class="form-group t102_costsheetdetail_rfc_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_amount->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_rfc_amount" class="form-group t102_costsheetdetail_rfc_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_amount->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_rfc_amount" class="t102_costsheetdetail_rfc_amount">
<span<?php echo $t102_costsheetdetail->rfc_amount->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->rfc_amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
		<td data-name="rfc_total"<?php echo $t102_costsheetdetail->rfc_total->cellAttributes() ?>>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_rfc_total" class="form-group t102_costsheetdetail_rfc_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_total->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->OldValue) ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_rfc_total" class="form-group t102_costsheetdetail_rfc_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_total->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_costsheetdetail_list->RowCnt ?>_t102_costsheetdetail_rfc_total" class="t102_costsheetdetail_rfc_total">
<span<?php echo $t102_costsheetdetail->rfc_total->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->rfc_total->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_costsheetdetail_list->ListOptions->render("body", "right", $t102_costsheetdetail_list->RowCnt);
?>
	</tr>
<?php if ($t102_costsheetdetail->RowType == ROWTYPE_ADD || $t102_costsheetdetail->RowType == ROWTYPE_EDIT) { ?>
<script>
ft102_costsheetdetaillist.updateLists(<?php echo $t102_costsheetdetail_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t102_costsheetdetail->isGridAdd())
		if (!$t102_costsheetdetail_list->Recordset->EOF)
			$t102_costsheetdetail_list->Recordset->moveNext();
}
?>
<?php
	if ($t102_costsheetdetail->isGridAdd() || $t102_costsheetdetail->isGridEdit()) {
		$t102_costsheetdetail_list->RowIndex = '$rowindex$';
		$t102_costsheetdetail_list->loadRowValues();

		// Set row properties
		$t102_costsheetdetail->resetAttributes();
		$t102_costsheetdetail->RowAttrs = array_merge($t102_costsheetdetail->RowAttrs, array('data-rowindex'=>$t102_costsheetdetail_list->RowIndex, 'id'=>'r0_t102_costsheetdetail', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t102_costsheetdetail->RowAttrs["class"], "ew-template");
		$t102_costsheetdetail->RowType = ROWTYPE_ADD;

		// Render row
		$t102_costsheetdetail_list->renderRow();

		// Render list options
		$t102_costsheetdetail_list->renderListOptions();
		$t102_costsheetdetail_list->StartRowCnt = 0;
?>
	<tr<?php echo $t102_costsheetdetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_costsheetdetail_list->ListOptions->render("body", "left", $t102_costsheetdetail_list->RowIndex);
?>
	<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
		<td data-name="chargecode_id">
<span id="el$rowindex$_t102_costsheetdetail_chargecode_id" class="form-group t102_costsheetdetail_chargecode_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_chargecode_id" data-value-separator="<?php echo $t102_costsheetdetail->chargecode_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->chargecode_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t003_chargecode") && !$t102_costsheetdetail->chargecode_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->chargecode_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->chargecode_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id',url:'t003_chargecodeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->chargecode_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_list->RowIndex . "_chargecode_id") ?>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_chargecode_id" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_chargecode_id" value="<?php echo HtmlEncode($t102_costsheetdetail->chargecode_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
		<td data-name="vendor_id">
<span id="el$rowindex$_t102_costsheetdetail_vendor_id" class="form-group t102_costsheetdetail_vendor_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_vendor_id" data-value-separator="<?php echo $t102_costsheetdetail->vendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id"<?php echo $t102_costsheetdetail->vendor_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->vendor_id->selectOptionListHtml("x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t004_vendor") && !$t102_costsheetdetail->vendor_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->vendor_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->vendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id',url:'t004_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->vendor_id->Lookup->getParamTag("p_x" . $t102_costsheetdetail_list->RowIndex . "_vendor_id") ?>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_vendor_id" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_vendor_id" value="<?php echo HtmlEncode($t102_costsheetdetail->vendor_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
		<td data-name="ptl_amount">
<span id="el$rowindex$_t102_costsheetdetail_ptl_amount" class="form-group t102_costsheetdetail_ptl_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_amount->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
		<td data-name="ptl_total">
<span id="el$rowindex$_t102_costsheetdetail_ptl_total" class="form-group t102_costsheetdetail_ptl_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_total->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_ptl_total" value="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
		<td data-name="rfc_amount">
<span id="el$rowindex$_t102_costsheetdetail_rfc_amount" class="form-group t102_costsheetdetail_rfc_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_amount->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_amount" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
		<td data-name="rfc_total">
<span id="el$rowindex$_t102_costsheetdetail_rfc_total" class="form-group t102_costsheetdetail_rfc_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" id="x<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_total->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_total->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" id="o<?php echo $t102_costsheetdetail_list->RowIndex ?>_rfc_total" value="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_costsheetdetail_list->ListOptions->render("body", "right", $t102_costsheetdetail_list->RowIndex);
?>
<script>
ft102_costsheetdetaillist.updateLists(<?php echo $t102_costsheetdetail_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($t102_costsheetdetail->isAdd() || $t102_costsheetdetail->isCopy()) { ?>
<input type="hidden" name="<?php echo $t102_costsheetdetail_list->FormKeyCountName ?>" id="<?php echo $t102_costsheetdetail_list->FormKeyCountName ?>" value="<?php echo $t102_costsheetdetail_list->KeyCount ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t102_costsheetdetail_list->FormKeyCountName ?>" id="<?php echo $t102_costsheetdetail_list->FormKeyCountName ?>" value="<?php echo $t102_costsheetdetail_list->KeyCount ?>">
<?php echo $t102_costsheetdetail_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_costsheetdetail->isEdit()) { ?>
<input type="hidden" name="<?php echo $t102_costsheetdetail_list->FormKeyCountName ?>" id="<?php echo $t102_costsheetdetail_list->FormKeyCountName ?>" value="<?php echo $t102_costsheetdetail_list->KeyCount ?>">
<?php } ?>
<?php if ($t102_costsheetdetail->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t102_costsheetdetail_list->FormKeyCountName ?>" id="<?php echo $t102_costsheetdetail_list->FormKeyCountName ?>" value="<?php echo $t102_costsheetdetail_list->KeyCount ?>">
<?php echo $t102_costsheetdetail_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t102_costsheetdetail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t102_costsheetdetail_list->Recordset)
	$t102_costsheetdetail_list->Recordset->Close();
?>
<?php if (!$t102_costsheetdetail->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t102_costsheetdetail->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t102_costsheetdetail_list->Pager)) $t102_costsheetdetail_list->Pager = new PrevNextPager($t102_costsheetdetail_list->StartRec, $t102_costsheetdetail_list->DisplayRecs, $t102_costsheetdetail_list->TotalRecs, $t102_costsheetdetail_list->AutoHidePager) ?>
<?php if ($t102_costsheetdetail_list->Pager->RecordCount > 0 && $t102_costsheetdetail_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t102_costsheetdetail_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t102_costsheetdetail_list->pageUrl() ?>start=<?php echo $t102_costsheetdetail_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t102_costsheetdetail_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t102_costsheetdetail_list->pageUrl() ?>start=<?php echo $t102_costsheetdetail_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t102_costsheetdetail_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t102_costsheetdetail_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t102_costsheetdetail_list->pageUrl() ?>start=<?php echo $t102_costsheetdetail_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t102_costsheetdetail_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t102_costsheetdetail_list->pageUrl() ?>start=<?php echo $t102_costsheetdetail_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t102_costsheetdetail_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t102_costsheetdetail_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t102_costsheetdetail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t102_costsheetdetail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t102_costsheetdetail_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t102_costsheetdetail_list->TotalRecs > 0 && (!$t102_costsheetdetail_list->AutoHidePageSizeSelector || $t102_costsheetdetail_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t102_costsheetdetail">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t102_costsheetdetail_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t102_costsheetdetail_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t102_costsheetdetail_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if ($t102_costsheetdetail_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="ALL"<?php if ($t102_costsheetdetail->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t102_costsheetdetail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t102_costsheetdetail_list->TotalRecs == 0 && !$t102_costsheetdetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t102_costsheetdetail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t102_costsheetdetail_list->showPageFooter();
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
$t102_costsheetdetail_list->terminate();
?>