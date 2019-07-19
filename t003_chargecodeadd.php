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
$t003_chargecode_add = new t003_chargecode_add();

// Run the page
$t003_chargecode_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_chargecode_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft003_chargecodeadd = currentForm = new ew.Form("ft003_chargecodeadd", "add");

// Validate form
ft003_chargecodeadd.validate = function() {
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
		<?php if ($t003_chargecode_add->Charge_Code->Required) { ?>
			elm = this.getElements("x" + infix + "_Charge_Code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t003_chargecode->Charge_Code->caption(), $t003_chargecode->Charge_Code->RequiredErrorMessage)) ?>");
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
ft003_chargecodeadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft003_chargecodeadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t003_chargecode_add->showPageHeader(); ?>
<?php
$t003_chargecode_add->showMessage();
?>
<form name="ft003_chargecodeadd" id="ft003_chargecodeadd" class="<?php echo $t003_chargecode_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t003_chargecode_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t003_chargecode_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_chargecode">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t003_chargecode_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t003_chargecode->Charge_Code->Visible) { // Charge_Code ?>
	<div id="r_Charge_Code" class="form-group row">
		<label id="elh_t003_chargecode_Charge_Code" for="x_Charge_Code" class="<?php echo $t003_chargecode_add->LeftColumnClass ?>"><?php echo $t003_chargecode->Charge_Code->caption() ?><?php echo ($t003_chargecode->Charge_Code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t003_chargecode_add->RightColumnClass ?>"><div<?php echo $t003_chargecode->Charge_Code->cellAttributes() ?>>
<span id="el_t003_chargecode_Charge_Code">
<input type="text" data-table="t003_chargecode" data-field="x_Charge_Code" name="x_Charge_Code" id="x_Charge_Code" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t003_chargecode->Charge_Code->getPlaceHolder()) ?>" value="<?php echo $t003_chargecode->Charge_Code->EditValue ?>"<?php echo $t003_chargecode->Charge_Code->editAttributes() ?>>
</span>
<?php echo $t003_chargecode->Charge_Code->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t003_chargecode_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t003_chargecode_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t003_chargecode_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t003_chargecode_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t003_chargecode_add->terminate();
?>