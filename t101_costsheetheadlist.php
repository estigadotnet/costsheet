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
$t101_costsheethead_list = new t101_costsheethead_list();

// Run the page
$t101_costsheethead_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_costsheethead_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t101_costsheethead->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft101_costsheetheadlist = currentForm = new ew.Form("ft101_costsheetheadlist", "list");
ft101_costsheetheadlist.formKeyCountName = '<?php echo $t101_costsheethead_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft101_costsheetheadlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_costsheetheadlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_costsheetheadlist.lists["x_liner_id"] = <?php echo $t101_costsheethead_list->liner_id->Lookup->toClientList() ?>;
ft101_costsheetheadlist.lists["x_liner_id"].options = <?php echo JsonEncode($t101_costsheethead_list->liner_id->lookupOptions()) ?>;
ft101_costsheetheadlist.lists["x_shipper_id"] = <?php echo $t101_costsheethead_list->shipper_id->Lookup->toClientList() ?>;
ft101_costsheetheadlist.lists["x_shipper_id"].options = <?php echo JsonEncode($t101_costsheethead_list->shipper_id->lookupOptions()) ?>;
ft101_costsheetheadlist.lists["x_top_1"] = <?php echo $t101_costsheethead_list->top_1->Lookup->toClientList() ?>;
ft101_costsheetheadlist.lists["x_top_1"].options = <?php echo JsonEncode($t101_costsheethead_list->top_1->options(FALSE, TRUE)) ?>;
ft101_costsheetheadlist.lists["x_cont"] = <?php echo $t101_costsheethead_list->cont->Lookup->toClientList() ?>;
ft101_costsheetheadlist.lists["x_cont"].options = <?php echo JsonEncode($t101_costsheethead_list->cont->options(FALSE, TRUE)) ?>;
ft101_costsheetheadlist.lists["x_top_2"] = <?php echo $t101_costsheethead_list->top_2->Lookup->toClientList() ?>;
ft101_costsheetheadlist.lists["x_top_2"].options = <?php echo JsonEncode($t101_costsheethead_list->top_2->options(FALSE, TRUE)) ?>;

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
<?php if (!$t101_costsheethead->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t101_costsheethead_list->TotalRecs > 0 && $t101_costsheethead_list->ExportOptions->visible()) { ?>
<?php $t101_costsheethead_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_costsheethead_list->ImportOptions->visible()) { ?>
<?php $t101_costsheethead_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t101_costsheethead_list->renderOtherOptions();
?>
<?php $t101_costsheethead_list->showPageHeader(); ?>
<?php
$t101_costsheethead_list->showMessage();
?>
<?php if ($t101_costsheethead_list->TotalRecs > 0 || $t101_costsheethead->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_costsheethead_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_costsheethead">
<form name="ft101_costsheetheadlist" id="ft101_costsheetheadlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_costsheethead_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_costsheethead_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_costsheethead">
<div id="gmp_t101_costsheethead" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t101_costsheethead_list->TotalRecs > 0 || $t101_costsheethead->isGridEdit()) { ?>
<table id="tbl_t101_costsheetheadlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_costsheethead_list->RowType = ROWTYPE_HEADER;

// Render list options
$t101_costsheethead_list->renderListOptions();

// Render list options (header, left)
$t101_costsheethead_list->ListOptions->render("header", "left");
?>
<?php if ($t101_costsheethead->liner_id->Visible) { // liner_id ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->liner_id) == "") { ?>
		<th data-name="liner_id" class="<?php echo $t101_costsheethead->liner_id->headerCellClass() ?>"><div id="elh_t101_costsheethead_liner_id" class="t101_costsheethead_liner_id"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->liner_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="liner_id" class="<?php echo $t101_costsheethead->liner_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->liner_id) ?>',2);"><div id="elh_t101_costsheethead_liner_id" class="t101_costsheethead_liner_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->liner_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->liner_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->liner_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_costsheethead->no_bl->Visible) { // no_bl ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->no_bl) == "") { ?>
		<th data-name="no_bl" class="<?php echo $t101_costsheethead->no_bl->headerCellClass() ?>"><div id="elh_t101_costsheethead_no_bl" class="t101_costsheethead_no_bl"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->no_bl->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="no_bl" class="<?php echo $t101_costsheethead->no_bl->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->no_bl) ?>',2);"><div id="elh_t101_costsheethead_no_bl" class="t101_costsheethead_no_bl">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->no_bl->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->no_bl->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->no_bl->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_costsheethead->shipper_id->Visible) { // shipper_id ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->shipper_id) == "") { ?>
		<th data-name="shipper_id" class="<?php echo $t101_costsheethead->shipper_id->headerCellClass() ?>"><div id="elh_t101_costsheethead_shipper_id" class="t101_costsheethead_shipper_id"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->shipper_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="shipper_id" class="<?php echo $t101_costsheethead->shipper_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->shipper_id) ?>',2);"><div id="elh_t101_costsheethead_shipper_id" class="t101_costsheethead_shipper_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->shipper_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->shipper_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->shipper_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_costsheethead->top_1->Visible) { // top_1 ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->top_1) == "") { ?>
		<th data-name="top_1" class="<?php echo $t101_costsheethead->top_1->headerCellClass() ?>"><div id="elh_t101_costsheethead_top_1" class="t101_costsheethead_top_1"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->top_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="top_1" class="<?php echo $t101_costsheethead->top_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->top_1) ?>',2);"><div id="elh_t101_costsheethead_top_1" class="t101_costsheethead_top_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->top_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->top_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->top_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_costsheethead->vol->Visible) { // vol ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->vol) == "") { ?>
		<th data-name="vol" class="<?php echo $t101_costsheethead->vol->headerCellClass() ?>"><div id="elh_t101_costsheethead_vol" class="t101_costsheethead_vol"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->vol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vol" class="<?php echo $t101_costsheethead->vol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->vol) ?>',2);"><div id="elh_t101_costsheethead_vol" class="t101_costsheethead_vol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->vol->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->vol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->vol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_costsheethead->cont->Visible) { // cont ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->cont) == "") { ?>
		<th data-name="cont" class="<?php echo $t101_costsheethead->cont->headerCellClass() ?>"><div id="elh_t101_costsheethead_cont" class="t101_costsheethead_cont"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->cont->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cont" class="<?php echo $t101_costsheethead->cont->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->cont) ?>',2);"><div id="elh_t101_costsheethead_cont" class="t101_costsheethead_cont">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->cont->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->cont->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->cont->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_costsheethead->no_ref->Visible) { // no_ref ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->no_ref) == "") { ?>
		<th data-name="no_ref" class="<?php echo $t101_costsheethead->no_ref->headerCellClass() ?>"><div id="elh_t101_costsheethead_no_ref" class="t101_costsheethead_no_ref"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->no_ref->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="no_ref" class="<?php echo $t101_costsheethead->no_ref->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->no_ref) ?>',2);"><div id="elh_t101_costsheethead_no_ref" class="t101_costsheethead_no_ref">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->no_ref->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->no_ref->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->no_ref->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_costsheethead->vsl_voy->Visible) { // vsl_voy ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->vsl_voy) == "") { ?>
		<th data-name="vsl_voy" class="<?php echo $t101_costsheethead->vsl_voy->headerCellClass() ?>"><div id="elh_t101_costsheethead_vsl_voy" class="t101_costsheethead_vsl_voy"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->vsl_voy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vsl_voy" class="<?php echo $t101_costsheethead->vsl_voy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->vsl_voy) ?>',2);"><div id="elh_t101_costsheethead_vsl_voy" class="t101_costsheethead_vsl_voy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->vsl_voy->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->vsl_voy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->vsl_voy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_costsheethead->pol_pod->Visible) { // pol_pod ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->pol_pod) == "") { ?>
		<th data-name="pol_pod" class="<?php echo $t101_costsheethead->pol_pod->headerCellClass() ?>"><div id="elh_t101_costsheethead_pol_pod" class="t101_costsheethead_pol_pod"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->pol_pod->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pol_pod" class="<?php echo $t101_costsheethead->pol_pod->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->pol_pod) ?>',2);"><div id="elh_t101_costsheethead_pol_pod" class="t101_costsheethead_pol_pod">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->pol_pod->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->pol_pod->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->pol_pod->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_costsheethead->top_2->Visible) { // top_2 ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->top_2) == "") { ?>
		<th data-name="top_2" class="<?php echo $t101_costsheethead->top_2->headerCellClass() ?>"><div id="elh_t101_costsheethead_top_2" class="t101_costsheethead_top_2"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->top_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="top_2" class="<?php echo $t101_costsheethead->top_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->top_2) ?>',2);"><div id="elh_t101_costsheethead_top_2" class="t101_costsheethead_top_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->top_2->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->top_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->top_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_costsheethead->no_cont->Visible) { // no_cont ?>
	<?php if ($t101_costsheethead->sortUrl($t101_costsheethead->no_cont) == "") { ?>
		<th data-name="no_cont" class="<?php echo $t101_costsheethead->no_cont->headerCellClass() ?>"><div id="elh_t101_costsheethead_no_cont" class="t101_costsheethead_no_cont"><div class="ew-table-header-caption"><?php echo $t101_costsheethead->no_cont->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="no_cont" class="<?php echo $t101_costsheethead->no_cont->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_costsheethead->SortUrl($t101_costsheethead->no_cont) ?>',2);"><div id="elh_t101_costsheethead_no_cont" class="t101_costsheethead_no_cont">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_costsheethead->no_cont->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_costsheethead->no_cont->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_costsheethead->no_cont->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_costsheethead_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t101_costsheethead->ExportAll && $t101_costsheethead->isExport()) {
	$t101_costsheethead_list->StopRec = $t101_costsheethead_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t101_costsheethead_list->TotalRecs > $t101_costsheethead_list->StartRec + $t101_costsheethead_list->DisplayRecs - 1)
		$t101_costsheethead_list->StopRec = $t101_costsheethead_list->StartRec + $t101_costsheethead_list->DisplayRecs - 1;
	else
		$t101_costsheethead_list->StopRec = $t101_costsheethead_list->TotalRecs;
}
$t101_costsheethead_list->RecCnt = $t101_costsheethead_list->StartRec - 1;
if ($t101_costsheethead_list->Recordset && !$t101_costsheethead_list->Recordset->EOF) {
	$t101_costsheethead_list->Recordset->moveFirst();
	$selectLimit = $t101_costsheethead_list->UseSelectLimit;
	if (!$selectLimit && $t101_costsheethead_list->StartRec > 1)
		$t101_costsheethead_list->Recordset->move($t101_costsheethead_list->StartRec - 1);
} elseif (!$t101_costsheethead->AllowAddDeleteRow && $t101_costsheethead_list->StopRec == 0) {
	$t101_costsheethead_list->StopRec = $t101_costsheethead->GridAddRowCount;
}

