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
$t096_employees_edit = new t096_employees_edit();

// Run the page
$t096_employees_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t096_employees_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft096_employeesedit = currentForm = new ew.Form("ft096_employeesedit", "edit");

// Validate form
ft096_employeesedit.validate = function() {
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
		<?php if ($t096_employees_edit->EmployeeID->Required) { ?>
			elm = this.getElements("x" + infix + "_EmployeeID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->EmployeeID->caption(), $t096_employees->EmployeeID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->LastName->Required) { ?>
			elm = this.getElements("x" + infix + "_LastName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->LastName->caption(), $t096_employees->LastName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->FirstName->Required) { ?>
			elm = this.getElements("x" + infix + "_FirstName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->FirstName->caption(), $t096_employees->FirstName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->Title->Required) { ?>
			elm = this.getElements("x" + infix + "_Title");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Title->caption(), $t096_employees->Title->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->TitleOfCourtesy->Required) { ?>
			elm = this.getElements("x" + infix + "_TitleOfCourtesy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->TitleOfCourtesy->caption(), $t096_employees->TitleOfCourtesy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->BirthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BirthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->BirthDate->caption(), $t096_employees->BirthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BirthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t096_employees->BirthDate->errorMessage()) ?>");
		<?php if ($t096_employees_edit->HireDate->Required) { ?>
			elm = this.getElements("x" + infix + "_HireDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->HireDate->caption(), $t096_employees->HireDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HireDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t096_employees->HireDate->errorMessage()) ?>");
		<?php if ($t096_employees_edit->Address->Required) { ?>
			elm = this.getElements("x" + infix + "_Address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Address->caption(), $t096_employees->Address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->City->Required) { ?>
			elm = this.getElements("x" + infix + "_City");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->City->caption(), $t096_employees->City->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->Region->Required) { ?>
			elm = this.getElements("x" + infix + "_Region");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Region->caption(), $t096_employees->Region->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->PostalCode->Required) { ?>
			elm = this.getElements("x" + infix + "_PostalCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->PostalCode->caption(), $t096_employees->PostalCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->Country->Required) { ?>
			elm = this.getElements("x" + infix + "_Country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Country->caption(), $t096_employees->Country->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->HomePhone->Required) { ?>
			elm = this.getElements("x" + infix + "_HomePhone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->HomePhone->caption(), $t096_employees->HomePhone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->Extension->Required) { ?>
			elm = this.getElements("x" + infix + "_Extension");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Extension->caption(), $t096_employees->Extension->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->_Email->Required) { ?>
			elm = this.getElements("x" + infix + "__Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->_Email->caption(), $t096_employees->_Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->Photo->Required) { ?>
			elm = this.getElements("x" + infix + "_Photo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Photo->caption(), $t096_employees->Photo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->Notes->Required) { ?>
			elm = this.getElements("x" + infix + "_Notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Notes->caption(), $t096_employees->Notes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->ReportsTo->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportsTo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->ReportsTo->caption(), $t096_employees->ReportsTo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReportsTo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t096_employees->ReportsTo->errorMessage()) ?>");
		<?php if ($t096_employees_edit->Password->Required) { ?>
			elm = this.getElements("x" + infix + "_Password");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Password->caption(), $t096_employees->Password->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->UserLevel->Required) { ?>
			elm = this.getElements("x" + infix + "_UserLevel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->UserLevel->caption(), $t096_employees->UserLevel->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->Username->Required) { ?>
			elm = this.getElements("x" + infix + "_Username");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Username->caption(), $t096_employees->Username->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->Activated->Required) { ?>
			elm = this.getElements("x" + infix + "_Activated[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Activated->caption(), $t096_employees->Activated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t096_employees_edit->Profile->Required) { ?>
			elm = this.getElements("x" + infix + "_Profile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t096_employees->Profile->caption(), $t096_employees->Profile->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
ft096_employeesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft096_employeesedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft096_employeesedit.lists["x_UserLevel"] = <?php echo $t096_employees_edit->UserLevel->Lookup->toClientList() ?>;
ft096_employeesedit.lists["x_UserLevel"].options = <?php echo JsonEncode($t096_employees_edit->UserLevel->lookupOptions()) ?>;
ft096_employeesedit.lists["x_Activated[]"] = <?php echo $t096_employees_edit->Activated->Lookup->toClientList() ?>;
ft096_employeesedit.lists["x_Activated[]"].options = <?php echo JsonEncode($t096_employees_edit->Activated->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t096_employees_edit->showPageHeader(); ?>
<?php
$t096_employees_edit->showMessage();
?>
<form name="ft096_employeesedit" id="ft096_employeesedit" class="<?php echo $t096_employees_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t096_employees_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t096_employees_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t096_employees">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t096_employees_edit->IsModal ?>">
<!-- Fields to prevent google autofill -->
<input class="d-none" type="text" name="<?php echo Encrypt(Random()) ?>">
<input class="d-none" type="password" name="<?php echo Encrypt(Random()) ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t096_employees->EmployeeID->Visible) { // EmployeeID ?>
	<div id="r_EmployeeID" class="form-group row">
		<label id="elh_t096_employees_EmployeeID" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->EmployeeID->caption() ?><?php echo ($t096_employees->EmployeeID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->EmployeeID->cellAttributes() ?>>
<span id="el_t096_employees_EmployeeID">
<span<?php echo $t096_employees->EmployeeID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t096_employees->EmployeeID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="t096_employees" data-field="x_EmployeeID" name="x_EmployeeID" id="x_EmployeeID" value="<?php echo HtmlEncode($t096_employees->EmployeeID->CurrentValue) ?>">
<?php echo $t096_employees->EmployeeID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->LastName->Visible) { // LastName ?>
	<div id="r_LastName" class="form-group row">
		<label id="elh_t096_employees_LastName" for="x_LastName" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->LastName->caption() ?><?php echo ($t096_employees->LastName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->LastName->cellAttributes() ?>>
<span id="el_t096_employees_LastName">
<input type="text" data-table="t096_employees" data-field="x_LastName" name="x_LastName" id="x_LastName" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($t096_employees->LastName->getPlaceHolder()) ?>" value="<?php echo $t096_employees->LastName->EditValue ?>"<?php echo $t096_employees->LastName->editAttributes() ?>>
</span>
<?php echo $t096_employees->LastName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->FirstName->Visible) { // FirstName ?>
	<div id="r_FirstName" class="form-group row">
		<label id="elh_t096_employees_FirstName" for="x_FirstName" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->FirstName->caption() ?><?php echo ($t096_employees->FirstName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->FirstName->cellAttributes() ?>>
<span id="el_t096_employees_FirstName">
<input type="text" data-table="t096_employees" data-field="x_FirstName" name="x_FirstName" id="x_FirstName" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t096_employees->FirstName->getPlaceHolder()) ?>" value="<?php echo $t096_employees->FirstName->EditValue ?>"<?php echo $t096_employees->FirstName->editAttributes() ?>>
</span>
<?php echo $t096_employees->FirstName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Title->Visible) { // Title ?>
	<div id="r_Title" class="form-group row">
		<label id="elh_t096_employees_Title" for="x_Title" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Title->caption() ?><?php echo ($t096_employees->Title->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Title->cellAttributes() ?>>
<span id="el_t096_employees_Title">
<input type="text" data-table="t096_employees" data-field="x_Title" name="x_Title" id="x_Title" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($t096_employees->Title->getPlaceHolder()) ?>" value="<?php echo $t096_employees->Title->EditValue ?>"<?php echo $t096_employees->Title->editAttributes() ?>>
</span>
<?php echo $t096_employees->Title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
	<div id="r_TitleOfCourtesy" class="form-group row">
		<label id="elh_t096_employees_TitleOfCourtesy" for="x_TitleOfCourtesy" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->TitleOfCourtesy->caption() ?><?php echo ($t096_employees->TitleOfCourtesy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->TitleOfCourtesy->cellAttributes() ?>>
<span id="el_t096_employees_TitleOfCourtesy">
<input type="text" data-table="t096_employees" data-field="x_TitleOfCourtesy" name="x_TitleOfCourtesy" id="x_TitleOfCourtesy" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t096_employees->TitleOfCourtesy->getPlaceHolder()) ?>" value="<?php echo $t096_employees->TitleOfCourtesy->EditValue ?>"<?php echo $t096_employees->TitleOfCourtesy->editAttributes() ?>>
</span>
<?php echo $t096_employees->TitleOfCourtesy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->BirthDate->Visible) { // BirthDate ?>
	<div id="r_BirthDate" class="form-group row">
		<label id="elh_t096_employees_BirthDate" for="x_BirthDate" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->BirthDate->caption() ?><?php echo ($t096_employees->BirthDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->BirthDate->cellAttributes() ?>>
<span id="el_t096_employees_BirthDate">
<input type="text" data-table="t096_employees" data-field="x_BirthDate" name="x_BirthDate" id="x_BirthDate" placeholder="<?php echo HtmlEncode($t096_employees->BirthDate->getPlaceHolder()) ?>" value="<?php echo $t096_employees->BirthDate->EditValue ?>"<?php echo $t096_employees->BirthDate->editAttributes() ?>>
<?php if (!$t096_employees->BirthDate->ReadOnly && !$t096_employees->BirthDate->Disabled && !isset($t096_employees->BirthDate->EditAttrs["readonly"]) && !isset($t096_employees->BirthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft096_employeesedit", "x_BirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $t096_employees->BirthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->HireDate->Visible) { // HireDate ?>
	<div id="r_HireDate" class="form-group row">
		<label id="elh_t096_employees_HireDate" for="x_HireDate" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->HireDate->caption() ?><?php echo ($t096_employees->HireDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->HireDate->cellAttributes() ?>>
<span id="el_t096_employees_HireDate">
<input type="text" data-table="t096_employees" data-field="x_HireDate" name="x_HireDate" id="x_HireDate" placeholder="<?php echo HtmlEncode($t096_employees->HireDate->getPlaceHolder()) ?>" value="<?php echo $t096_employees->HireDate->EditValue ?>"<?php echo $t096_employees->HireDate->editAttributes() ?>>
<?php if (!$t096_employees->HireDate->ReadOnly && !$t096_employees->HireDate->Disabled && !isset($t096_employees->HireDate->EditAttrs["readonly"]) && !isset($t096_employees->HireDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft096_employeesedit", "x_HireDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $t096_employees->HireDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Address->Visible) { // Address ?>
	<div id="r_Address" class="form-group row">
		<label id="elh_t096_employees_Address" for="x_Address" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Address->caption() ?><?php echo ($t096_employees->Address->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Address->cellAttributes() ?>>
<span id="el_t096_employees_Address">
<input type="text" data-table="t096_employees" data-field="x_Address" name="x_Address" id="x_Address" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($t096_employees->Address->getPlaceHolder()) ?>" value="<?php echo $t096_employees->Address->EditValue ?>"<?php echo $t096_employees->Address->editAttributes() ?>>
</span>
<?php echo $t096_employees->Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->City->Visible) { // City ?>
	<div id="r_City" class="form-group row">
		<label id="elh_t096_employees_City" for="x_City" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->City->caption() ?><?php echo ($t096_employees->City->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->City->cellAttributes() ?>>
<span id="el_t096_employees_City">
<input type="text" data-table="t096_employees" data-field="x_City" name="x_City" id="x_City" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($t096_employees->City->getPlaceHolder()) ?>" value="<?php echo $t096_employees->City->EditValue ?>"<?php echo $t096_employees->City->editAttributes() ?>>
</span>
<?php echo $t096_employees->City->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Region->Visible) { // Region ?>
	<div id="r_Region" class="form-group row">
		<label id="elh_t096_employees_Region" for="x_Region" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Region->caption() ?><?php echo ($t096_employees->Region->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Region->cellAttributes() ?>>
<span id="el_t096_employees_Region">
<input type="text" data-table="t096_employees" data-field="x_Region" name="x_Region" id="x_Region" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($t096_employees->Region->getPlaceHolder()) ?>" value="<?php echo $t096_employees->Region->EditValue ?>"<?php echo $t096_employees->Region->editAttributes() ?>>
</span>
<?php echo $t096_employees->Region->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->PostalCode->Visible) { // PostalCode ?>
	<div id="r_PostalCode" class="form-group row">
		<label id="elh_t096_employees_PostalCode" for="x_PostalCode" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->PostalCode->caption() ?><?php echo ($t096_employees->PostalCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->PostalCode->cellAttributes() ?>>
<span id="el_t096_employees_PostalCode">
<input type="text" data-table="t096_employees" data-field="x_PostalCode" name="x_PostalCode" id="x_PostalCode" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t096_employees->PostalCode->getPlaceHolder()) ?>" value="<?php echo $t096_employees->PostalCode->EditValue ?>"<?php echo $t096_employees->PostalCode->editAttributes() ?>>
</span>
<?php echo $t096_employees->PostalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Country->Visible) { // Country ?>
	<div id="r_Country" class="form-group row">
		<label id="elh_t096_employees_Country" for="x_Country" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Country->caption() ?><?php echo ($t096_employees->Country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Country->cellAttributes() ?>>
<span id="el_t096_employees_Country">
<input type="text" data-table="t096_employees" data-field="x_Country" name="x_Country" id="x_Country" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($t096_employees->Country->getPlaceHolder()) ?>" value="<?php echo $t096_employees->Country->EditValue ?>"<?php echo $t096_employees->Country->editAttributes() ?>>
</span>
<?php echo $t096_employees->Country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->HomePhone->Visible) { // HomePhone ?>
	<div id="r_HomePhone" class="form-group row">
		<label id="elh_t096_employees_HomePhone" for="x_HomePhone" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->HomePhone->caption() ?><?php echo ($t096_employees->HomePhone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->HomePhone->cellAttributes() ?>>
<span id="el_t096_employees_HomePhone">
<input type="text" data-table="t096_employees" data-field="x_HomePhone" name="x_HomePhone" id="x_HomePhone" size="30" maxlength="24" placeholder="<?php echo HtmlEncode($t096_employees->HomePhone->getPlaceHolder()) ?>" value="<?php echo $t096_employees->HomePhone->EditValue ?>"<?php echo $t096_employees->HomePhone->editAttributes() ?>>
</span>
<?php echo $t096_employees->HomePhone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Extension->Visible) { // Extension ?>
	<div id="r_Extension" class="form-group row">
		<label id="elh_t096_employees_Extension" for="x_Extension" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Extension->caption() ?><?php echo ($t096_employees->Extension->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Extension->cellAttributes() ?>>
<span id="el_t096_employees_Extension">
<input type="text" data-table="t096_employees" data-field="x_Extension" name="x_Extension" id="x_Extension" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($t096_employees->Extension->getPlaceHolder()) ?>" value="<?php echo $t096_employees->Extension->EditValue ?>"<?php echo $t096_employees->Extension->editAttributes() ?>>
</span>
<?php echo $t096_employees->Extension->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->_Email->Visible) { // Email ?>
	<div id="r__Email" class="form-group row">
		<label id="elh_t096_employees__Email" for="x__Email" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->_Email->caption() ?><?php echo ($t096_employees->_Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->_Email->cellAttributes() ?>>
<span id="el_t096_employees__Email">
<input type="text" data-table="t096_employees" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($t096_employees->_Email->getPlaceHolder()) ?>" value="<?php echo $t096_employees->_Email->EditValue ?>"<?php echo $t096_employees->_Email->editAttributes() ?>>
</span>
<?php echo $t096_employees->_Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Photo->Visible) { // Photo ?>
	<div id="r_Photo" class="form-group row">
		<label id="elh_t096_employees_Photo" for="x_Photo" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Photo->caption() ?><?php echo ($t096_employees->Photo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Photo->cellAttributes() ?>>
<span id="el_t096_employees_Photo">
<input type="text" data-table="t096_employees" data-field="x_Photo" name="x_Photo" id="x_Photo" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t096_employees->Photo->getPlaceHolder()) ?>" value="<?php echo $t096_employees->Photo->EditValue ?>"<?php echo $t096_employees->Photo->editAttributes() ?>>
</span>
<?php echo $t096_employees->Photo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label id="elh_t096_employees_Notes" for="x_Notes" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Notes->caption() ?><?php echo ($t096_employees->Notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Notes->cellAttributes() ?>>
<span id="el_t096_employees_Notes">
<textarea data-table="t096_employees" data-field="x_Notes" name="x_Notes" id="x_Notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t096_employees->Notes->getPlaceHolder()) ?>"<?php echo $t096_employees->Notes->editAttributes() ?>><?php echo $t096_employees->Notes->EditValue ?></textarea>
</span>
<?php echo $t096_employees->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->ReportsTo->Visible) { // ReportsTo ?>
	<div id="r_ReportsTo" class="form-group row">
		<label id="elh_t096_employees_ReportsTo" for="x_ReportsTo" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->ReportsTo->caption() ?><?php echo ($t096_employees->ReportsTo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->ReportsTo->cellAttributes() ?>>
<span id="el_t096_employees_ReportsTo">
<input type="text" data-table="t096_employees" data-field="x_ReportsTo" name="x_ReportsTo" id="x_ReportsTo" size="30" placeholder="<?php echo HtmlEncode($t096_employees->ReportsTo->getPlaceHolder()) ?>" value="<?php echo $t096_employees->ReportsTo->EditValue ?>"<?php echo $t096_employees->ReportsTo->editAttributes() ?>>
</span>
<?php echo $t096_employees->ReportsTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Password->Visible) { // Password ?>
	<div id="r_Password" class="form-group row">
		<label id="elh_t096_employees_Password" for="x_Password" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Password->caption() ?><?php echo ($t096_employees->Password->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Password->cellAttributes() ?>>
<span id="el_t096_employees_Password">
<input type="text" data-table="t096_employees" data-field="x_Password" name="x_Password" id="x_Password" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t096_employees->Password->getPlaceHolder()) ?>" value="<?php echo $t096_employees->Password->EditValue ?>"<?php echo $t096_employees->Password->editAttributes() ?>>
</span>
<?php echo $t096_employees->Password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->UserLevel->Visible) { // UserLevel ?>
	<div id="r_UserLevel" class="form-group row">
		<label id="elh_t096_employees_UserLevel" for="x_UserLevel" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->UserLevel->caption() ?><?php echo ($t096_employees->UserLevel->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->UserLevel->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn()) { // Non system admin ?>
<span id="el_t096_employees_UserLevel">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t096_employees->UserLevel->EditValue) ?>">
</span>
<?php } else { ?>
<span id="el_t096_employees_UserLevel">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t096_employees" data-field="x_UserLevel" data-value-separator="<?php echo $t096_employees->UserLevel->displayValueSeparatorAttribute() ?>" id="x_UserLevel" name="x_UserLevel"<?php echo $t096_employees->UserLevel->editAttributes() ?>>
		<?php echo $t096_employees->UserLevel->selectOptionListHtml("x_UserLevel") ?>
	</select>
</div>
<?php echo $t096_employees->UserLevel->Lookup->getParamTag("p_x_UserLevel") ?>
</span>
<?php } ?>
<?php echo $t096_employees->UserLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Username->Visible) { // Username ?>
	<div id="r_Username" class="form-group row">
		<label id="elh_t096_employees_Username" for="x_Username" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Username->caption() ?><?php echo ($t096_employees->Username->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Username->cellAttributes() ?>>
<span id="el_t096_employees_Username">
<input type="text" data-table="t096_employees" data-field="x_Username" name="x_Username" id="x_Username" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($t096_employees->Username->getPlaceHolder()) ?>" value="<?php echo $t096_employees->Username->EditValue ?>"<?php echo $t096_employees->Username->editAttributes() ?>>
</span>
<?php echo $t096_employees->Username->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Activated->Visible) { // Activated ?>
	<div id="r_Activated" class="form-group row">
		<label id="elh_t096_employees_Activated" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Activated->caption() ?><?php echo ($t096_employees->Activated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Activated->cellAttributes() ?>>
<span id="el_t096_employees_Activated">
<?php
$selwrk = (ConvertToBool($t096_employees->Activated->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t096_employees" data-field="x_Activated" name="x_Activated[]" id="x_Activated[]" value="1"<?php echo $selwrk ?><?php echo $t096_employees->Activated->editAttributes() ?>>
</span>
<?php echo $t096_employees->Activated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t096_employees->Profile->Visible) { // Profile ?>
	<div id="r_Profile" class="form-group row">
		<label id="elh_t096_employees_Profile" for="x_Profile" class="<?php echo $t096_employees_edit->LeftColumnClass ?>"><?php echo $t096_employees->Profile->caption() ?><?php echo ($t096_employees->Profile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t096_employees_edit->RightColumnClass ?>"><div<?php echo $t096_employees->Profile->cellAttributes() ?>>
<span id="el_t096_employees_Profile">
<textarea data-table="t096_employees" data-field="x_Profile" name="x_Profile" id="x_Profile" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t096_employees->Profile->getPlaceHolder()) ?>"<?php echo $t096_employees->Profile->editAttributes() ?>><?php echo $t096_employees->Profile->EditValue ?></textarea>
</span>
<?php echo $t096_employees->Profile->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t096_employees_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t096_employees_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t096_employees_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t096_employees_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t096_employees_edit->terminate();
?>