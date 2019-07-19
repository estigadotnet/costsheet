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
$t003_chargecode_list = new t003_chargecode_list();

// Run the page
$t003_chargecode_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_chargecode_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t003_chargecode->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft003_chargecodelist = currentForm = new ew.Form("ft003_chargecodelist", "list");
ft003_chargecodelist.formKeyCountName = '<?php echo $t003_chargecode_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft003_chargecodelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft003_chargecodelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft003_chargecodelistsrch = currentSearchForm = new ew.Form("ft003_chargecodelistsrch");

// Filters
ft003_chargecodelistsrch.filterList = <?php echo $t003_chargecode_list->getFilterList() ?>;
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
<?php if (!$t003_chargecode->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t003_chargecode_list->TotalRecs > 0 && $t003_chargecode_list->ExportOptions->visible()) { ?>
<?php $t003_chargecode_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t003_chargecode_list->ImportOptions->visible()) { ?>
<?php $t003_chargecode_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t003_chargecode_list->SearchOptions->visible()) { ?>
<?php $t003_chargecode_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t003_chargecode_list->FilterOptions->visible()) { ?>
<?php $t003_chargecode_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t003_chargecode_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t003_chargecode->isExport() && !$t003_chargecode->CurrentAction) { ?>
<form name="ft003_chargecodelistsrch" id="ft003_chargecodelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t003_chargecode_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft003_chargecodelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t003_chargecode">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t003_chargecode_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t003_chargecode_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t003_chargecode_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t003_chargecode_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t003_chargecode_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t003_chargecode_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t003_chargecode_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t003_chargecode_list->showPageHeader(); ?>
<?php
$t003_chargecode_list->showMessage();
?>
<?php if ($t003_chargecode_list->TotalRecs > 0 || $t003_chargecode->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t003_chargecode_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t003_chargecode">
<form name="ft003_chargecodelist" id="ft003_chargecodelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t003_chargecode_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t003_chargecode_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_chargecode">
<div id="gmp_t003_chargecode" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t003_chargecode_list->TotalRecs > 0 || $t003_chargecode->isGridEdit()) { ?>
<table id="tbl_t003_chargecodelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t003_chargecode_list->RowType = ROWTYPE_HEADER;

// Render list options
$t003_chargecode_list->renderListOptions();

// Render list options (header, left)
$t003_chargecode_list->ListOptions->render("header", "left");
?>
<?php if ($t003_chargecode->Charge_Code->Visible) { // Charge_Code ?>
	<?php if ($t003_chargecode->sortUrl($t003_chargecode->Charge_Code) == "") { ?>
		<th data-name="Charge_Code" class="<?php echo $t003_chargecode->Charge_Code->headerCellClass() ?>"><div id="elh_t003_chargecode_Charge_Code" class="t003_chargecode_Charge_Code"><div class="ew-table-header-caption"><?php echo $t003_chargecode->Charge_Code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Charge_Code" class="<?php echo $t003_chargecode->Charge_Code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t003_chargecode->SortUrl($t003_chargecode->Charge_Code) ?>',2);"><div id="elh_t003_chargecode_Charge_Code" class="t003_chargecode_Charge_Code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t003_chargecode->Charge_Code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t003_chargecode->Charge_Code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t003_chargecode->Charge_Code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t003_chargecode_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t003_chargecode->ExportAll && $t003_chargecode->isExport()) {
	$t003_chargecode_list->StopRec = $t003_chargecode_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t003_chargecode_list->TotalRecs > $t003_chargecode_list->StartRec + $t003_chargecode_list->DisplayRecs - 1)
		$t003_chargecode_list->StopRec = $t003_chargecode_list->StartRec + $t003_chargecode_list->DisplayRecs - 1;
	else
		$t003_chargecode_list->StopRec = $t003_chargecode_list->TotalRecs;
}
$t003_chargecode_list->RecCnt = $t003_chargecode_list->StartRec - 1;
if ($t003_chargecode_list->Recordset && !$t003_chargecode_list->Recordset->EOF) {
	$t003_chargecode_list->Recordset->moveFirst();
	$selectLimit = $t003_chargecode_list->UseSelectLimit;
	if (!$selectLimit && $t003_chargecode_list->StartRec > 1)
		$t003_chargecode_list->Recordset->move($t003_chargecode_list->StartRec - 1);
} elseif (!$t003_chargecode->AllowAddDeleteRow && $t003_chargecode_list->StopRec == 0) {
	$t003_chargecode_list->StopRec = $t003_chargecode->GridAddRowCount;
}

// Initialize aggregate
$t003_chargecode->RowType = ROWTYPE_AGGREGATEINIT;
$t003_chargecode->resetAttributes();
$t003_chargecode_list->renderRow();
while ($t003_chargecode_list->RecCnt < $t003_chargecode_list->StopRec) {
	$t003_chargecode_list->RecCnt++;
	if ($t003_chargecode_list->RecCnt >= $t003_chargecode_list->StartRec) {
		$t003_chargecode_list->RowCnt++;

		// Set up key count
		$t003_chargecode_list->KeyCount = $t003_chargecode_list->RowIndex;

		// Init row class and style
		$t003_chargecode->resetAttributes();
		$t003_chargecode->CssClass = "";
		if ($t003_chargecode->isGridAdd()) {
		} else {
			$t003_chargecode_list->loadRowValues($t003_chargecode_list->Recordset); // Load row values
		}
		$t003_chargecode->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t003_chargecode->RowAttrs = array_merge($t003_chargecode->RowAttrs, array('data-rowindex'=>$t003_chargecode_list->RowCnt, 'id'=>'r' . $t003_chargecode_list->RowCnt . '_t003_chargecode', 'data-rowtype'=>$t003_chargecode->RowType));

		// Render row
		$t003_chargecode_list->renderRow();

		// Render list options
		$t003_chargecode_list->renderListOptions();
?>
	<tr<?php echo $t003_chargecode->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t003_chargecode_list->ListOptions->render("body", "left", $t003_chargecode_list->RowCnt);
?>
	<?php if ($t003_chargecode->Charge_Code->Visible) { // Charge_Code ?>
		<td data-name="Charge_Code"<?php echo $t003_chargecode->Charge_Code->cellAttributes() ?>>
<span id="el<?php echo $t003_chargecode_list->RowCnt ?>_t003_chargecode_Charge_Code" class="t003_chargecode_Charge_Code">
<span<?php echo $t003_chargecode->Charge_Code->viewAttributes() ?>>
<?php echo $t003_chargecode->Charge_Code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t003_chargecode_list->ListOptions->render("body", "right", $t003_chargecode_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t003_chargecode->isGridAdd())
		$t003_chargecode_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t003_chargecode->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t003_chargecode_list->Recordset)
	$t003_chargecode_list->Recordset->Close();
?>
<?php if (!$t003_chargecode->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t003_chargecode->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t003_chargecode_list->Pager)) $t003_chargecode_list->Pager = new PrevNextPager($t003_chargecode_list->StartRec, $t003_chargecode_list->DisplayRecs, $t003_chargecode_list->TotalRecs, $t003_chargecode_list->AutoHidePager) ?>
<?php if ($t003_chargecode_list->Pager->RecordCount > 0 && $t003_chargecode_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t003_chargecode_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t003_chargecode_list->pageUrl() ?>start=<?php echo $t003_chargecode_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t003_chargecode_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t003_chargecode_list->pageUrl() ?>start=<?php echo $t003_chargecode_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t003_chargecode_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t003_chargecode_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t003_chargecode_list->pageUrl() ?>start=<?php echo $t003_chargecode_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t003_chargecode_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t003_chargecode_list->pageUrl() ?>start=<?php echo $t003_chargecode_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t003_chargecode_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t003_chargecode_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t003_chargecode_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t003_chargecode_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t003_chargecode_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t003_chargecode_list->TotalRecs > 0 && (!$t003_chargecode_list->AutoHidePageSizeSelector || $t003_chargecode_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t003_chargecode">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t003_chargecode_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t003_chargecode_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t003_chargecode_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if ($t003_chargecode_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="ALL"<?php if ($t003_chargecode->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t003_chargecode_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t003_chargecode_list->TotalRecs == 0 && !$t003_chargecode->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t003_chargecode_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t003_chargecode_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t003_chargecode->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$t003_chargecode->isExport()) { ?>
<script>
ew.scrollableTable("gmp_t003_chargecode", "100%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t003_chargecode_list->terminate();
?>