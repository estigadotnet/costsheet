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
$t101_costsheethead_view = new t101_costsheethead_view();

// Run the page
$t101_costsheethead_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_costsheethead_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t101_costsheethead->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft101_costsheetheadview = currentForm = new ew.Form("ft101_costsheetheadview", "view");

// Form_CustomValidate event
ft101_costsheetheadview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_costsheetheadview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Multi-Page
ft101_costsheetheadview.multiPage = new ew.MultiPage("ft101_costsheetheadview");

// Dynamic selection lists
ft101_costsheetheadview.lists["x_liner_id"] = <?php echo $t101_costsheethead_view->liner_id->Lookup->toClientList() ?>;
ft101_costsheetheadview.lists["x_liner_id"].options = <?php echo JsonEncode($t101_costsheethead_view->liner_id->lookupOptions()) ?>;
ft101_costsheetheadview.lists["x_shipper_id"] = <?php echo $t101_costsheethead_view->shipper_id->Lookup->toClientList() ?>;
ft101_costsheetheadview.lists["x_shipper_id"].options = <?php echo JsonEncode($t101_costsheethead_view->shipper_id->lookupOptions()) ?>;
ft101_costsheetheadview.lists["x_top_1"] = <?php echo $t101_costsheethead_view->top_1->Lookup->toClientList() ?>;
ft101_costsheetheadview.lists["x_top_1"].options = <?php echo JsonEncode($t101_costsheethead_view->top_1->options(FALSE, TRUE)) ?>;
ft101_costsheetheadview.lists["x_cont"] = <?php echo $t101_costsheethead_view->cont->Lookup->toClientList() ?>;
ft101_costsheetheadview.lists["x_cont"].options = <?php echo JsonEncode($t101_costsheethead_view->cont->options(FALSE, TRUE)) ?>;
ft101_costsheetheadview.lists["x_top_2"] = <?php echo $t101_costsheethead_view->top_2->Lookup->toClientList() ?>;
ft101_costsheetheadview.lists["x_top_2"].options = <?php echo JsonEncode($t101_costsheethead_view->top_2->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t101_costsheethead->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_costsheethead_view->ExportOptions->render("body") ?>
<?php $t101_costsheethead_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_costsheethead_view->showPageHeader(); ?>
<?php
$t101_costsheethead_view->showMessage();
?>
<form name="ft101_costsheetheadview" id="ft101_costsheetheadview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_costsheethead_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_costsheethead_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_costsheethead">
<input type="hidden" name="modal" value="<?php echo (int)$t101_costsheethead_view->IsModal ?>">
<?php if (!$t101_costsheethead->isExport()) { ?>
<div class="ew-multi-page">
<div class="ew-nav-tabs" id="t101_costsheethead_view"><!-- multi-page tabs -->
	<ul class="<?php echo $t101_costsheethead_view->MultiPages->navStyle() ?>">
		<li class="nav-item"><a class="nav-link<?php echo $t101_costsheethead_view->MultiPages->pageStyle("1") ?>" href="#tab_t101_costsheethead1" data-toggle="tab"><?php echo $t101_costsheethead->pageCaption(1) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $t101_costsheethead_view->MultiPages->pageStyle("2") ?>" href="#tab_t101_costsheethead2" data-toggle="tab"><?php echo $t101_costsheethead->pageCaption(2) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $t101_costsheethead_view->MultiPages->pageStyle("3") ?>" href="#tab_t101_costsheethead3" data-toggle="tab"><?php echo $t101_costsheethead->pageCaption(3) ?></a></li>
	</ul>
	<div class="tab-content">
<?php } ?>
<?php if (!$t101_costsheethead->isExport()) { ?>
		<div class="tab-pane<?php echo $t101_costsheethead_view->MultiPages->pageStyle("1") ?>" id="tab_t101_costsheethead1"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_costsheethead->liner_id->Visible) { // liner_id ?>
	<tr id="r_liner_id">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_liner_id"><?php echo $t101_costsheethead->liner_id->caption() ?></span></td>
		<td data-name="liner_id"<?php echo $t101_costsheethead->liner_id->cellAttributes() ?>>
<span id="el_t101_costsheethead_liner_id" data-page="1">
<span<?php echo $t101_costsheethead->liner_id->viewAttributes() ?>>
<?php echo $t101_costsheethead->liner_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_costsheethead->no_bl->Visible) { // no_bl ?>
	<tr id="r_no_bl">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_no_bl"><?php echo $t101_costsheethead->no_bl->caption() ?></span></td>
		<td data-name="no_bl"<?php echo $t101_costsheethead->no_bl->cellAttributes() ?>>
<span id="el_t101_costsheethead_no_bl" data-page="1">
<span<?php echo $t101_costsheethead->no_bl->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_bl->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_costsheethead->shipper_id->Visible) { // shipper_id ?>
	<tr id="r_shipper_id">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_shipper_id"><?php echo $t101_costsheethead->shipper_id->caption() ?></span></td>
		<td data-name="shipper_id"<?php echo $t101_costsheethead->shipper_id->cellAttributes() ?>>
<span id="el_t101_costsheethead_shipper_id" data-page="1">
<span<?php echo $t101_costsheethead->shipper_id->viewAttributes() ?>>
<?php echo $t101_costsheethead->shipper_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_costsheethead->top_1->Visible) { // top_1 ?>
	<tr id="r_top_1">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_top_1"><?php echo $t101_costsheethead->top_1->caption() ?></span></td>
		<td data-name="top_1"<?php echo $t101_costsheethead->top_1->cellAttributes() ?>>
<span id="el_t101_costsheethead_top_1" data-page="1">
<span<?php echo $t101_costsheethead->top_1->viewAttributes() ?>>
<?php echo $t101_costsheethead->top_1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_costsheethead->vol->Visible) { // vol ?>
	<tr id="r_vol">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_vol"><?php echo $t101_costsheethead->vol->caption() ?></span></td>
		<td data-name="vol"<?php echo $t101_costsheethead->vol->cellAttributes() ?>>
<span id="el_t101_costsheethead_vol" data-page="1">
<span<?php echo $t101_costsheethead->vol->viewAttributes() ?>>
<?php echo $t101_costsheethead->vol->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_costsheethead->cont->Visible) { // cont ?>
	<tr id="r_cont">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_cont"><?php echo $t101_costsheethead->cont->caption() ?></span></td>
		<td data-name="cont"<?php echo $t101_costsheethead->cont->cellAttributes() ?>>
<span id="el_t101_costsheethead_cont" data-page="1">
<span<?php echo $t101_costsheethead->cont->viewAttributes() ?>>
<?php echo $t101_costsheethead->cont->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t101_costsheethead->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$t101_costsheethead->isExport()) { ?>
		<div class="tab-pane<?php echo $t101_costsheethead_view->MultiPages->pageStyle("2") ?>" id="tab_t101_costsheethead2"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_costsheethead->no_ref->Visible) { // no_ref ?>
	<tr id="r_no_ref">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_no_ref"><?php echo $t101_costsheethead->no_ref->caption() ?></span></td>
		<td data-name="no_ref"<?php echo $t101_costsheethead->no_ref->cellAttributes() ?>>
<span id="el_t101_costsheethead_no_ref" data-page="2">
<span<?php echo $t101_costsheethead->no_ref->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_ref->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_costsheethead->vsl_voy->Visible) { // vsl_voy ?>
	<tr id="r_vsl_voy">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_vsl_voy"><?php echo $t101_costsheethead->vsl_voy->caption() ?></span></td>
		<td data-name="vsl_voy"<?php echo $t101_costsheethead->vsl_voy->cellAttributes() ?>>
<span id="el_t101_costsheethead_vsl_voy" data-page="2">
<span<?php echo $t101_costsheethead->vsl_voy->viewAttributes() ?>>
<?php echo $t101_costsheethead->vsl_voy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_costsheethead->pol_pod->Visible) { // pol_pod ?>
	<tr id="r_pol_pod">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_pol_pod"><?php echo $t101_costsheethead->pol_pod->caption() ?></span></td>
		<td data-name="pol_pod"<?php echo $t101_costsheethead->pol_pod->cellAttributes() ?>>
<span id="el_t101_costsheethead_pol_pod" data-page="2">
<span<?php echo $t101_costsheethead->pol_pod->viewAttributes() ?>>
<?php echo $t101_costsheethead->pol_pod->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_costsheethead->top_2->Visible) { // top_2 ?>
	<tr id="r_top_2">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_top_2"><?php echo $t101_costsheethead->top_2->caption() ?></span></td>
		<td data-name="top_2"<?php echo $t101_costsheethead->top_2->cellAttributes() ?>>
<span id="el_t101_costsheethead_top_2" data-page="2">
<span<?php echo $t101_costsheethead->top_2->viewAttributes() ?>>
<?php echo $t101_costsheethead->top_2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_costsheethead->no_cont->Visible) { // no_cont ?>
	<tr id="r_no_cont">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_no_cont"><?php echo $t101_costsheethead->no_cont->caption() ?></span></td>
		<td data-name="no_cont"<?php echo $t101_costsheethead->no_cont->cellAttributes() ?>>
<span id="el_t101_costsheethead_no_cont" data-page="2">
<span<?php echo $t101_costsheethead->no_cont->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_cont->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t101_costsheethead->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$t101_costsheethead->isExport()) { ?>
		<div class="tab-pane<?php echo $t101_costsheethead_view->MultiPages->pageStyle("3") ?>" id="tab_t101_costsheethead3"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_costsheethead->cs_date->Visible) { // cs_date ?>
	<tr id="r_cs_date">
		<td class="<?php echo $t101_costsheethead_view->TableLeftColumnClass ?>"><span id="elh_t101_costsheethead_cs_date"><?php echo $t101_costsheethead->cs_date->caption() ?></span></td>
		<td data-name="cs_date"<?php echo $t101_costsheethead->cs_date->cellAttributes() ?>>
<span id="el_t101_costsheethead_cs_date" data-page="3">
<span<?php echo $t101_costsheethead->cs_date->viewAttributes() ?>>
<?php echo $t101_costsheethead->cs_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t101_costsheethead->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$t101_costsheethead->isExport()) { ?>
	</div>
</div>
</div>
<?php } ?>
<?php
	if (in_array("t102_costsheetdetail", explode(",", $t101_costsheethead->getCurrentDetailTable())) && $t102_costsheetdetail->DetailView) {
?>
<?php if ($t101_costsheethead->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t102_costsheetdetail", "TblCaption") ?>&nbsp;<?php echo str_replace("%c", $t101_costsheethead_view->t102_costsheetdetail_Count, $Language->phrase("DetailCount")) ?></h4>
<?php } ?>
<?php include_once "t102_costsheetdetailgrid.php" ?>
<?php } ?>
</form>
<?php
$t101_costsheethead_view->showPageFooter();
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
$t101_costsheethead_view->terminate();
?>