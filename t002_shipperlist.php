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
$t002_shipper_list = new t002_shipper_list();

// Run the page
$t002_shipper_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_shipper_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t002_shipper->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft002_shipperlist = currentForm = new ew.Form("ft002_shipperlist", "list");
ft002_shipperlist.formKeyCountName = '<?php echo $t002_shipper_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft002_shipperlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft002_shipperlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft002_shipperlistsrch = currentSearchForm = new ew.Form("ft002_shipperlistsrch");

// Filters
ft002_shipperlistsrch.filterList = <?php echo $t002_shipper_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
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
<?php if (!$t002_shipper->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t002_shipper_list->TotalRecs > 0 && $t002_shipper_list->ExportOptions->visible()) { ?>
<?php $t002_shipper_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_shipper_list->ImportOptions->visible()) { ?>
<?php $t002_shipper_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_shipper_list->SearchOptions->visible()) { ?>
<?php $t002_shipper_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t002_shipper_list->FilterOptions->visible()) { ?>
<?php $t002_shipper_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t002_shipper_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t002_shipper->isExport() && !$t002_shipper->CurrentAction) { ?>
<form name="ft002_shipperlistsrch" id="ft002_shipperlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t002_shipper_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft002_shipperlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t002_shipper">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t002_shipper_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t002_shipper_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t002_shipper_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t002_shipper_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t002_shipper_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t002_shipper_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t002_shipper_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t002_shipper_list->showPageHeader(); ?>
<?php
$t002_shipper_list->showMessage();
?>
<?php if ($t002_shipper_list->TotalRecs > 0 || $t002_shipper->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_shipper_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_shipper">
<form name="ft002_shipperlist" id="ft002_shipperlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t002_shipper_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t002_shipper_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_shipper">
<div id="gmp_t002_shipper" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t002_shipper_list->TotalRecs > 0 || $t002_shipper->isGridEdit()) { ?>
<table id="tbl_t002_shipperlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_shipper_list->RowType = ROWTYPE_HEADER;

// Render list options
$t002_shipper_list->renderListOptions();

// Render list options (header, left)
$t002_shipper_list->ListOptions->render("header", "left");
?>
<?php if ($t002_shipper->Name->Visible) { // Name ?>
	<?php if ($t002_shipper->sortUrl($t002_shipper->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $t002_shipper->Name->headerCellClass() ?>"><div id="elh_t002_shipper_Name" class="t002_shipper_Name"><div class="ew-table-header-caption"><?php echo $t002_shipper->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $t002_shipper->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t002_shipper->SortUrl($t002_shipper->Name) ?>',2);"><div id="elh_t002_shipper_Name" class="t002_shipper_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_shipper->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t002_shipper->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t002_shipper->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_shipper_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t002_shipper->ExportAll && $t002_shipper->isExport()) {
	$t002_shipper_list->StopRec = $t002_shipper_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t002_shipper_list->TotalRecs > $t002_shipper_list->StartRec + $t002_shipper_list->DisplayRecs - 1)
		$t002_shipper_list->StopRec = $t002_shipper_list->StartRec + $t002_shipper_list->DisplayRecs - 1;
	else
		$t002_shipper_list->StopRec = $t002_shipper_list->TotalRecs;
}
$t002_shipper_list->RecCnt = $t002_shipper_list->StartRec - 1;
if ($t002_shipper_list->Recordset && !$t002_shipper_list->Recordset->EOF) {
	$t002_shipper_list->Recordset->moveFirst();
	$selectLimit = $t002_shipper_list->UseSelectLimit;
	if (!$selectLimit && $t002_shipper_list->StartRec > 1)
		$t002_shipper_list->Recordset->move($t002_shipper_list->StartRec - 1);
} elseif (!$t002_shipper->AllowAddDeleteRow && $t002_shipper_list->StopRec == 0) {
	$t002_shipper_list->StopRec = $t002_shipper->GridAddRowCount;
}

// Initialize aggregate
$t002_shipper->RowType = ROWTYPE_AGGREGATEINIT;
$t002_shipper->resetAttributes();
$t002_shipper_list->renderRow();
while ($t002_shipper_list->RecCnt < $t002_shipper_list->StopRec) {
	$t002_shipper_list->RecCnt++;
	if ($t002_shipper_list->RecCnt >= $t002_shipper_list->StartRec) {
		$t002_shipper_list->RowCnt++;

		// Set up key count
		$t002_shipper_list->KeyCount = $t002_shipper_list->RowIndex;

		// Init row class and style
		$t002_shipper->resetAttributes();
		$t002_shipper->CssClass = "";
		if ($t002_shipper->isGridAdd()) {
		} else {
			$t002_shipper_list->loadRowValues($t002_shipper_list->Recordset); // Load row values
		}
		$t002_shipper->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t002_shipper->RowAttrs = array_merge($t002_shipper->RowAttrs, array('data-rowindex'=>$t002_shipper_list->RowCnt, 'id'=>'r' . $t002_shipper_list->RowCnt . '_t002_shipper', 'data-rowtype'=>$t002_shipper->RowType));

		// Render row
		$t002_shipper_list->renderRow();

		// Render list options
		$t002_shipper_list->renderListOptions();
?>
	<tr<?php echo $t002_shipper->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_shipper_list->ListOptions->render("body", "left", $t002_shipper_list->RowCnt);
?>
	<?php if ($t002_shipper->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $t002_shipper->Name->cellAttributes() ?>>
<span id="el<?php echo $t002_shipper_list->RowCnt ?>_t002_shipper_Name" class="t002_shipper_Name">
<span<?php echo $t002_shipper->Name->viewAttributes() ?>>
<?php echo $t002_shipper->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_shipper_list->ListOptions->render("body", "right", $t002_shipper_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t002_shipper->isGridAdd())
		$t002_shipper_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t002_shipper->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_shipper_list->Recordset)
	$t002_shipper_list->Recordset->Close();
?>
<?php if (!$t002_shipper->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t002_shipper->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t002_shipper_list->Pager)) $t002_shipper_list->Pager = new PrevNextPager($t002_shipper_list->StartRec, $t002_shipper_list->DisplayRecs, $t002_shipper_list->TotalRecs, $t002_shipper_list->AutoHidePager) ?>
<?php if ($t002_shipper_list->Pager->RecordCount > 0 && $t002_shipper_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t002_shipper_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t002_shipper_list->pageUrl() ?>start=<?php echo $t002_shipper_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t002_shipper_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t002_shipper_list->pageUrl() ?>start=<?php echo $t002_shipper_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t002_shipper_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t002_shipper_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t002_shipper_list->pageUrl() ?>start=<?php echo $t002_shipper_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t002_shipper_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t002_shipper_list->pageUrl() ?>start=<?php echo $t002_shipper_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t002_shipper_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t002_shipper_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t002_shipper_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t002_shipper_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t002_shipper_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t002_shipper_list->TotalRecs > 0 && (!$t002_shipper_list->AutoHidePageSizeSelector || $t002_shipper_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t002_shipper">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t002_shipper_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t002_shipper_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t002_shipper_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if ($t002_shipper_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="ALL"<?php if ($t002_shipper->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t002_shipper_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_shipper_list->TotalRecs == 0 && !$t002_shipper->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_shipper_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t002_shipper_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t002_shipper->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$t002_shipper->isExport()) { ?>
<script>
ew.scrollableTable("gmp_t002_shipper", "100%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t002_shipper_list->terminate();
?>