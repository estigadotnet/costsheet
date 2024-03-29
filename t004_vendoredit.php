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
$t004_vendor_edit = new t004_vendor_edit();

// Run the page
$t004_vendor_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_vendor_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft004_vendoredit = currentForm = new ew.Form("ft004_vendoredit", "edit");

// Validate form
ft004_vendoredit.validate = function() {
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
		<?php if ($t004_vendor_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_vendor->Name->caption(), $t004_vendor->Name->RequiredErrorMessage)) ?>");
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
ft004_vendoredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft004_vendoredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t004_vendor_edit->showPageHeader(); ?>
<?php
$t004_vendor_edit->showMessage();
?>
<form name="ft004_vendoredit" id="ft004_vendoredit" class="<?php echo $t004_vendor_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t004_vendor_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t004_vendor_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_vendor">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t004_vendor_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t004_vendor->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_t004_vendor_Name" for="x_Name" class="<?php echo $t004_vendor_edit->LeftColumnClass ?>"><?php echo $t004_vendor->Name->caption() ?><?php echo ($t004_vendor->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_vendor_edit->RightColumnClass ?>"><div<?php echo $t004_vendor->Name->cellAttributes() ?>>
<span id="el_t004_vendor_Name">
<input type="text" data-table="t004_vendor" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t004_vendor->Name->getPlaceHolder()) ?>" value="<?php echo $t004_vendor->Name->EditValue ?>"<?php echo $t004_vendor->Name->editAttributes() ?>>
</span>
<?php echo $t004_vendor->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t004_vendor" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t004_vendor->id->CurrentValue) ?>">
<?php if (!$t004_vendor_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t004_vendor_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t004_vendor_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t004_vendor_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t004_vendor_edit->terminate();
?>