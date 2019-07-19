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
WriteHeader(FALSE, "utf-8");

// Create page object
$t102_costsheetdetail_preview = new t102_costsheetdetail_preview();

// Run the page
$t102_costsheetdetail_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_costsheetdetail_preview->Page_Render();
?>
<?php $t102_costsheetdetail_preview->showPageHeader(); ?>
<div class="card ew-grid t102_costsheetdetail"><!-- .card -->
<?php if ($t102_costsheetdetail_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$t102_costsheetdetail_preview->renderListOptions();

// Render list options (header, left)
$t102_costsheetdetail_preview->ListOptions->render("header", "left");
?>
<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
	<?php if ($t102_costsheetdetail->SortUrl($t102_costsheetdetail->chargecode_id) == "") { ?>
		<th class="<?php echo $t102_costsheetdetail->chargecode_id->headerCellClass() ?>"><?php echo $t102_costsheetdetail->chargecode_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t102_costsheetdetail->chargecode_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t102_costsheetdetail->chargecode_id->Name ?>" data-sort-order="<?php echo $t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->chargecode_id->Name && $t102_costsheetdetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->chargecode_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->chargecode_id->Name) { ?><?php if ($t102_costsheetdetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t102_costsheetdetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
	<?php if ($t102_costsheetdetail->SortUrl($t102_costsheetdetail->vendor_id) == "") { ?>
		<th class="<?php echo $t102_costsheetdetail->vendor_id->headerCellClass() ?>"><?php echo $t102_costsheetdetail->vendor_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t102_costsheetdetail->vendor_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t102_costsheetdetail->vendor_id->Name ?>" data-sort-order="<?php echo $t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->vendor_id->Name && $t102_costsheetdetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->vendor_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->vendor_id->Name) { ?><?php if ($t102_costsheetdetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t102_costsheetdetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
	<?php if ($t102_costsheetdetail->SortUrl($t102_costsheetdetail->ptl_amount) == "") { ?>
		<th class="<?php echo $t102_costsheetdetail->ptl_amount->headerCellClass() ?>"><?php echo $t102_costsheetdetail->ptl_amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t102_costsheetdetail->ptl_amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t102_costsheetdetail->ptl_amount->Name ?>" data-sort-order="<?php echo $t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->ptl_amount->Name && $t102_costsheetdetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->ptl_amount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->ptl_amount->Name) { ?><?php if ($t102_costsheetdetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t102_costsheetdetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
	<?php if ($t102_costsheetdetail->SortUrl($t102_costsheetdetail->ptl_total) == "") { ?>
		<th class="<?php echo $t102_costsheetdetail->ptl_total->headerCellClass() ?>"><?php echo $t102_costsheetdetail->ptl_total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t102_costsheetdetail->ptl_total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t102_costsheetdetail->ptl_total->Name ?>" data-sort-order="<?php echo $t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->ptl_total->Name && $t102_costsheetdetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->ptl_total->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->ptl_total->Name) { ?><?php if ($t102_costsheetdetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t102_costsheetdetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
	<?php if ($t102_costsheetdetail->SortUrl($t102_costsheetdetail->rfc_amount) == "") { ?>
		<th class="<?php echo $t102_costsheetdetail->rfc_amount->headerCellClass() ?>"><?php echo $t102_costsheetdetail->rfc_amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t102_costsheetdetail->rfc_amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t102_costsheetdetail->rfc_amount->Name ?>" data-sort-order="<?php echo $t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->rfc_amount->Name && $t102_costsheetdetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->rfc_amount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->rfc_amount->Name) { ?><?php if ($t102_costsheetdetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t102_costsheetdetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
	<?php if ($t102_costsheetdetail->SortUrl($t102_costsheetdetail->rfc_total) == "") { ?>
		<th class="<?php echo $t102_costsheetdetail->rfc_total->headerCellClass() ?>"><?php echo $t102_costsheetdetail->rfc_total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t102_costsheetdetail->rfc_total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t102_costsheetdetail->rfc_total->Name ?>" data-sort-order="<?php echo $t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->rfc_total->Name && $t102_costsheetdetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t102_costsheetdetail->rfc_total->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t102_costsheetdetail_preview->SortField == $t102_costsheetdetail->rfc_total->Name) { ?><?php if ($t102_costsheetdetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t102_costsheetdetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t102_costsheetdetail_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$t102_costsheetdetail_preview->RecCount = 0;
$t102_costsheetdetail_preview->RowCnt = 0;
while ($t102_costsheetdetail_preview->Recordset && !$t102_costsheetdetail_preview->Recordset->EOF) {

	// Init row class and style
	$t102_costsheetdetail_preview->RecCount++;
	$t102_costsheetdetail_preview->RowCnt++;
	$t102_costsheetdetail_preview->CssStyle = "";
	$t102_costsheetdetail_preview->loadListRowValues($t102_costsheetdetail_preview->Recordset);

	// Render row
	$t102_costsheetdetail_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$t102_costsheetdetail_preview->resetAttributes();
	$t102_costsheetdetail_preview->renderListRow();

	// Render list options
	$t102_costsheetdetail_preview->renderListOptions();
?>
	<tr<?php echo $t102_costsheetdetail_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_costsheetdetail_preview->ListOptions->render("body", "left", $t102_costsheetdetail_preview->RowCnt);
?>
<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
		<!-- chargecode_id -->
		<td<?php echo $t102_costsheetdetail->chargecode_id->cellAttributes() ?>>
<span<?php echo $t102_costsheetdetail->chargecode_id->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->chargecode_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
		<!-- vendor_id -->
		<td<?php echo $t102_costsheetdetail->vendor_id->cellAttributes() ?>>
<span<?php echo $t102_costsheetdetail->vendor_id->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->vendor_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
		<!-- ptl_amount -->
		<td<?php echo $t102_costsheetdetail->ptl_amount->cellAttributes() ?>>
<span<?php echo $t102_costsheetdetail->ptl_amount->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->ptl_amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
		<!-- ptl_total -->
		<td<?php echo $t102_costsheetdetail->ptl_total->cellAttributes() ?>>
<span<?php echo $t102_costsheetdetail->ptl_total->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->ptl_total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
		<!-- rfc_amount -->
		<td<?php echo $t102_costsheetdetail->rfc_amount->cellAttributes() ?>>
<span<?php echo $t102_costsheetdetail->rfc_amount->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->rfc_amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
		<!-- rfc_total -->
		<td<?php echo $t102_costsheetdetail->rfc_total->cellAttributes() ?>>
<span<?php echo $t102_costsheetdetail->rfc_total->viewAttributes() ?>>
<?php echo $t102_costsheetdetail->rfc_total->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$t102_costsheetdetail_preview->ListOptions->render("body", "right", $t102_costsheetdetail_preview->RowCnt);
?>
	</tr>
<?php
	$t102_costsheetdetail_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($t102_costsheetdetail_preview->TotalRecs > 0) { ?>
<?php if (!isset($t102_costsheetdetail_preview->Pager)) $t102_costsheetdetail_preview->Pager = new PrevNextPager($t102_costsheetdetail_preview->StartRec, $t102_costsheetdetail_preview->DisplayRecs, $t102_costsheetdetail_preview->TotalRecs) ?>
<?php if ($t102_costsheetdetail_preview->Pager->RecordCount > 0 && $t102_costsheetdetail_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($t102_costsheetdetail_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $t102_costsheetdetail_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($t102_costsheetdetail_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $t102_costsheetdetail_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($t102_costsheetdetail_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $t102_costsheetdetail_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($t102_costsheetdetail_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $t102_costsheetdetail_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t102_costsheetdetail_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t102_costsheetdetail_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t102_costsheetdetail_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($t102_costsheetdetail_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$t102_costsheetdetail_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($t102_costsheetdetail_preview->Recordset)
	$t102_costsheetdetail_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$t102_costsheetdetail_preview->terminate();
?>