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
$t004_vendor_list = new t004_vendor_list();

// Run the page
$t004_vendor_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_vendor_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t004_vendor->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft004_vendorlist = currentForm = new ew.Form("ft004_vendorlist", "list");
ft004_vendorlist.formKeyCountName = '<?php echo $t004_vendor_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft004_vendorlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft004_vendorlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft004_vendorlistsrch = currentSearchForm = new ew.Form("ft004_vendorlistsrch");

// Filters
ft004_vendorlistsrch.filterList = <?php echo $t004_vendor_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t004_vendor->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t004_vendor_list->TotalRecs > 0 && $t004_vendor_list->ExportOptions->visible()) { ?>
<?php $t004_vendor_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_vendor_list->ImportOptions->visible()) { ?>
<?php $t004_vendor_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_vendor_list->SearchOptions->visible()) { ?>
<?php $t004_vendor_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t004_vendor_list->FilterOptions->visible()) { ?>
<?php $t004_vendor_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t004_vendor_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t004_vendor->isExport() && !$t004_vendor->CurrentAction) { ?>
<form name="ft004_vendorlistsrch" id="ft004_vendorlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t004_vendor_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft004_vendorlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t004_vendor">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t004_vendor_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t004_vendor_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t004_vendor_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t004_vendor_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t004_vendor_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t004_vendor_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t004_vendor_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t004_vendor_list->showPageHeader(); ?>
<?php
$t004_vendor_list->showMessage();
?>
<?php if ($t004_vendor_list->TotalRecs > 0 || $t004_vendor->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t004_vendor_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t004_vendor">
<form name="ft004_vendorlist" id="ft004_vendorlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t004_vendor_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t004_vendor_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_vendor">
<div id="gmp_t004_vendor" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t004_vendor_list->TotalRecs > 0 || $t004_vendor->isGridEdit()) { ?>
<table id="tbl_t004_vendorlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t004_vendor_list->RowType = ROWTYPE_HEADER;

// Render list options
$t004_vendor_list->renderListOptions();

// Render list options (header, left)
$t004_vendor_list->ListOptions->render("header", "left");
?>
<?php if ($t004_vendor->id->Visible) { // id ?>
	<?php if ($t004_vendor->sortUrl($t004_vendor->id) == "") { ?>
		<th data-name="id" class="<?php echo $t004_vendor->id->headerCellClass() ?>"><div id="elh_t004_vendor_id" class="t004_vendor_id"><div class="ew-table-header-caption"><?php echo $t004_vendor->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t004_vendor->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t004_vendor->SortUrl($t004_vendor->id) ?>',2);"><div id="elh_t004_vendor_id" class="t004_vendor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_vendor->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_vendor->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t004_vendor->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_vendor->Name->Visible) { // Name ?>
	<?php if ($t004_vendor->sortUrl($t004_vendor->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $t004_vendor->Name->headerCellClass() ?>"><div id="elh_t004_vendor_Name" class="t004_vendor_Name"><div class="ew-table-header-caption"><?php echo $t004_vendor->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $t004_vendor->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t004_vendor->SortUrl($t004_vendor->Name) ?>',2);"><div id="elh_t004_vendor_Name" class="t004_vendor_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_vendor->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t004_vendor->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t004_vendor->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t004_vendor_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t004_vendor->ExportAll && $t004_vendor->isExport()) {
	$t004_vendor_list->StopRec = $t004_vendor_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t004_vendor_list->TotalRecs > $t004_vendor_list->StartRec + $t004_vendor_list->DisplayRecs - 1)
		$t004_vendor_list->StopRec = $t004_vendor_list->StartRec + $t004_vendor_list->DisplayRecs - 1;
	else
		$t004_vendor_list->StopRec = $t004_vendor_list->TotalRecs;
}
$t004_vendor_list->RecCnt = $t004_vendor_list->StartRec - 1;
if ($t004_vendor_list->Recordset && !$t004_vendor_list->Recordset->EOF) {
	$t004_vendor_list->Recordset->moveFirst();
	$selectLimit = $t004_vendor_list->UseSelectLimit;
	if (!$selectLimit && $t004_vendor_list->StartRec > 1)
		$t004_vendor_list->Recordset->move($t004_vendor_list->StartRec - 1);
} elseif (!$t004_vendor->AllowAddDeleteRow && $t004_vendor_list->StopRec == 0) {
	$t004_vendor_list->StopRec = $t004_vendor->GridAddRowCount;
}

// Initialize aggregate
$t004_vendor->RowType = ROWTYPE_AGGREGATEINIT;
$t004_vendor->resetAttributes();
$t004_vendor_list->renderRow();
while ($t004_vendor_list->RecCnt < $t004_vendor_list->StopRec) {
	$t004_vendor_list->RecCnt++;
	if ($t004_vendor_list->RecCnt >= $t004_vendor_list->StartRec) {
		$t004_vendor_list->RowCnt++;

		// Set up key count
		$t004_vendor_list->KeyCount = $t004_vendor_list->RowIndex;

		// Init row class and style
		$t004_vendor->resetAttributes();
		$t004_vendor->CssClass = "";
		if ($t004_vendor->isGridAdd()) {
		} else {
			$t004_vendor_list->loadRowValues($t004_vendor_list->Recordset); // Load row values
		}
		$t004_vendor->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t004_vendor->RowAttrs = array_merge($t004_vendor->RowAttrs, array('data-rowindex'=>$t004_vendor_list->RowCnt, 'id'=>'r' . $t004_vendor_list->RowCnt . '_t004_vendor', 'data-rowtype'=>$t004_vendor->RowType));

		// Render row
		$t004_vendor_list->renderRow();

		// Render list options
		$t004_vendor_list->renderListOptions();
?>
	<tr<?php echo $t004_vendor->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t004_vendor_list->ListOptions->render("body", "left", $t004_vendor_list->RowCnt);
?>
	<?php if ($t004_vendor->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t004_vendor->id->cellAttributes() ?>>
<span id="el<?php echo $t004_vendor_list->RowCnt ?>_t004_vendor_id" class="t004_vendor_id">
<span<?php echo $t004_vendor->id->viewAttributes() ?>>
<?php echo $t004_vendor->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_vendor->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $t004_vendor->Name->cellAttributes() ?>>
<span id="el<?php echo $t004_vendor_list->RowCnt ?>_t004_vendor_Name" class="t004_vendor_Name">
<span<?php echo $t004_vendor->Name->viewAttributes() ?>>
<?php echo $t004_vendor->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t004_vendor_list->ListOptions->render("body", "right", $t004_vendor_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t004_vendor->isGridAdd())
		$t004_vendor_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t004_vendor->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t004_vendor_list->Recordset)
	$t004_vendor_list->Recordset->Close();
?>
<?php if (!$t004_vendor->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t004_vendor->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t004_vendor_list->Pager)) $t004_vendor_list->Pager = new PrevNextPager($t004_vendor_list->StartRec, $t004_vendor_list->DisplayRecs, $t004_vendor_list->TotalRecs, $t004_vendor_list->AutoHidePager) ?>
<?php if ($t004_vendor_list->Pager->RecordCount > 0 && $t004_vendor_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t004_vendor_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t004_vendor_list->pageUrl() ?>start=<?php echo $t004_vendor_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t004_vendor_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t004_vendor_list->pageUrl() ?>start=<?php echo $t004_vendor_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t004_vendor_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t004_vendor_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t004_vendor_list->pageUrl() ?>start=<?php echo $t004_vendor_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t004_vendor_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t004_vendor_list->pageUrl() ?>start=<?php echo $t004_vendor_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t004_vendor_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t004_vendor_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t004_vendor_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t004_vendor_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t004_vendor_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t004_vendor_list->TotalRecs > 0 && (!$t004_vendor_list->AutoHidePageSizeSelector || $t004_vendor_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t004_vendor">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t004_vendor_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t004_vendor_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t004_vendor_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if ($t004_vendor_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="ALL"<?php if ($t004_vendor->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t004_vendor_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t004_vendor_list->TotalRecs == 0 && !$t004_vendor->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t004_vendor_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t004_vendor_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t004_vendor->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t004_vendor_list->terminate();
?>