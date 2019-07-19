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
$t102_costsheetdetail_edit = new t102_costsheetdetail_edit();

// Run the page
$t102_costsheetdetail_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_costsheetdetail_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft102_costsheetdetailedit = currentForm = new ew.Form("ft102_costsheetdetailedit", "edit");

// Validate form
ft102_costsheetdetailedit.validate = function() {
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
		<?php if ($t102_costsheetdetail_edit->chargecode_id->Required) { ?>
			elm = this.getElements("x" + infix + "_chargecode_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->chargecode_id->caption(), $t102_costsheetdetail->chargecode_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t102_costsheetdetail_edit->vendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_vendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->vendor_id->caption(), $t102_costsheetdetail->vendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t102_costsheetdetail_edit->ptl_amount->Required) { ?>
			elm = this.getElements("x" + infix + "_ptl_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->ptl_amount->caption(), $t102_costsheetdetail->ptl_amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ptl_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t102_costsheetdetail->ptl_amount->errorMessage()) ?>");
		<?php if ($t102_costsheetdetail_edit->ptl_total->Required) { ?>
			elm = this.getElements("x" + infix + "_ptl_total");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->ptl_total->caption(), $t102_costsheetdetail->ptl_total->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ptl_total");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t102_costsheetdetail->ptl_total->errorMessage()) ?>");
		<?php if ($t102_costsheetdetail_edit->rfc_amount->Required) { ?>
			elm = this.getElements("x" + infix + "_rfc_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_costsheetdetail->rfc_amount->caption(), $t102_costsheetdetail->rfc_amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_rfc_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t102_costsheetdetail->rfc_amount->errorMessage()) ?>");
		<?php if ($t102_costsheetdetail_edit->rfc_total->Required) { ?>
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
ft102_costsheetdetailedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft102_costsheetdetailedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft102_costsheetdetailedit.lists["x_chargecode_id"] = <?php echo $t102_costsheetdetail_edit->chargecode_id->Lookup->toClientList() ?>;
ft102_costsheetdetailedit.lists["x_chargecode_id"].options = <?php echo JsonEncode($t102_costsheetdetail_edit->chargecode_id->lookupOptions()) ?>;
ft102_costsheetdetailedit.lists["x_vendor_id"] = <?php echo $t102_costsheetdetail_edit->vendor_id->Lookup->toClientList() ?>;
ft102_costsheetdetailedit.lists["x_vendor_id"].options = <?php echo JsonEncode($t102_costsheetdetail_edit->vendor_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t102_costsheetdetail_edit->showPageHeader(); ?>
<?php
$t102_costsheetdetail_edit->showMessage();
?>
<form name="ft102_costsheetdetailedit" id="ft102_costsheetdetailedit" class="<?php echo $t102_costsheetdetail_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t102_costsheetdetail_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t102_costsheetdetail_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_costsheetdetail">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t102_costsheetdetail_edit->IsModal ?>">
<?php if ($t102_costsheetdetail->getCurrentMasterTable() == "t101_costsheethead") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t101_costsheethead">
<input type="hidden" name="fk_id" value="<?php echo $t102_costsheetdetail->costsheethead_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($t102_costsheetdetail->chargecode_id->Visible) { // chargecode_id ?>
	<div id="r_chargecode_id" class="form-group row">
		<label id="elh_t102_costsheetdetail_chargecode_id" for="x_chargecode_id" class="<?php echo $t102_costsheetdetail_edit->LeftColumnClass ?>"><?php echo $t102_costsheetdetail->chargecode_id->caption() ?><?php echo ($t102_costsheetdetail->chargecode_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_costsheetdetail_edit->RightColumnClass ?>"><div<?php echo $t102_costsheetdetail->chargecode_id->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_chargecode_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_chargecode_id" data-value-separator="<?php echo $t102_costsheetdetail->chargecode_id->displayValueSeparatorAttribute() ?>" id="x_chargecode_id" name="x_chargecode_id"<?php echo $t102_costsheetdetail->chargecode_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->chargecode_id->selectOptionListHtml("x_chargecode_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t003_chargecode") && !$t102_costsheetdetail->chargecode_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_chargecode_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->chargecode_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->chargecode_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_chargecode_id',url:'t003_chargecodeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->chargecode_id->Lookup->getParamTag("p_x_chargecode_id") ?>
</span>
<?php echo $t102_costsheetdetail->chargecode_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_costsheetdetail->vendor_id->Visible) { // vendor_id ?>
	<div id="r_vendor_id" class="form-group row">
		<label id="elh_t102_costsheetdetail_vendor_id" for="x_vendor_id" class="<?php echo $t102_costsheetdetail_edit->LeftColumnClass ?>"><?php echo $t102_costsheetdetail->vendor_id->caption() ?><?php echo ($t102_costsheetdetail->vendor_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_costsheetdetail_edit->RightColumnClass ?>"><div<?php echo $t102_costsheetdetail->vendor_id->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_vendor_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t102_costsheetdetail" data-field="x_vendor_id" data-value-separator="<?php echo $t102_costsheetdetail->vendor_id->displayValueSeparatorAttribute() ?>" id="x_vendor_id" name="x_vendor_id"<?php echo $t102_costsheetdetail->vendor_id->editAttributes() ?>>
		<?php echo $t102_costsheetdetail->vendor_id->selectOptionListHtml("x_vendor_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t004_vendor") && !$t102_costsheetdetail->vendor_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_vendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_costsheetdetail->vendor_id->caption() ?>" data-title="<?php echo $t102_costsheetdetail->vendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_vendor_id',url:'t004_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t102_costsheetdetail->vendor_id->Lookup->getParamTag("p_x_vendor_id") ?>
</span>
<?php echo $t102_costsheetdetail->vendor_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_amount->Visible) { // ptl_amount ?>
	<div id="r_ptl_amount" class="form-group row">
		<label id="elh_t102_costsheetdetail_ptl_amount" for="x_ptl_amount" class="<?php echo $t102_costsheetdetail_edit->LeftColumnClass ?>"><?php echo $t102_costsheetdetail->ptl_amount->caption() ?><?php echo ($t102_costsheetdetail->ptl_amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_costsheetdetail_edit->RightColumnClass ?>"><div<?php echo $t102_costsheetdetail->ptl_amount->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_ptl_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_amount" name="x_ptl_amount" id="x_ptl_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_amount->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_amount->editAttributes() ?>>
</span>
<?php echo $t102_costsheetdetail->ptl_amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_costsheetdetail->ptl_total->Visible) { // ptl_total ?>
	<div id="r_ptl_total" class="form-group row">
		<label id="elh_t102_costsheetdetail_ptl_total" for="x_ptl_total" class="<?php echo $t102_costsheetdetail_edit->LeftColumnClass ?>"><?php echo $t102_costsheetdetail->ptl_total->caption() ?><?php echo ($t102_costsheetdetail->ptl_total->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_costsheetdetail_edit->RightColumnClass ?>"><div<?php echo $t102_costsheetdetail->ptl_total->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_ptl_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_ptl_total" name="x_ptl_total" id="x_ptl_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->ptl_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->ptl_total->EditValue ?>"<?php echo $t102_costsheetdetail->ptl_total->editAttributes() ?>>
</span>
<?php echo $t102_costsheetdetail->ptl_total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_amount->Visible) { // rfc_amount ?>
	<div id="r_rfc_amount" class="form-group row">
		<label id="elh_t102_costsheetdetail_rfc_amount" for="x_rfc_amount" class="<?php echo $t102_costsheetdetail_edit->LeftColumnClass ?>"><?php echo $t102_costsheetdetail->rfc_amount->caption() ?><?php echo ($t102_costsheetdetail->rfc_amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_costsheetdetail_edit->RightColumnClass ?>"><div<?php echo $t102_costsheetdetail->rfc_amount->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_rfc_amount">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_amount" name="x_rfc_amount" id="x_rfc_amount" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_amount->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_amount->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_amount->editAttributes() ?>>
</span>
<?php echo $t102_costsheetdetail->rfc_amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_costsheetdetail->rfc_total->Visible) { // rfc_total ?>
	<div id="r_rfc_total" class="form-group row">
		<label id="elh_t102_costsheetdetail_rfc_total" for="x_rfc_total" class="<?php echo $t102_costsheetdetail_edit->LeftColumnClass ?>"><?php echo $t102_costsheetdetail->rfc_total->caption() ?><?php echo ($t102_costsheetdetail->rfc_total->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_costsheetdetail_edit->RightColumnClass ?>"><div<?php echo $t102_costsheetdetail->rfc_total->cellAttributes() ?>>
<span id="el_t102_costsheetdetail_rfc_total">
<input type="text" data-table="t102_costsheetdetail" data-field="x_rfc_total" name="x_rfc_total" id="x_rfc_total" size="30" placeholder="<?php echo HtmlEncode($t102_costsheetdetail->rfc_total->getPlaceHolder()) ?>" value="<?php echo $t102_costsheetdetail->rfc_total->EditValue ?>"<?php echo $t102_costsheetdetail->rfc_total->editAttributes() ?>>
</span>
<?php echo $t102_costsheetdetail->rfc_total->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t102_costsheetdetail" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t102_costsheetdetail->id->CurrentValue) ?>">
<?php if (!$t102_costsheetdetail_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t102_costsheetdetail_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t102_costsheetdetail_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t102_costsheetdetail_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t102_costsheetdetail_edit->terminate();
?>