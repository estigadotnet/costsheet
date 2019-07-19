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
$t003_chargecode_addopt = new t003_chargecode_addopt();

// Run the page
$t003_chargecode_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_chargecode_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var ft003_chargecodeaddopt = currentForm = new ew.Form("ft003_chargecodeaddopt", "addopt");

// Validate form
ft003_chargecodeaddopt.validate = function() {
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
		<?php if ($t003_chargecode_addopt->Charge_Code->Required) { ?>
			elm = this.getElements("x" + infix + "_Charge_Code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t003_chargecode->Charge_Code->caption(), $t003_chargecode->Charge_Code->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
ft003_chargecodeaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft003_chargecodeaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t003_chargecode_addopt->showPageHeader(); ?>
<?php
$t003_chargecode_addopt->showMessage();
?>
<form name="ft003_chargecodeaddopt" id="ft003_chargecodeaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($t003_chargecode_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t003_chargecode_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $t003_chargecode_addopt->TableVar ?>">
<?php if ($t003_chargecode->Charge_Code->Visible) { // Charge_Code ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Charge_Code"><?php echo $t003_chargecode->Charge_Code->caption() ?><?php echo ($t003_chargecode->Charge_Code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t003_chargecode" data-field="x_Charge_Code" name="x_Charge_Code" id="x_Charge_Code" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t003_chargecode->Charge_Code->getPlaceHolder()) ?>" value="<?php echo $t003_chargecode->Charge_Code->EditValue ?>"<?php echo $t003_chargecode->Charge_Code->editAttributes() ?>>
<?php echo $t003_chargecode->Charge_Code->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$t003_chargecode_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$t003_chargecode_addopt->terminate();
?>