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
$t001_liner_edit = new t001_liner_edit();

// Run the page
$t001_liner_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_liner_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft001_lineredit = currentForm = new ew.Form("ft001_lineredit", "edit");

// Validate form
ft001_lineredit.validate = function() {
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
		<?php if ($t001_liner_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_liner->id->caption(), $t001_liner->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t001_liner_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_liner->Name->caption(), $t001_liner->Name->RequiredErrorMessage)) ?>");
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
ft001_lineredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft001_lineredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t001_liner_edit->showPageHeader(); ?>
<?php
$t001_liner_edit->showMessage();
?>
<form name="ft001_lineredit" id="ft001_lineredit" class="<?php echo $t001_liner_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t001_liner_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t001_liner_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_liner">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t001_liner_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t001_liner->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_t001_liner_id" class="<?php echo $t001_liner_edit->LeftColumnClass ?>"><?php echo $t001_liner->id->caption() ?><?php echo ($t001_liner->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_liner_edit->RightColumnClass ?>"><div<?php echo $t001_liner->id->cellAttributes() ?>>
<span id="el_t001_liner_id">
<span<?php echo $t001_liner->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t001_liner->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="t001_liner" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t001_liner->id->CurrentValue) ?>">
<?php echo $t001_liner->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_liner->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_t001_liner_Name" for="x_Name" class="<?php echo $t001_liner_edit->LeftColumnClass ?>"><?php echo $t001_liner->Name->caption() ?><?php echo ($t001_liner->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_liner_edit->RightColumnClass ?>"><div<?php echo $t001_liner->Name->cellAttributes() ?>>
<span id="el_t001_liner_Name">
<input type="text" data-table="t001_liner" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t001_liner->Name->getPlaceHolder()) ?>" value="<?php echo $t001_liner->Name->EditValue ?>"<?php echo $t001_liner->Name->editAttributes() ?>>
</span>
<?php echo $t001_liner->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t001_liner_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t001_liner_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_liner_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t001_liner_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t001_liner_edit->terminate();
?>