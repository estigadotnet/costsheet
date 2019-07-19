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
$t096_employees_delete = new t096_employees_delete();

// Run the page
$t096_employees_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t096_employees_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft096_employeesdelete = currentForm = new ew.Form("ft096_employeesdelete", "delete");

// Form_CustomValidate event
ft096_employeesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft096_employeesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft096_employeesdelete.lists["x_UserLevel"] = <?php echo $t096_employees_delete->UserLevel->Lookup->toClientList() ?>;
ft096_employeesdelete.lists["x_UserLevel"].options = <?php echo JsonEncode($t096_employees_delete->UserLevel->lookupOptions()) ?>;
ft096_employeesdelete.lists["x_Activated[]"] = <?php echo $t096_employees_delete->Activated->Lookup->toClientList() ?>;
ft096_employeesdelete.lists["x_Activated[]"].options = <?php echo JsonEncode($t096_employees_delete->Activated->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t096_employees_delete->showPageHeader(); ?>
<?php
$t096_employees_delete->showMessage();
?>
<form name="ft096_employeesdelete" id="ft096_employeesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t096_employees_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t096_employees_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t096_employees">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t096_employees_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t096_employees->EmployeeID->Visible) { // EmployeeID ?>
		<th class="<?php echo $t096_employees->EmployeeID->headerCellClass() ?>"><span id="elh_t096_employees_EmployeeID" class="t096_employees_EmployeeID"><?php echo $t096_employees->EmployeeID->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->LastName->Visible) { // LastName ?>
		<th class="<?php echo $t096_employees->LastName->headerCellClass() ?>"><span id="elh_t096_employees_LastName" class="t096_employees_LastName"><?php echo $t096_employees->LastName->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->FirstName->Visible) { // FirstName ?>
		<th class="<?php echo $t096_employees->FirstName->headerCellClass() ?>"><span id="elh_t096_employees_FirstName" class="t096_employees_FirstName"><?php echo $t096_employees->FirstName->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->Title->Visible) { // Title ?>
		<th class="<?php echo $t096_employees->Title->headerCellClass() ?>"><span id="elh_t096_employees_Title" class="t096_employees_Title"><?php echo $t096_employees->Title->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
		<th class="<?php echo $t096_employees->TitleOfCourtesy->headerCellClass() ?>"><span id="elh_t096_employees_TitleOfCourtesy" class="t096_employees_TitleOfCourtesy"><?php echo $t096_employees->TitleOfCourtesy->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->BirthDate->Visible) { // BirthDate ?>
		<th class="<?php echo $t096_employees->BirthDate->headerCellClass() ?>"><span id="elh_t096_employees_BirthDate" class="t096_employees_BirthDate"><?php echo $t096_employees->BirthDate->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->HireDate->Visible) { // HireDate ?>
		<th class="<?php echo $t096_employees->HireDate->headerCellClass() ?>"><span id="elh_t096_employees_HireDate" class="t096_employees_HireDate"><?php echo $t096_employees->HireDate->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->Address->Visible) { // Address ?>
		<th class="<?php echo $t096_employees->Address->headerCellClass() ?>"><span id="elh_t096_employees_Address" class="t096_employees_Address"><?php echo $t096_employees->Address->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->City->Visible) { // City ?>
		<th class="<?php echo $t096_employees->City->headerCellClass() ?>"><span id="elh_t096_employees_City" class="t096_employees_City"><?php echo $t096_employees->City->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->Region->Visible) { // Region ?>
		<th class="<?php echo $t096_employees->Region->headerCellClass() ?>"><span id="elh_t096_employees_Region" class="t096_employees_Region"><?php echo $t096_employees->Region->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->PostalCode->Visible) { // PostalCode ?>
		<th class="<?php echo $t096_employees->PostalCode->headerCellClass() ?>"><span id="elh_t096_employees_PostalCode" class="t096_employees_PostalCode"><?php echo $t096_employees->PostalCode->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->Country->Visible) { // Country ?>
		<th class="<?php echo $t096_employees->Country->headerCellClass() ?>"><span id="elh_t096_employees_Country" class="t096_employees_Country"><?php echo $t096_employees->Country->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->HomePhone->Visible) { // HomePhone ?>
		<th class="<?php echo $t096_employees->HomePhone->headerCellClass() ?>"><span id="elh_t096_employees_HomePhone" class="t096_employees_HomePhone"><?php echo $t096_employees->HomePhone->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->Extension->Visible) { // Extension ?>
		<th class="<?php echo $t096_employees->Extension->headerCellClass() ?>"><span id="elh_t096_employees_Extension" class="t096_employees_Extension"><?php echo $t096_employees->Extension->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->_Email->Visible) { // Email ?>
		<th class="<?php echo $t096_employees->_Email->headerCellClass() ?>"><span id="elh_t096_employees__Email" class="t096_employees__Email"><?php echo $t096_employees->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->Photo->Visible) { // Photo ?>
		<th class="<?php echo $t096_employees->Photo->headerCellClass() ?>"><span id="elh_t096_employees_Photo" class="t096_employees_Photo"><?php echo $t096_employees->Photo->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->ReportsTo->Visible) { // ReportsTo ?>
		<th class="<?php echo $t096_employees->ReportsTo->headerCellClass() ?>"><span id="elh_t096_employees_ReportsTo" class="t096_employees_ReportsTo"><?php echo $t096_employees->ReportsTo->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->Password->Visible) { // Password ?>
		<th class="<?php echo $t096_employees->Password->headerCellClass() ?>"><span id="elh_t096_employees_Password" class="t096_employees_Password"><?php echo $t096_employees->Password->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->UserLevel->Visible) { // UserLevel ?>
		<th class="<?php echo $t096_employees->UserLevel->headerCellClass() ?>"><span id="elh_t096_employees_UserLevel" class="t096_employees_UserLevel"><?php echo $t096_employees->UserLevel->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->Username->Visible) { // Username ?>
		<th class="<?php echo $t096_employees->Username->headerCellClass() ?>"><span id="elh_t096_employees_Username" class="t096_employees_Username"><?php echo $t096_employees->Username->caption() ?></span></th>
<?php } ?>
<?php if ($t096_employees->Activated->Visible) { // Activated ?>
		<th class="<?php echo $t096_employees->Activated->headerCellClass() ?>"><span id="elh_t096_employees_Activated" class="t096_employees_Activated"><?php echo $t096_employees->Activated->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t096_employees_delete->RecCnt = 0;
$i = 0;
while (!$t096_employees_delete->Recordset->EOF) {
	$t096_employees_delete->RecCnt++;
	$t096_employees_delete->RowCnt++;

	// Set row properties
	$t096_employees->resetAttributes();
	$t096_employees->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t096_employees_delete->loadRowValues($t096_employees_delete->Recordset);

	// Render row
	$t096_employees_delete->renderRow();
?>
	<tr<?php echo $t096_employees->rowAttributes() ?>>
<?php if ($t096_employees->EmployeeID->Visible) { // EmployeeID ?>
		<td<?php echo $t096_employees->EmployeeID->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_EmployeeID" class="t096_employees_EmployeeID">
<span<?php echo $t096_employees->EmployeeID->viewAttributes() ?>>
<?php echo $t096_employees->EmployeeID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->LastName->Visible) { // LastName ?>
		<td<?php echo $t096_employees->LastName->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_LastName" class="t096_employees_LastName">
<span<?php echo $t096_employees->LastName->viewAttributes() ?>>
<?php echo $t096_employees->LastName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->FirstName->Visible) { // FirstName ?>
		<td<?php echo $t096_employees->FirstName->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_FirstName" class="t096_employees_FirstName">
<span<?php echo $t096_employees->FirstName->viewAttributes() ?>>
<?php echo $t096_employees->FirstName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->Title->Visible) { // Title ?>
		<td<?php echo $t096_employees->Title->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_Title" class="t096_employees_Title">
<span<?php echo $t096_employees->Title->viewAttributes() ?>>
<?php echo $t096_employees->Title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
		<td<?php echo $t096_employees->TitleOfCourtesy->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_TitleOfCourtesy" class="t096_employees_TitleOfCourtesy">
<span<?php echo $t096_employees->TitleOfCourtesy->viewAttributes() ?>>
<?php echo $t096_employees->TitleOfCourtesy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->BirthDate->Visible) { // BirthDate ?>
		<td<?php echo $t096_employees->BirthDate->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_BirthDate" class="t096_employees_BirthDate">
<span<?php echo $t096_employees->BirthDate->viewAttributes() ?>>
<?php echo $t096_employees->BirthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->HireDate->Visible) { // HireDate ?>
		<td<?php echo $t096_employees->HireDate->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_HireDate" class="t096_employees_HireDate">
<span<?php echo $t096_employees->HireDate->viewAttributes() ?>>
<?php echo $t096_employees->HireDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->Address->Visible) { // Address ?>
		<td<?php echo $t096_employees->Address->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_Address" class="t096_employees_Address">
<span<?php echo $t096_employees->Address->viewAttributes() ?>>
<?php echo $t096_employees->Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->City->Visible) { // City ?>
		<td<?php echo $t096_employees->City->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_City" class="t096_employees_City">
<span<?php echo $t096_employees->City->viewAttributes() ?>>
<?php echo $t096_employees->City->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->Region->Visible) { // Region ?>
		<td<?php echo $t096_employees->Region->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_Region" class="t096_employees_Region">
<span<?php echo $t096_employees->Region->viewAttributes() ?>>
<?php echo $t096_employees->Region->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->PostalCode->Visible) { // PostalCode ?>
		<td<?php echo $t096_employees->PostalCode->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_PostalCode" class="t096_employees_PostalCode">
<span<?php echo $t096_employees->PostalCode->viewAttributes() ?>>
<?php echo $t096_employees->PostalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->Country->Visible) { // Country ?>
		<td<?php echo $t096_employees->Country->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_Country" class="t096_employees_Country">
<span<?php echo $t096_employees->Country->viewAttributes() ?>>
<?php echo $t096_employees->Country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->HomePhone->Visible) { // HomePhone ?>
		<td<?php echo $t096_employees->HomePhone->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_HomePhone" class="t096_employees_HomePhone">
<span<?php echo $t096_employees->HomePhone->viewAttributes() ?>>
<?php echo $t096_employees->HomePhone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->Extension->Visible) { // Extension ?>
		<td<?php echo $t096_employees->Extension->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_Extension" class="t096_employees_Extension">
<span<?php echo $t096_employees->Extension->viewAttributes() ?>>
<?php echo $t096_employees->Extension->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->_Email->Visible) { // Email ?>
		<td<?php echo $t096_employees->_Email->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees__Email" class="t096_employees__Email">
<span<?php echo $t096_employees->_Email->viewAttributes() ?>>
<?php echo $t096_employees->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->Photo->Visible) { // Photo ?>
		<td<?php echo $t096_employees->Photo->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_Photo" class="t096_employees_Photo">
<span<?php echo $t096_employees->Photo->viewAttributes() ?>>
<?php echo $t096_employees->Photo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->ReportsTo->Visible) { // ReportsTo ?>
		<td<?php echo $t096_employees->ReportsTo->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_ReportsTo" class="t096_employees_ReportsTo">
<span<?php echo $t096_employees->ReportsTo->viewAttributes() ?>>
<?php echo $t096_employees->ReportsTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->Password->Visible) { // Password ?>
		<td<?php echo $t096_employees->Password->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_Password" class="t096_employees_Password">
<span<?php echo $t096_employees->Password->viewAttributes() ?>>
<?php echo $t096_employees->Password->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->UserLevel->Visible) { // UserLevel ?>
		<td<?php echo $t096_employees->UserLevel->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_UserLevel" class="t096_employees_UserLevel">
<span<?php echo $t096_employees->UserLevel->viewAttributes() ?>>
<?php echo $t096_employees->UserLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->Username->Visible) { // Username ?>
		<td<?php echo $t096_employees->Username->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_Username" class="t096_employees_Username">
<span<?php echo $t096_employees->Username->viewAttributes() ?>>
<?php echo $t096_employees->Username->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t096_employees->Activated->Visible) { // Activated ?>
		<td<?php echo $t096_employees->Activated->cellAttributes() ?>>
<span id="el<?php echo $t096_employees_delete->RowCnt ?>_t096_employees_Activated" class="t096_employees_Activated">
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
	</tr>
<?php
	$t096_employees_delete->Recordset->moveNext();
}
$t096_employees_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t096_employees_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t096_employees_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t096_employees_delete->terminate();
?>