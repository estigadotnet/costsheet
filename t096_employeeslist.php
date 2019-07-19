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
$t096_employees_list = new t096_employees_list();

// Run the page
$t096_employees_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t096_employees_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t096_employees->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft096_employeeslist = currentForm = new ew.Form("ft096_employeeslist", "list");
ft096_employeeslist.formKeyCountName = '<?php echo $t096_employees_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft096_employeeslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft096_employeeslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft096_employeeslist.lists["x_UserLevel"] = <?php echo $t096_employees_list->UserLevel->Lookup->toClientList() ?>;
ft096_employeeslist.lists["x_UserLevel"].options = <?php echo JsonEncode($t096_employees_list->UserLevel->lookupOptions()) ?>;
ft096_employeeslist.lists["x_Activated[]"] = <?php echo $t096_employees_list->Activated->Lookup->toClientList() ?>;
ft096_employeeslist.lists["x_Activated[]"].options = <?php echo JsonEncode($t096_employees_list->Activated->options(FALSE, TRUE)) ?>;

// Form object for search
var ft096_employeeslistsrch = currentSearchForm = new ew.Form("ft096_employeeslistsrch");

// Validate function for search
ft096_employeeslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
ft096_employeeslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft096_employeeslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft096_employeeslistsrch.lists["x_Activated[]"] = <?php echo $t096_employees_list->Activated->Lookup->toClientList() ?>;
ft096_employeeslistsrch.lists["x_Activated[]"].options = <?php echo JsonEncode($t096_employees_list->Activated->options(FALSE, TRUE)) ?>;

