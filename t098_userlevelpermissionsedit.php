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
$t098_userlevelpermissions_edit = new t098_userlevelpermissions_edit();

// Run the page
$t098_userlevelpermissions_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t098_userlevelpermissions_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft098_userlevelpermissionsedit = currentForm = new ew.Form("ft098_userlevelpermissionsedit", "edit");

// Validate form
ft098_userlevelpermissionsedit.validate = function() {
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
		<?php if ($t098_userlevelpermissions_edit->userlevelid->Required) { ?>
			elm = this.getElements("x" + infix + "_userlevelid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t098_userlevelpermissions->userlevelid->caption(), $t098_userlevelpermissions->userlevelid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_userlevelid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t098_userlevelpermissions->userlevelid->errorMessage()) ?>");
		<?php if ($t098_userlevelpermissions_edit->_tablename->Required) { ?>
			elm = this.getElements("x" + infix + "__tablename");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t098_userlevelpermissions->_tablename->caption(), $t098_userlevelpermissions->_tablename->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t098_userlevelpermissions_edit->permission->Required) { ?>
			elm = this.getElements("x" + infix + "_permission");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t098_userlevelpermissions->permission->caption(), $t098_userlevelpermissions->permission->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_permission");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t098_userlevelpermissions->permission->errorMessage()) ?>");

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
ft098_userlevelpermissionsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft098_userlevelpermissionsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t098_userlevelpermissions_edit->showPageHeader(); ?>
<?php
$t098_userlevelpermissions_edit->showMessage();
?>
<form name="ft098_userlevelpermissionsedit" id="ft098_userlevelpermissionsedit" class="<?php echo $t098_userlevelpermissions_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t098_userlevelpermissions_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t098_userlevelpermissions_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t098_userlevelpermissions">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t098_userlevelpermissions_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t098_userlevelpermissions->userlevelid->Visible) { // userlevelid ?>
	<div id="r_userlevelid" class="form-group row">
		<label id="elh_t098_userlevelpermissions_userlevelid" for="x_userlevelid" class="<?php echo $t098_userlevelpermissions_edit->LeftColumnClass ?>"><?php echo $t098_userlevelpermissions->userlevelid->caption() ?><?php echo ($t098_userlevelpermissions->userlevelid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t098_userlevelpermissions_edit->RightColumnClass ?>"><div<?php echo $t098_userlevelpermissions->userlevelid->cellAttributes() ?>>
<span id="el_t098_userlevelpermissions_userlevelid">
<span<?php echo $t098_userlevelpermissions->userlevelid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t098_userlevelpermissions->userlevelid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="t098_userlevelpermissions" data-field="x_userlevelid" name="x_userlevelid" id="x_userlevelid" value="<?php echo HtmlEncode($t098_userlevelpermissions->userlevelid->CurrentValue) ?>">
<?php echo $t098_userlevelpermissions->userlevelid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t098_userlevelpermissions->_tablename->Visible) { // tablename ?>
	<div id="r__tablename" class="form-group row">
		<label id="elh_t098_userlevelpermissions__tablename" for="x__tablename" class="<?php echo $t098_userlevelpermissions_edit->LeftColumnClass ?>"><?php echo $t098_userlevelpermissions->_tablename->caption() ?><?php echo ($t098_userlevelpermissions->_tablename->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t098_userlevelpermissions_edit->RightColumnClass ?>"><div<?php echo $t098_userlevelpermissions->_tablename->cellAttributes() ?>>
<span id="el_t098_userlevelpermissions__tablename">
<span<?php echo $t098_userlevelpermissions->_tablename->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t098_userlevelpermissions->_tablename->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="t098_userlevelpermissions" data-field="x__tablename" name="x__tablename" id="x__tablename" value="<?php echo HtmlEncode($t098_userlevelpermissions->_tablename->CurrentValue) ?>">
<?php echo $t098_userlevelpermissions->_tablename->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t098_userlevelpermissions->permission->Visible) { // permission ?>
	<div id="r_permission" class="form-group row">
		<label id="elh_t098_userlevelpermissions_permission" for="x_permission" class="<?php echo $t098_userlevelpermissions_edit->LeftColumnClass ?>"><?php echo $t098_userlevelpermissions->permission->caption() ?><?php echo ($t098_userlevelpermissions->permission->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t098_userlevelpermissions_edit->RightColumnClass ?>"><div<?php echo $t098_userlevelpermissions->permission->cellAttributes() ?>>
<span id="el_t098_userlevelpermissions_permission">
<input type="text" data-table="t098_userlevelpermissions" data-field="x_permission" name="x_permission" id="x_permission" size="30" placeholder="<?php echo HtmlEncode($t098_userlevelpermissions->permission->getPlaceHolder()) ?>" value="<?php echo $t098_userlevelpermissions->permission->EditValue ?>"<?php echo $t098_userlevelpermissions->permission->editAttributes() ?>>
</span>
<?php echo $t098_userlevelpermissions->permission->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t098_userlevelpermissions_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t098_userlevelpermissions_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t098_userlevelpermissions_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t098_userlevelpermissions_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t098_userlevelpermissions_edit->terminate();
?>