// Initialize aggregate
$t101_costsheethead->RowType = ROWTYPE_AGGREGATEINIT;
$t101_costsheethead->resetAttributes();
$t101_costsheethead_list->renderRow();
while ($t101_costsheethead_list->RecCnt < $t101_costsheethead_list->StopRec) {
	$t101_costsheethead_list->RecCnt++;
	if ($t101_costsheethead_list->RecCnt >= $t101_costsheethead_list->StartRec) {
		$t101_costsheethead_list->RowCnt++;

		// Set up key count
		$t101_costsheethead_list->KeyCount = $t101_costsheethead_list->RowIndex;

		// Init row class and style
		$t101_costsheethead->resetAttributes();
		$t101_costsheethead->CssClass = "";
		if ($t101_costsheethead->isGridAdd()) {
		} else {
			$t101_costsheethead_list->loadRowValues($t101_costsheethead_list->Recordset); // Load row values
		}
		$t101_costsheethead->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t101_costsheethead->RowAttrs = array_merge($t101_costsheethead->RowAttrs, array('data-rowindex'=>$t101_costsheethead_list->RowCnt, 'id'=>'r' . $t101_costsheethead_list->RowCnt . '_t101_costsheethead', 'data-rowtype'=>$t101_costsheethead->RowType));

		// Render row
		$t101_costsheethead_list->renderRow();

		// Render list options
		$t101_costsheethead_list->renderListOptions();
?>
	<tr<?php echo $t101_costsheethead->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_costsheethead_list->ListOptions->render("body", "left", $t101_costsheethead_list->RowCnt);
?>
	<?php if ($t101_costsheethead->liner_id->Visible) { // liner_id ?>
		<td data-name="liner_id"<?php echo $t101_costsheethead->liner_id->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_liner_id" class="t101_costsheethead_liner_id">
<span<?php echo $t101_costsheethead->liner_id->viewAttributes() ?>>
<?php echo $t101_costsheethead->liner_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_costsheethead->no_bl->Visible) { // no_bl ?>
		<td data-name="no_bl"<?php echo $t101_costsheethead->no_bl->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_no_bl" class="t101_costsheethead_no_bl">
<span<?php echo $t101_costsheethead->no_bl->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_bl->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_costsheethead->shipper_id->Visible) { // shipper_id ?>
		<td data-name="shipper_id"<?php echo $t101_costsheethead->shipper_id->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_shipper_id" class="t101_costsheethead_shipper_id">
<span<?php echo $t101_costsheethead->shipper_id->viewAttributes() ?>>
<?php echo $t101_costsheethead->shipper_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_costsheethead->top_1->Visible) { // top_1 ?>
		<td data-name="top_1"<?php echo $t101_costsheethead->top_1->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_top_1" class="t101_costsheethead_top_1">
<span<?php echo $t101_costsheethead->top_1->viewAttributes() ?>>
<?php echo $t101_costsheethead->top_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_costsheethead->vol->Visible) { // vol ?>
		<td data-name="vol"<?php echo $t101_costsheethead->vol->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_vol" class="t101_costsheethead_vol">
<span<?php echo $t101_costsheethead->vol->viewAttributes() ?>>
<?php echo $t101_costsheethead->vol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_costsheethead->cont->Visible) { // cont ?>
		<td data-name="cont"<?php echo $t101_costsheethead->cont->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_cont" class="t101_costsheethead_cont">
<span<?php echo $t101_costsheethead->cont->viewAttributes() ?>>
<?php echo $t101_costsheethead->cont->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_costsheethead->no_ref->Visible) { // no_ref ?>
		<td data-name="no_ref"<?php echo $t101_costsheethead->no_ref->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_no_ref" class="t101_costsheethead_no_ref">
<span<?php echo $t101_costsheethead->no_ref->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_ref->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_costsheethead->vsl_voy->Visible) { // vsl_voy ?>
		<td data-name="vsl_voy"<?php echo $t101_costsheethead->vsl_voy->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_vsl_voy" class="t101_costsheethead_vsl_voy">
<span<?php echo $t101_costsheethead->vsl_voy->viewAttributes() ?>>
<?php echo $t101_costsheethead->vsl_voy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_costsheethead->pol_pod->Visible) { // pol_pod ?>
		<td data-name="pol_pod"<?php echo $t101_costsheethead->pol_pod->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_pol_pod" class="t101_costsheethead_pol_pod">
<span<?php echo $t101_costsheethead->pol_pod->viewAttributes() ?>>
<?php echo $t101_costsheethead->pol_pod->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_costsheethead->top_2->Visible) { // top_2 ?>
		<td data-name="top_2"<?php echo $t101_costsheethead->top_2->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_top_2" class="t101_costsheethead_top_2">
<span<?php echo $t101_costsheethead->top_2->viewAttributes() ?>>
<?php echo $t101_costsheethead->top_2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_costsheethead->no_cont->Visible) { // no_cont ?>
		<td data-name="no_cont"<?php echo $t101_costsheethead->no_cont->cellAttributes() ?>>
<span id="el<?php echo $t101_costsheethead_list->RowCnt ?>_t101_costsheethead_no_cont" class="t101_costsheethead_no_cont">
<span<?php echo $t101_costsheethead->no_cont->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_cont->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_costsheethead_list->ListOptions->render("body", "right", $t101_costsheethead_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t101_costsheethead->isGridAdd())
		$t101_costsheethead_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t101_costsheethead->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t101_costsheethead_list->Recordset)
	$t101_costsheethead_list->Recordset->Close();
?>
<?php if (!$t101_costsheethead->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t101_costsheethead->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t101_costsheethead_list->Pager)) $t101_costsheethead_list->Pager = new PrevNextPager($t101_costsheethead_list->StartRec, $t101_costsheethead_list->DisplayRecs, $t101_costsheethead_list->TotalRecs, $t101_costsheethead_list->AutoHidePager) ?>
<?php if ($t101_costsheethead_list->Pager->RecordCount > 0 && $t101_costsheethead_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t101_costsheethead_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t101_costsheethead_list->pageUrl() ?>start=<?php echo $t101_costsheethead_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t101_costsheethead_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t101_costsheethead_list->pageUrl() ?>start=<?php echo $t101_costsheethead_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t101_costsheethead_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t101_costsheethead_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t101_costsheethead_list->pageUrl() ?>start=<?php echo $t101_costsheethead_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t101_costsheethead_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t101_costsheethead_list->pageUrl() ?>start=<?php echo $t101_costsheethead_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t101_costsheethead_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t101_costsheethead_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t101_costsheethead_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t101_costsheethead_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t101_costsheethead_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t101_costsheethead_list->TotalRecs > 0 && (!$t101_costsheethead_list->AutoHidePageSizeSelector || $t101_costsheethead_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t101_costsheethead">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t101_costsheethead_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t101_costsheethead_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t101_costsheethead_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if ($t101_costsheethead_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="ALL"<?php if ($t101_costsheethead->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_costsheethead_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_costsheethead_list->TotalRecs == 0 && !$t101_costsheethead->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_costsheethead_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_costsheethead_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t101_costsheethead->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t101_costsheethead_list->terminate();
?>