// Filters
ft096_employeeslistsrch.filterList = <?php echo $t096_employees_list->getFilterList() ?>;
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
<?php if (!$t096_employees->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t096_employees_list->TotalRecs > 0 && $t096_employees_list->ExportOptions->visible()) { ?>
<?php $t096_employees_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t096_employees_list->ImportOptions->visible()) { ?>
<?php $t096_employees_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t096_employees_list->SearchOptions->visible()) { ?>
<?php $t096_employees_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t096_employees_list->FilterOptions->visible()) { ?>
<?php $t096_employees_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t096_employees_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t096_employees->isExport() && !$t096_employees->CurrentAction) { ?>
<form name="ft096_employeeslistsrch" id="ft096_employeeslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t096_employees_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft096_employeeslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t096_employees">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$t096_employees_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t096_employees->RowType = ROWTYPE_SEARCH;

// Render row
$t096_employees->resetAttributes();
$t096_employees_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($t096_employees->Activated->Visible) { // Activated ?>
	<div id="xsc_Activated" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $t096_employees->Activated->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Activated" id="z_Activated" value="="></span>
		<span class="ew-search-field">
<?php
$selwrk = (ConvertToBool($t096_employees->Activated->AdvancedSearch->SearchValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t096_employees" data-field="x_Activated" name="x_Activated[]" id="x_Activated[]" value="1"<?php echo $selwrk ?><?php echo $t096_employees->Activated->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t096_employees_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t096_employees_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t096_employees_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t096_employees_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t096_employees_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t096_employees_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t096_employees_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t096_employees_list->showPageHeader(); ?>
<?php
$t096_employees_list->showMessage();
?>
<?php if ($t096_employees_list->TotalRecs > 0 || $t096_employees->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t096_employees_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t096_employees">
<form name="ft096_employeeslist" id="ft096_employeeslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t096_employees_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t096_employees_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t096_employees">
<div id="gmp_t096_employees" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t096_employees_list->TotalRecs > 0 || $t096_employees->isGridEdit()) { ?>
<table id="tbl_t096_employeeslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t096_employees_list->RowType = ROWTYPE_HEADER;

// Render list options
$t096_employees_list->renderListOptions();

// Render list options (header, left)
$t096_employees_list->ListOptions->render("header", "left");
?>
<?php if ($t096_employees->EmployeeID->Visible) { // EmployeeID ?>
	<?php if ($t096_employees->sortUrl($t096_employees->EmployeeID) == "") { ?>
		<th data-name="EmployeeID" class="<?php echo $t096_employees->EmployeeID->headerCellClass() ?>"><div id="elh_t096_employees_EmployeeID" class="t096_employees_EmployeeID"><div class="ew-table-header-caption"><?php echo $t096_employees->EmployeeID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmployeeID" class="<?php echo $t096_employees->EmployeeID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->EmployeeID) ?>',2);"><div id="elh_t096_employees_EmployeeID" class="t096_employees_EmployeeID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->EmployeeID->caption() ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->EmployeeID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->EmployeeID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->LastName->Visible) { // LastName ?>
	<?php if ($t096_employees->sortUrl($t096_employees->LastName) == "") { ?>
		<th data-name="LastName" class="<?php echo $t096_employees->LastName->headerCellClass() ?>"><div id="elh_t096_employees_LastName" class="t096_employees_LastName"><div class="ew-table-header-caption"><?php echo $t096_employees->LastName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastName" class="<?php echo $t096_employees->LastName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->LastName) ?>',2);"><div id="elh_t096_employees_LastName" class="t096_employees_LastName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->LastName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->LastName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->LastName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->FirstName->Visible) { // FirstName ?>
	<?php if ($t096_employees->sortUrl($t096_employees->FirstName) == "") { ?>
		<th data-name="FirstName" class="<?php echo $t096_employees->FirstName->headerCellClass() ?>"><div id="elh_t096_employees_FirstName" class="t096_employees_FirstName"><div class="ew-table-header-caption"><?php echo $t096_employees->FirstName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FirstName" class="<?php echo $t096_employees->FirstName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->FirstName) ?>',2);"><div id="elh_t096_employees_FirstName" class="t096_employees_FirstName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->FirstName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->FirstName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->FirstName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->Title->Visible) { // Title ?>
	<?php if ($t096_employees->sortUrl($t096_employees->Title) == "") { ?>
		<th data-name="Title" class="<?php echo $t096_employees->Title->headerCellClass() ?>"><div id="elh_t096_employees_Title" class="t096_employees_Title"><div class="ew-table-header-caption"><?php echo $t096_employees->Title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Title" class="<?php echo $t096_employees->Title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->Title) ?>',2);"><div id="elh_t096_employees_Title" class="t096_employees_Title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->Title->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->Title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->Title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
	<?php if ($t096_employees->sortUrl($t096_employees->TitleOfCourtesy) == "") { ?>
		<th data-name="TitleOfCourtesy" class="<?php echo $t096_employees->TitleOfCourtesy->headerCellClass() ?>"><div id="elh_t096_employees_TitleOfCourtesy" class="t096_employees_TitleOfCourtesy"><div class="ew-table-header-caption"><?php echo $t096_employees->TitleOfCourtesy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TitleOfCourtesy" class="<?php echo $t096_employees->TitleOfCourtesy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->TitleOfCourtesy) ?>',2);"><div id="elh_t096_employees_TitleOfCourtesy" class="t096_employees_TitleOfCourtesy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->TitleOfCourtesy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->TitleOfCourtesy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->TitleOfCourtesy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->BirthDate->Visible) { // BirthDate ?>
	<?php if ($t096_employees->sortUrl($t096_employees->BirthDate) == "") { ?>
		<th data-name="BirthDate" class="<?php echo $t096_employees->BirthDate->headerCellClass() ?>"><div id="elh_t096_employees_BirthDate" class="t096_employees_BirthDate"><div class="ew-table-header-caption"><?php echo $t096_employees->BirthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BirthDate" class="<?php echo $t096_employees->BirthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->BirthDate) ?>',2);"><div id="elh_t096_employees_BirthDate" class="t096_employees_BirthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->BirthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->BirthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->BirthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->HireDate->Visible) { // HireDate ?>
	<?php if ($t096_employees->sortUrl($t096_employees->HireDate) == "") { ?>
		<th data-name="HireDate" class="<?php echo $t096_employees->HireDate->headerCellClass() ?>"><div id="elh_t096_employees_HireDate" class="t096_employees_HireDate"><div class="ew-table-header-caption"><?php echo $t096_employees->HireDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HireDate" class="<?php echo $t096_employees->HireDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->HireDate) ?>',2);"><div id="elh_t096_employees_HireDate" class="t096_employees_HireDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->HireDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->HireDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->HireDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->Address->Visible) { // Address ?>
	<?php if ($t096_employees->sortUrl($t096_employees->Address) == "") { ?>
		<th data-name="Address" class="<?php echo $t096_employees->Address->headerCellClass() ?>"><div id="elh_t096_employees_Address" class="t096_employees_Address"><div class="ew-table-header-caption"><?php echo $t096_employees->Address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address" class="<?php echo $t096_employees->Address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->Address) ?>',2);"><div id="elh_t096_employees_Address" class="t096_employees_Address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->Address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->Address->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->Address->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->City->Visible) { // City ?>
	<?php if ($t096_employees->sortUrl($t096_employees->City) == "") { ?>
		<th data-name="City" class="<?php echo $t096_employees->City->headerCellClass() ?>"><div id="elh_t096_employees_City" class="t096_employees_City"><div class="ew-table-header-caption"><?php echo $t096_employees->City->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="City" class="<?php echo $t096_employees->City->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->City) ?>',2);"><div id="elh_t096_employees_City" class="t096_employees_City">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->City->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->City->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->City->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->Region->Visible) { // Region ?>
	<?php if ($t096_employees->sortUrl($t096_employees->Region) == "") { ?>
		<th data-name="Region" class="<?php echo $t096_employees->Region->headerCellClass() ?>"><div id="elh_t096_employees_Region" class="t096_employees_Region"><div class="ew-table-header-caption"><?php echo $t096_employees->Region->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Region" class="<?php echo $t096_employees->Region->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->Region) ?>',2);"><div id="elh_t096_employees_Region" class="t096_employees_Region">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->Region->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->Region->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->Region->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->PostalCode->Visible) { // PostalCode ?>
	<?php if ($t096_employees->sortUrl($t096_employees->PostalCode) == "") { ?>
		<th data-name="PostalCode" class="<?php echo $t096_employees->PostalCode->headerCellClass() ?>"><div id="elh_t096_employees_PostalCode" class="t096_employees_PostalCode"><div class="ew-table-header-caption"><?php echo $t096_employees->PostalCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PostalCode" class="<?php echo $t096_employees->PostalCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->PostalCode) ?>',2);"><div id="elh_t096_employees_PostalCode" class="t096_employees_PostalCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->PostalCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->PostalCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->PostalCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->Country->Visible) { // Country ?>
	<?php if ($t096_employees->sortUrl($t096_employees->Country) == "") { ?>
		<th data-name="Country" class="<?php echo $t096_employees->Country->headerCellClass() ?>"><div id="elh_t096_employees_Country" class="t096_employees_Country"><div class="ew-table-header-caption"><?php echo $t096_employees->Country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Country" class="<?php echo $t096_employees->Country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->Country) ?>',2);"><div id="elh_t096_employees_Country" class="t096_employees_Country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->Country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->Country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->Country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->HomePhone->Visible) { // HomePhone ?>
	<?php if ($t096_employees->sortUrl($t096_employees->HomePhone) == "") { ?>
		<th data-name="HomePhone" class="<?php echo $t096_employees->HomePhone->headerCellClass() ?>"><div id="elh_t096_employees_HomePhone" class="t096_employees_HomePhone"><div class="ew-table-header-caption"><?php echo $t096_employees->HomePhone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HomePhone" class="<?php echo $t096_employees->HomePhone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->HomePhone) ?>',2);"><div id="elh_t096_employees_HomePhone" class="t096_employees_HomePhone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->HomePhone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->HomePhone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->HomePhone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->Extension->Visible) { // Extension ?>
	<?php if ($t096_employees->sortUrl($t096_employees->Extension) == "") { ?>
		<th data-name="Extension" class="<?php echo $t096_employees->Extension->headerCellClass() ?>"><div id="elh_t096_employees_Extension" class="t096_employees_Extension"><div class="ew-table-header-caption"><?php echo $t096_employees->Extension->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Extension" class="<?php echo $t096_employees->Extension->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->Extension) ?>',2);"><div id="elh_t096_employees_Extension" class="t096_employees_Extension">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->Extension->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->Extension->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->Extension->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->_Email->Visible) { // Email ?>
	<?php if ($t096_employees->sortUrl($t096_employees->_Email) == "") { ?>
		<th data-name="_Email" class="<?php echo $t096_employees->_Email->headerCellClass() ?>"><div id="elh_t096_employees__Email" class="t096_employees__Email"><div class="ew-table-header-caption"><?php echo $t096_employees->_Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Email" class="<?php echo $t096_employees->_Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->_Email) ?>',2);"><div id="elh_t096_employees__Email" class="t096_employees__Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->_Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->_Email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->_Email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->Photo->Visible) { // Photo ?>
	<?php if ($t096_employees->sortUrl($t096_employees->Photo) == "") { ?>
		<th data-name="Photo" class="<?php echo $t096_employees->Photo->headerCellClass() ?>"><div id="elh_t096_employees_Photo" class="t096_employees_Photo"><div class="ew-table-header-caption"><?php echo $t096_employees->Photo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Photo" class="<?php echo $t096_employees->Photo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->Photo) ?>',2);"><div id="elh_t096_employees_Photo" class="t096_employees_Photo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->Photo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->Photo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->Photo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->ReportsTo->Visible) { // ReportsTo ?>
	<?php if ($t096_employees->sortUrl($t096_employees->ReportsTo) == "") { ?>
		<th data-name="ReportsTo" class="<?php echo $t096_employees->ReportsTo->headerCellClass() ?>"><div id="elh_t096_employees_ReportsTo" class="t096_employees_ReportsTo"><div class="ew-table-header-caption"><?php echo $t096_employees->ReportsTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportsTo" class="<?php echo $t096_employees->ReportsTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->ReportsTo) ?>',2);"><div id="elh_t096_employees_ReportsTo" class="t096_employees_ReportsTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->ReportsTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->ReportsTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->ReportsTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->Password->Visible) { // Password ?>
	<?php if ($t096_employees->sortUrl($t096_employees->Password) == "") { ?>
		<th data-name="Password" class="<?php echo $t096_employees->Password->headerCellClass() ?>"><div id="elh_t096_employees_Password" class="t096_employees_Password"><div class="ew-table-header-caption"><?php echo $t096_employees->Password->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Password" class="<?php echo $t096_employees->Password->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->Password) ?>',2);"><div id="elh_t096_employees_Password" class="t096_employees_Password">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->Password->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->Password->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->Password->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->UserLevel->Visible) { // UserLevel ?>
	<?php if ($t096_employees->sortUrl($t096_employees->UserLevel) == "") { ?>
		<th data-name="UserLevel" class="<?php echo $t096_employees->UserLevel->headerCellClass() ?>"><div id="elh_t096_employees_UserLevel" class="t096_employees_UserLevel"><div class="ew-table-header-caption"><?php echo $t096_employees->UserLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserLevel" class="<?php echo $t096_employees->UserLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->UserLevel) ?>',2);"><div id="elh_t096_employees_UserLevel" class="t096_employees_UserLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->UserLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->UserLevel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->UserLevel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->Username->Visible) { // Username ?>
	<?php if ($t096_employees->sortUrl($t096_employees->Username) == "") { ?>
		<th data-name="Username" class="<?php echo $t096_employees->Username->headerCellClass() ?>"><div id="elh_t096_employees_Username" class="t096_employees_Username"><div class="ew-table-header-caption"><?php echo $t096_employees->Username->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Username" class="<?php echo $t096_employees->Username->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->Username) ?>',2);"><div id="elh_t096_employees_Username" class="t096_employees_Username">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->Username->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->Username->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->Username->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t096_employees->Activated->Visible) { // Activated ?>
	<?php if ($t096_employees->sortUrl($t096_employees->Activated) == "") { ?>
		<th data-name="Activated" class="<?php echo $t096_employees->Activated->headerCellClass() ?>"><div id="elh_t096_employees_Activated" class="t096_employees_Activated"><div class="ew-table-header-caption"><?php echo $t096_employees->Activated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Activated" class="<?php echo $t096_employees->Activated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t096_employees->SortUrl($t096_employees->Activated) ?>',2);"><div id="elh_t096_employees_Activated" class="t096_employees_Activated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t096_employees->Activated->caption() ?></span><span class="ew-table-header-sort"><?php if ($t096_employees->Activated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t096_employees->Activated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t096_employees_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t096_employees->ExportAll && $t096_employees->isExport()) {
	$t096_employees_list->StopRec = $t096_employees_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t096_employees_list->TotalRecs > $t096_employees_list->StartRec + $t096_employees_list->DisplayRecs - 1)
		$t096_employees_list->StopRec = $t096_employees_list->StartRec + $t096_employees_list->DisplayRecs - 1;
	else
		$t096_employees_list->StopRec = $t096_employees_list->TotalRecs;
}
$t096_employees_list->RecCnt = $t096_employees_list->StartRec - 1;
if ($t096_employees_list->Recordset && !$t096_employees_list->Recordset->EOF) {
	$t096_employees_list->Recordset->moveFirst();
	$selectLimit = $t096_employees_list->UseSelectLimit;
	if (!$selectLimit && $t096_employees_list->StartRec > 1)
		$t096_employees_list->Recordset->move($t096_employees_list->StartRec - 1);
} elseif (!$t096_employees->AllowAddDeleteRow && $t096_employees_list->StopRec == 0) {
	$t096_employees_list->StopRec = $t096_employees->GridAddRowCount;
}

// Initialize aggregate
$t096_employees->RowType = ROWTYPE_AGGREGATEINIT;
$t096_employees->resetAttributes();
$t096_employees_list->renderRow();
while ($t096_employees_list->RecCnt < $t096_employees_list->StopRec) {
	$t096_employees_list->RecCnt++;
	if ($t096_employees_list->RecCnt >= $t096_employees_list->StartRec) {
		$t096_employees_list->RowCnt++;

		// Set up key count
		$t096_employees_list->KeyCount = $t096_employees_list->RowIndex;

		// Init row class and style
		$t096_employees->resetAttributes();
		$t096_employees->CssClass = "";
		if ($t096_employees->isGridAdd()) {
		} else {
			$t096_employees_list->loadRowValues($t096_employees_list->Recordset); // Load row values
		}
		$t096_employees->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t096_employees->RowAttrs = array_merge($t096_employees->RowAttrs, array('data-rowindex'=>$t096_employees_list->RowCnt, 'id'=>'r' . $t096_employees_list->RowCnt . '_t096_employees', 'data-rowtype'=>$t096_employees->RowType));

		// Render row
		$t096_employees_list->renderRow();

		// Render list options
		$t096_employees_list->renderListOptions();
?>
	<tr<?php echo $t096_employees->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t096_employees_list->ListOptions->render("body", "left", $t096_employees_list->RowCnt);
?>
	<?php if ($t096_employees->EmployeeID->Visible) { // EmployeeID ?>
		<td data-name="EmployeeID"<?php echo $t096_employees->EmployeeID->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_EmployeeID" class="t096_employees_EmployeeID">
<span<?php echo $t096_employees->EmployeeID->viewAttributes() ?>>
<?php echo $t096_employees->EmployeeID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->LastName->Visible) { // LastName ?>
		<td data-name="LastName"<?php echo $t096_employees->LastName->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_LastName" class="t096_employees_LastName">
<span<?php echo $t096_employees->LastName->viewAttributes() ?>>
<?php echo $t096_employees->LastName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->FirstName->Visible) { // FirstName ?>
		<td data-name="FirstName"<?php echo $t096_employees->FirstName->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_FirstName" class="t096_employees_FirstName">
<span<?php echo $t096_employees->FirstName->viewAttributes() ?>>
<?php echo $t096_employees->FirstName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->Title->Visible) { // Title ?>
		<td data-name="Title"<?php echo $t096_employees->Title->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_Title" class="t096_employees_Title">
<span<?php echo $t096_employees->Title->viewAttributes() ?>>
<?php echo $t096_employees->Title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
		<td data-name="TitleOfCourtesy"<?php echo $t096_employees->TitleOfCourtesy->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_TitleOfCourtesy" class="t096_employees_TitleOfCourtesy">
<span<?php echo $t096_employees->TitleOfCourtesy->viewAttributes() ?>>
<?php echo $t096_employees->TitleOfCourtesy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->BirthDate->Visible) { // BirthDate ?>
		<td data-name="BirthDate"<?php echo $t096_employees->BirthDate->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_BirthDate" class="t096_employees_BirthDate">
<span<?php echo $t096_employees->BirthDate->viewAttributes() ?>>
<?php echo $t096_employees->BirthDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->HireDate->Visible) { // HireDate ?>
		<td data-name="HireDate"<?php echo $t096_employees->HireDate->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_HireDate" class="t096_employees_HireDate">
<span<?php echo $t096_employees->HireDate->viewAttributes() ?>>
<?php echo $t096_employees->HireDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->Address->Visible) { // Address ?>
		<td data-name="Address"<?php echo $t096_employees->Address->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_Address" class="t096_employees_Address">
<span<?php echo $t096_employees->Address->viewAttributes() ?>>
<?php echo $t096_employees->Address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->City->Visible) { // City ?>
		<td data-name="City"<?php echo $t096_employees->City->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_City" class="t096_employees_City">
<span<?php echo $t096_employees->City->viewAttributes() ?>>
<?php echo $t096_employees->City->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->Region->Visible) { // Region ?>
		<td data-name="Region"<?php echo $t096_employees->Region->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_Region" class="t096_employees_Region">
<span<?php echo $t096_employees->Region->viewAttributes() ?>>
<?php echo $t096_employees->Region->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->PostalCode->Visible) { // PostalCode ?>
		<td data-name="PostalCode"<?php echo $t096_employees->PostalCode->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_PostalCode" class="t096_employees_PostalCode">
<span<?php echo $t096_employees->PostalCode->viewAttributes() ?>>
<?php echo $t096_employees->PostalCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->Country->Visible) { // Country ?>
		<td data-name="Country"<?php echo $t096_employees->Country->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_Country" class="t096_employees_Country">
<span<?php echo $t096_employees->Country->viewAttributes() ?>>
<?php echo $t096_employees->Country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->HomePhone->Visible) { // HomePhone ?>
		<td data-name="HomePhone"<?php echo $t096_employees->HomePhone->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_HomePhone" class="t096_employees_HomePhone">
<span<?php echo $t096_employees->HomePhone->viewAttributes() ?>>
<?php echo $t096_employees->HomePhone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->Extension->Visible) { // Extension ?>
		<td data-name="Extension"<?php echo $t096_employees->Extension->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_Extension" class="t096_employees_Extension">
<span<?php echo $t096_employees->Extension->viewAttributes() ?>>
<?php echo $t096_employees->Extension->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->_Email->Visible) { // Email ?>
		<td data-name="_Email"<?php echo $t096_employees->_Email->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees__Email" class="t096_employees__Email">
<span<?php echo $t096_employees->_Email->viewAttributes() ?>>
<?php echo $t096_employees->_Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->Photo->Visible) { // Photo ?>
		<td data-name="Photo"<?php echo $t096_employees->Photo->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_Photo" class="t096_employees_Photo">
<span<?php echo $t096_employees->Photo->viewAttributes() ?>>
<?php echo $t096_employees->Photo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->ReportsTo->Visible) { // ReportsTo ?>
		<td data-name="ReportsTo"<?php echo $t096_employees->ReportsTo->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_ReportsTo" class="t096_employees_ReportsTo">
<span<?php echo $t096_employees->ReportsTo->viewAttributes() ?>>
<?php echo $t096_employees->ReportsTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->Password->Visible) { // Password ?>
		<td data-name="Password"<?php echo $t096_employees->Password->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_Password" class="t096_employees_Password">
<span<?php echo $t096_employees->Password->viewAttributes() ?>>
<?php echo $t096_employees->Password->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->UserLevel->Visible) { // UserLevel ?>
		<td data-name="UserLevel"<?php echo $t096_employees->UserLevel->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_UserLevel" class="t096_employees_UserLevel">
<span<?php echo $t096_employees->UserLevel->viewAttributes() ?>>
<?php echo $t096_employees->UserLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->Username->Visible) { // Username ?>
		<td data-name="Username"<?php echo $t096_employees->Username->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_Username" class="t096_employees_Username">
<span<?php echo $t096_employees->Username->viewAttributes() ?>>
<?php echo $t096_employees->Username->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t096_employees->Activated->Visible) { // Activated ?>
		<td data-name="Activated"<?php echo $t096_employees->Activated->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_list->RowCnt ?>_t096_employees_Activated" class="t096_employees_Activated">
<span<?php echo $t096_employees->Activated->viewAttributes() ?>>
<?php if (ConvertToBool($t096_employees->Activated->CurrentValue)) { ?>
<input type="checkbox" value="<?php echo $t096_employees->Activated->getViewValue() ?>" disabled checked>
<?php } else { ?>
<input type="checkbox" value="<?php echo $t096_employees->Activated->getViewValue() ?>" disabled>
<?php } ?>
</span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t096_employees_list->ListOptions->render("body", "right", $t096_employees_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t096_employees->isGridAdd())
		$t096_employees_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t096_employees->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t096_employees_list->Recordset)
	$t096_employees_list->Recordset->Close();
?>
<?php if (!$t096_employees->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t096_employees->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t096_employees_list->Pager)) $t096_employees_list->Pager = new PrevNextPager($t096_employees_list->StartRec, $t096_employees_list->DisplayRecs, $t096_employees_list->TotalRecs, $t096_employees_list->AutoHidePager) ?>
<?php if ($t096_employees_list->Pager->RecordCount > 0 && $t096_employees_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t096_employees_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t096_employees_list->pageUrl() ?>start=<?php echo $t096_employees_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t096_employees_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t096_employees_list->pageUrl() ?>start=<?php echo $t096_employees_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t096_employees_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t096_employees_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t096_employees_list->pageUrl() ?>start=<?php echo $t096_employees_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t096_employees_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t096_employees_list->pageUrl() ?>start=<?php echo $t096_employees_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t096_employees_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t096_employees_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t096_employees_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t096_employees_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t096_employees_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t096_employees_list->TotalRecs > 0 && (!$t096_employees_list->AutoHidePageSizeSelector || $t096_employees_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t096_employees">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t096_employees_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t096_employees_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t096_employees_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if ($t096_employees_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="ALL"<?php if ($t096_employees->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t096_employees_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t096_employees_list->TotalRecs == 0 && !$t096_employees->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t096_employees_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t096_employees_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t096_employees->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$t096_employees->isExport()) { ?>
<script>
ew.scrollableTable("gmp_t096_employees", "100%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t096_employees_list->terminate();
?>