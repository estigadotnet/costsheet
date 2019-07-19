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
$t003_chargecode_view = new t003_chargecode_view();

// Run the page
$t003_chargecode_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_chargecode_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t003_chargecode->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft003_chargecodeview = currentForm = new ew.Form("ft003_chargecodeview", "view");

// Form_CustomValidate event
ft003_chargecodeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft003_chargecodeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t003_chargecode->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t003_chargecode_view->ExportOptions->render("body") ?>
<?php $t003_chargecode_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t003_chargecode_view->showPageHeader(); ?>
<?php
$t003_chargecode_view->showMessage();
?>
<form name="ft003_chargecodeview" id="ft003_chargecodeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t003_chargecode_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t003_chargecode_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_chargecode">
<input type="hidden" name="modal" value="<?php echo (int)$t003_chargecode_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t003_chargecode->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t003_chargecode_view->TableLeftColumnClass ?>"><span id="elh_t003_chargecode_id"><?php echo $t003_chargecode->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t003_chargecode->id->cellAttributes() ?>>
<span id="el_t003_chargecode_id">
<span<?php echo $t003_chargecode->id->viewAttributes() ?>>
<?php echo $t003_chargecode->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t003_chargecode->Charge_Code->Visible) { // Charge_Code ?>
	<tr id="r_Charge_Code">
		<td class="<?php echo $t003_chargecode_view->TableLeftColumnClass ?>"><span id="elh_t003_chargecode_Charge_Code"><?php echo $t003_chargecode->Charge_Code->caption() ?></span></td>
		<td data-name="Charge_Code"<?php echo $t003_chargecode->Charge_Code->cellAttributes() ?>>
<span id="el_t003_chargecode_Charge_Code">
<span<?php echo $t003_chargecode->Charge_Code->viewAttributes() ?>>
<?php echo $t003_chargecode->Charge_Code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t003_chargecode_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t003_chargecode->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t003_chargecode_view->terminate();
?>