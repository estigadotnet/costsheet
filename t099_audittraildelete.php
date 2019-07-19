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
$t099_audittrail_delete = new t099_audittrail_delete();

// Run the page
$t099_audittrail_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t099_audittrail_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft099_audittraildelete = currentForm = new ew.Form("ft099_audittraildelete", "delete");

// Form_CustomValidate event
ft099_audittraildelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft099_audittraildelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t099_audittrail_delete->showPageHeader(); ?>
<?php
$t099_audittrail_delete->showMessage();
?>
<form name="ft099_audittraildelete" id="ft099_audittraildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t099_audittrail_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t099_audittrail_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t099_audittrail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t099_audittrail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t099_audittrail->id->Visible) { // id ?>
		<th class="<?php echo $t099_audittrail->id->headerCellClass() ?>"><span id="elh_t099_audittrail_id" class="t099_audittrail_id"><?php echo $t099_audittrail->id->caption() ?></span></th>
<?php } ?>
<?php if ($t099_audittrail->datetime->Visible) { // datetime ?>
		<th class="<?php echo $t099_audittrail->datetime->headerCellClass() ?>"><span id="elh_t099_audittrail_datetime" class="t099_audittrail_datetime"><?php echo $t099_audittrail->datetime->caption() ?></span></th>
<?php } ?>
<?php if ($t099_audittrail->script->Visible) { // script ?>
		<th class="<?php echo $t099_audittrail->script->headerCellClass() ?>"><span id="elh_t099_audittrail_script" class="t099_audittrail_script"><?php echo $t099_audittrail->script->caption() ?></span></th>
<?php } ?>
<?php if ($t099_audittrail->user->Visible) { // user ?>
		<th class="<?php echo $t099_audittrail->user->headerCellClass() ?>"><span id="elh_t099_audittrail_user" class="t099_audittrail_user"><?php echo $t099_audittrail->user->caption() ?></span></th>
<?php } ?>
<?php if ($t099_audittrail->_action->Visible) { // action ?>
		<th class="<?php echo $t099_audittrail->_action->headerCellClass() ?>"><span id="elh_t099_audittrail__action" class="t099_audittrail__action"><?php echo $t099_audittrail->_action->caption() ?></span></th>
<?php } ?>
<?php if ($t099_audittrail->_table->Visible) { // table ?>
		<th class="<?php echo $t099_audittrail->_table->headerCellClass() ?>"><span id="elh_t099_audittrail__table" class="t099_audittrail__table"><?php echo $t099_audittrail->_table->caption() ?></span></th>
<?php } ?>
<?php if ($t099_audittrail->field->Visible) { // field ?>
		<th class="<?php echo $t099_audittrail->field->headerCellClass() ?>"><span id="elh_t099_audittrail_field" class="t099_audittrail_field"><?php echo $t099_audittrail->field->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t099_audittrail_delete->RecCnt = 0;
$i = 0;
while (!$t099_audittrail_delete->Recordset->EOF) {
	$t099_audittrail_delete->RecCnt++;
	$t099_audittrail_delete->RowCnt++;

	// Set row properties
	$t099_audittrail->resetAttributes();
	$t099_audittrail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t099_audittrail_delete->loadRowValues($t099_audittrail_delete->Recordset);

	// Render row
	$t099_audittrail_delete->renderRow();
?>
	<tr<?php echo $t099_audittrail->rowAttributes() ?>>
<?php if ($t099_audittrail->id->Visible) { // id ?>
		<td<?php echo $t099_audittrail->id->cellAttributes() ?>>
<span id="el<?php echo $t099_audittrail_delete->RowCnt ?>_t099_audittrail_id" class="t099_audittrail_id">
<span<?php echo $t099_audittrail->id->viewAttributes() ?>>
<?php echo $t099_audittrail->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t099_audittrail->datetime->Visible) { // datetime ?>
		<td<?php echo $t099_audittrail->datetime->cellAttributes() ?>>
<span id="el<?php echo $t099_audittrail_delete->RowCnt ?>_t099_audittrail_datetime" class="t099_audittrail_datetime">
<span<?php echo $t099_audittrail->datetime->viewAttributes() ?>>
<?php echo $t099_audittrail->datetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t099_audittrail->script->Visible) { // script ?>
		<td<?php echo $t099_audittrail->script->cellAttributes() ?>>
<span id="el<?php echo $t099_audittrail_delete->RowCnt ?>_t099_audittrail_script" class="t099_audittrail_script">
<span<?php echo $t099_audittrail->script->viewAttributes() ?>>
<?php echo $t099_audittrail->script->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t099_audittrail->user->Visible) { // user ?>
		<td<?php echo $t099_audittrail->user->cellAttributes() ?>>
<span id="el<?php echo $t099_audittrail_delete->RowCnt ?>_t099_audittrail_user" class="t099_audittrail_user">
<span<?php echo $t099_audittrail->user->viewAttributes() ?>>
<?php echo $t099_audittrail->user->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t099_audittrail->_action->Visible) { // action ?>
		<td<?php echo $t099_audittrail->_action->cellAttributes() ?>>
<span id="el<?php echo $t099_audittrail_delete->RowCnt ?>_t099_audittrail__action" class="t099_audittrail__action">
<span<?php echo $t099_audittrail->_action->viewAttributes() ?>>
<?php echo $t099_audittrail->_action->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t099_audittrail->_table->Visible) { // table ?>
		<td<?php echo $t099_audittrail->_table->cellAttributes() ?>>
<span id="el<?php echo $t099_audittrail_delete->RowCnt ?>_t099_audittrail__table" class="t099_audittrail__table">
<span<?php echo $t099_audittrail->_table->viewAttributes() ?>>
<?php echo $t099_audittrail->_table->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t099_audittrail->field->Visible) { // field ?>
		<td<?php echo $t099_audittrail->field->cellAttributes() ?>>
<span id="el<?php echo $t099_audittrail_delete->RowCnt ?>_t099_audittrail_field" class="t099_audittrail_field">
<span<?php echo $t099_audittrail->field->viewAttributes() ?>>
<?php echo $t099_audittrail->field->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t099_audittrail_delete->Recordset->moveNext();
}
$t099_audittrail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t099_audittrail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t099_audittrail_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t099_audittrail_delete->terminate();
?>