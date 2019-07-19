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
$t001_liner_view = new t001_liner_view();

// Run the page
$t001_liner_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_liner_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t001_liner->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft001_linerview = currentForm = new ew.Form("ft001_linerview", "view");

// Form_CustomValidate event
ft001_linerview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft001_linerview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t001_liner->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t001_liner_view->ExportOptions->render("body") ?>
<?php $t001_liner_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t001_liner_view->showPageHeader(); ?>
<?php
$t001_liner_view->showMessage();
?>
<form name="ft001_linerview" id="ft001_linerview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t001_liner_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t001_liner_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_liner">
<input type="hidden" name="modal" value="<?php echo (int)$t001_liner_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t001_liner->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t001_liner_view->TableLeftColumnClass ?>"><span id="elh_t001_liner_id"><?php echo $t001_liner->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t001_liner->id->cellAttributes() ?>>
<span id="el_t001_liner_id">
<span<?php echo $t001_liner->id->viewAttributes() ?>>
<?php echo $t001_liner->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_liner->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $t001_liner_view->TableLeftColumnClass ?>"><span id="elh_t001_liner_Name"><?php echo $t001_liner->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $t001_liner->Name->cellAttributes() ?>>
<span id="el_t001_liner_Name">
<span<?php echo $t001_liner->Name->viewAttributes() ?>>
<?php echo $t001_liner->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t001_liner_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t001_liner->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t001_liner_view->terminate();
?>