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
$t101_costsheethead_add = new t101_costsheethead_add();

// Run the page
$t101_costsheethead_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_costsheethead_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft101_costsheetheadadd = currentForm = new ew.Form("ft101_costsheetheadadd", "add");

// Validate form
ft101_costsheetheadadd.validate = function() {
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
		<?php if ($t101_costsheethead_add->liner_id->Required) { ?>
			elm = this.getElements("x" + infix + "_liner_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->liner_id->caption(), $t101_costsheethead->liner_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_costsheethead_add->no_bl->Required) { ?>
			elm = this.getElements("x" + infix + "_no_bl");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->no_bl->caption(), $t101_costsheethead->no_bl->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_costsheethead_add->shipper_id->Required) { ?>
			elm = this.getElements("x" + infix + "_shipper_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->shipper_id->caption(), $t101_costsheethead->shipper_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_costsheethead_add->top_1->Required) { ?>
			elm = this.getElements("x" + infix + "_top_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->top_1->caption(), $t101_costsheethead->top_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_costsheethead_add->vol->Required) { ?>
			elm = this.getElements("x" + infix + "_vol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->vol->caption(), $t101_costsheethead->vol->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_vol");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_costsheethead->vol->errorMessage()) ?>");
		<?php if ($t101_costsheethead_add->cont->Required) { ?>
			elm = this.getElements("x" + infix + "_cont");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->cont->caption(), $t101_costsheethead->cont->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_costsheethead_add->no_ref->Required) { ?>
			elm = this.getElements("x" + infix + "_no_ref");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->no_ref->caption(), $t101_costsheethead->no_ref->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_costsheethead_add->vsl_voy->Required) { ?>
			elm = this.getElements("x" + infix + "_vsl_voy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->vsl_voy->caption(), $t101_costsheethead->vsl_voy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_costsheethead_add->pol_pod->Required) { ?>
			elm = this.getElements("x" + infix + "_pol_pod");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->pol_pod->caption(), $t101_costsheethead->pol_pod->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_costsheethead_add->top_2->Required) { ?>
			elm = this.getElements("x" + infix + "_top_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->top_2->caption(), $t101_costsheethead->top_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_costsheethead_add->no_cont->Required) { ?>
			elm = this.getElements("x" + infix + "_no_cont");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->no_cont->caption(), $t101_costsheethead->no_cont->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_costsheethead_add->cs_date->Required) { ?>
			elm = this.getElements("x" + infix + "_cs_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_costsheethead->cs_date->caption(), $t101_costsheethead->cs_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_cs_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_costsheethead->cs_date->errorMessage()) ?>");

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
ft101_costsheetheadadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_costsheetheadadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Multi-Page
ft101_costsheetheadadd.multiPage = new ew.MultiPage("ft101_costsheetheadadd");

// Dynamic selection lists
ft101_costsheetheadadd.lists["x_liner_id"] = <?php echo $t101_costsheethead_add->liner_id->Lookup->toClientList() ?>;
ft101_costsheetheadadd.lists["x_liner_id"].options = <?php echo JsonEncode($t101_costsheethead_add->liner_id->lookupOptions()) ?>;
ft101_costsheetheadadd.lists["x_shipper_id"] = <?php echo $t101_costsheethead_add->shipper_id->Lookup->toClientList() ?>;
ft101_costsheetheadadd.lists["x_shipper_id"].options = <?php echo JsonEncode($t101_costsheethead_add->shipper_id->lookupOptions()) ?>;
ft101_costsheetheadadd.lists["x_top_1"] = <?php echo $t101_costsheethead_add->top_1->Lookup->toClientList() ?>;
ft101_costsheetheadadd.lists["x_top_1"].options = <?php echo JsonEncode($t101_costsheethead_add->top_1->options(FALSE, TRUE)) ?>;
ft101_costsheetheadadd.lists["x_cont"] = <?php echo $t101_costsheethead_add->cont->Lookup->toClientList() ?>;
ft101_costsheetheadadd.lists["x_cont"].options = <?php echo JsonEncode($t101_costsheethead_add->cont->options(FALSE, TRUE)) ?>;
ft101_costsheetheadadd.lists["x_top_2"] = <?php echo $t101_costsheethead_add->top_2->Lookup->toClientList() ?>;
ft101_costsheetheadadd.lists["x_top_2"].options = <?php echo JsonEncode($t101_costsheethead_add->top_2->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t101_costsheethead_add->showPageHeader(); ?>
<?php
$t101_costsheethead_add->showMessage();
?>
<form name="ft101_costsheetheadadd" id="ft101_costsheetheadadd" class="<?php echo $t101_costsheethead_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_costsheethead_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_costsheethead_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_costsheethead">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t101_costsheethead_add->IsModal ?>">
<div class="ew-multi-page"><!-- multi-page -->
<div class="ew-nav-tabs" id="t101_costsheethead_add"><!-- multi-page tabs -->
	<ul class="<?php echo $t101_costsheethead_add->MultiPages->navStyle() ?>">
		<li class="nav-item"><a class="nav-link<?php echo $t101_costsheethead_add->MultiPages->pageStyle("1") ?>" href="#tab_t101_costsheethead1" data-toggle="tab"><?php echo $t101_costsheethead->pageCaption(1) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $t101_costsheethead_add->MultiPages->pageStyle("2") ?>" href="#tab_t101_costsheethead2" data-toggle="tab"><?php echo $t101_costsheethead->pageCaption(2) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $t101_costsheethead_add->MultiPages->pageStyle("3") ?>" href="#tab_t101_costsheethead3" data-toggle="tab"><?php echo $t101_costsheethead->pageCaption(3) ?></a></li>
	</ul>
	<div class="tab-content"><!-- multi-page tabs .tab-content -->
		<div class="tab-pane<?php echo $t101_costsheethead_add->MultiPages->pageStyle("1") ?>" id="tab_t101_costsheethead1"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($t101_costsheethead->liner_id->Visible) { // liner_id ?>
	<div id="r_liner_id" class="form-group row">
		<label id="elh_t101_costsheethead_liner_id" for="x_liner_id" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->liner_id->caption() ?><?php echo ($t101_costsheethead->liner_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->liner_id->cellAttributes() ?>>
<span id="el_t101_costsheethead_liner_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_costsheethead" data-field="x_liner_id" data-page="1" data-value-separator="<?php echo $t101_costsheethead->liner_id->displayValueSeparatorAttribute() ?>" id="x_liner_id" name="x_liner_id"<?php echo $t101_costsheethead->liner_id->editAttributes() ?>>
		<?php echo $t101_costsheethead->liner_id->selectOptionListHtml("x_liner_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t001_liner") && !$t101_costsheethead->liner_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_liner_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_costsheethead->liner_id->caption() ?>" data-title="<?php echo $t101_costsheethead->liner_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_liner_id',url:'t001_lineraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t101_costsheethead->liner_id->Lookup->getParamTag("p_x_liner_id") ?>
</span>
<?php echo $t101_costsheethead->liner_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_costsheethead->no_bl->Visible) { // no_bl ?>
	<div id="r_no_bl" class="form-group row">
		<label id="elh_t101_costsheethead_no_bl" for="x_no_bl" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->no_bl->caption() ?><?php echo ($t101_costsheethead->no_bl->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->no_bl->cellAttributes() ?>>
<span id="el_t101_costsheethead_no_bl">
<input type="text" data-table="t101_costsheethead" data-field="x_no_bl" data-page="1" name="x_no_bl" id="x_no_bl" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t101_costsheethead->no_bl->getPlaceHolder()) ?>" value="<?php echo $t101_costsheethead->no_bl->EditValue ?>"<?php echo $t101_costsheethead->no_bl->editAttributes() ?>>
</span>
<?php echo $t101_costsheethead->no_bl->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_costsheethead->shipper_id->Visible) { // shipper_id ?>
	<div id="r_shipper_id" class="form-group row">
		<label id="elh_t101_costsheethead_shipper_id" for="x_shipper_id" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->shipper_id->caption() ?><?php echo ($t101_costsheethead->shipper_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->shipper_id->cellAttributes() ?>>
<span id="el_t101_costsheethead_shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_costsheethead" data-field="x_shipper_id" data-page="1" data-value-separator="<?php echo $t101_costsheethead->shipper_id->displayValueSeparatorAttribute() ?>" id="x_shipper_id" name="x_shipper_id"<?php echo $t101_costsheethead->shipper_id->editAttributes() ?>>
		<?php echo $t101_costsheethead->shipper_id->selectOptionListHtml("x_shipper_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "t002_shipper") && !$t101_costsheethead->shipper_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_shipper_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_costsheethead->shipper_id->caption() ?>" data-title="<?php echo $t101_costsheethead->shipper_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_shipper_id',url:'t002_shipperaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $t101_costsheethead->shipper_id->Lookup->getParamTag("p_x_shipper_id") ?>
</span>
<?php echo $t101_costsheethead->shipper_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_costsheethead->top_1->Visible) { // top_1 ?>
	<div id="r_top_1" class="form-group row">
		<label id="elh_t101_costsheethead_top_1" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->top_1->caption() ?><?php echo ($t101_costsheethead->top_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->top_1->cellAttributes() ?>>
<span id="el_t101_costsheethead_top_1">
<div id="tp_x_top_1" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_costsheethead" data-field="x_top_1" data-page="1" data-value-separator="<?php echo $t101_costsheethead->top_1->displayValueSeparatorAttribute() ?>" name="x_top_1" id="x_top_1" value="{value}"<?php echo $t101_costsheethead->top_1->editAttributes() ?>></div>
<div id="dsl_x_top_1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_costsheethead->top_1->radioButtonListHtml(FALSE, "x_top_1", 1) ?>
</div></div>
</span>
<?php echo $t101_costsheethead->top_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_costsheethead->vol->Visible) { // vol ?>
	<div id="r_vol" class="form-group row">
		<label id="elh_t101_costsheethead_vol" for="x_vol" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->vol->caption() ?><?php echo ($t101_costsheethead->vol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->vol->cellAttributes() ?>>
<span id="el_t101_costsheethead_vol">
<input type="text" data-table="t101_costsheethead" data-field="x_vol" data-page="1" name="x_vol" id="x_vol" size="5" placeholder="<?php echo HtmlEncode($t101_costsheethead->vol->getPlaceHolder()) ?>" value="<?php echo $t101_costsheethead->vol->EditValue ?>"<?php echo $t101_costsheethead->vol->editAttributes() ?>>
</span>
<?php echo $t101_costsheethead->vol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_costsheethead->cont->Visible) { // cont ?>
	<div id="r_cont" class="form-group row">
		<label id="elh_t101_costsheethead_cont" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->cont->caption() ?><?php echo ($t101_costsheethead->cont->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->cont->cellAttributes() ?>>
<span id="el_t101_costsheethead_cont">
<div id="tp_x_cont" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_costsheethead" data-field="x_cont" data-page="1" data-value-separator="<?php echo $t101_costsheethead->cont->displayValueSeparatorAttribute() ?>" name="x_cont" id="x_cont" value="{value}"<?php echo $t101_costsheethead->cont->editAttributes() ?>></div>
<div id="dsl_x_cont" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_costsheethead->cont->radioButtonListHtml(FALSE, "x_cont", 1) ?>
</div></div>
</span>
<?php echo $t101_costsheethead->cont->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $t101_costsheethead_add->MultiPages->pageStyle("2") ?>" id="tab_t101_costsheethead2"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($t101_costsheethead->no_ref->Visible) { // no_ref ?>
	<div id="r_no_ref" class="form-group row">
		<label id="elh_t101_costsheethead_no_ref" for="x_no_ref" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->no_ref->caption() ?><?php echo ($t101_costsheethead->no_ref->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->no_ref->cellAttributes() ?>>
<span id="el_t101_costsheethead_no_ref">
<input type="text" data-table="t101_costsheethead" data-field="x_no_ref" data-page="2" name="x_no_ref" id="x_no_ref" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t101_costsheethead->no_ref->getPlaceHolder()) ?>" value="<?php echo $t101_costsheethead->no_ref->EditValue ?>"<?php echo $t101_costsheethead->no_ref->editAttributes() ?>>
</span>
<?php echo $t101_costsheethead->no_ref->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_costsheethead->vsl_voy->Visible) { // vsl_voy ?>
	<div id="r_vsl_voy" class="form-group row">
		<label id="elh_t101_costsheethead_vsl_voy" for="x_vsl_voy" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->vsl_voy->caption() ?><?php echo ($t101_costsheethead->vsl_voy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->vsl_voy->cellAttributes() ?>>
<span id="el_t101_costsheethead_vsl_voy">
<input type="text" data-table="t101_costsheethead" data-field="x_vsl_voy" data-page="2" name="x_vsl_voy" id="x_vsl_voy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t101_costsheethead->vsl_voy->getPlaceHolder()) ?>" value="<?php echo $t101_costsheethead->vsl_voy->EditValue ?>"<?php echo $t101_costsheethead->vsl_voy->editAttributes() ?>>
</span>
<?php echo $t101_costsheethead->vsl_voy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_costsheethead->pol_pod->Visible) { // pol_pod ?>
	<div id="r_pol_pod" class="form-group row">
		<label id="elh_t101_costsheethead_pol_pod" for="x_pol_pod" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->pol_pod->caption() ?><?php echo ($t101_costsheethead->pol_pod->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->pol_pod->cellAttributes() ?>>
<span id="el_t101_costsheethead_pol_pod">
<input type="text" data-table="t101_costsheethead" data-field="x_pol_pod" data-page="2" name="x_pol_pod" id="x_pol_pod" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t101_costsheethead->pol_pod->getPlaceHolder()) ?>" value="<?php echo $t101_costsheethead->pol_pod->EditValue ?>"<?php echo $t101_costsheethead->pol_pod->editAttributes() ?>>
</span>
<?php echo $t101_costsheethead->pol_pod->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_costsheethead->top_2->Visible) { // top_2 ?>
	<div id="r_top_2" class="form-group row">
		<label id="elh_t101_costsheethead_top_2" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->top_2->caption() ?><?php echo ($t101_costsheethead->top_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->top_2->cellAttributes() ?>>
<span id="el_t101_costsheethead_top_2">
<div id="tp_x_top_2" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_costsheethead" data-field="x_top_2" data-page="2" data-value-separator="<?php echo $t101_costsheethead->top_2->displayValueSeparatorAttribute() ?>" name="x_top_2" id="x_top_2" value="{value}"<?php echo $t101_costsheethead->top_2->editAttributes() ?>></div>
<div id="dsl_x_top_2" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_costsheethead->top_2->radioButtonListHtml(FALSE, "x_top_2", 2) ?>
</div></div>
</span>
<?php echo $t101_costsheethead->top_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_costsheethead->no_cont->Visible) { // no_cont ?>
	<div id="r_no_cont" class="form-group row">
		<label id="elh_t101_costsheethead_no_cont" for="x_no_cont" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->no_cont->caption() ?><?php echo ($t101_costsheethead->no_cont->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->no_cont->cellAttributes() ?>>
<span id="el_t101_costsheethead_no_cont">
<input type="text" data-table="t101_costsheethead" data-field="x_no_cont" data-page="2" name="x_no_cont" id="x_no_cont" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t101_costsheethead->no_cont->getPlaceHolder()) ?>" value="<?php echo $t101_costsheethead->no_cont->EditValue ?>"<?php echo $t101_costsheethead->no_cont->editAttributes() ?>>
</span>
<?php echo $t101_costsheethead->no_cont->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $t101_costsheethead_add->MultiPages->pageStyle("3") ?>" id="tab_t101_costsheethead3"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($t101_costsheethead->cs_date->Visible) { // cs_date ?>
	<div id="r_cs_date" class="form-group row">
		<label id="elh_t101_costsheethead_cs_date" for="x_cs_date" class="<?php echo $t101_costsheethead_add->LeftColumnClass ?>"><?php echo $t101_costsheethead->cs_date->caption() ?><?php echo ($t101_costsheethead->cs_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_costsheethead_add->RightColumnClass ?>"><div<?php echo $t101_costsheethead->cs_date->cellAttributes() ?>>
<span id="el_t101_costsheethead_cs_date">
<input type="text" data-table="t101_costsheethead" data-field="x_cs_date" data-page="3" data-format="11" name="x_cs_date" id="x_cs_date" placeholder="<?php echo HtmlEncode($t101_costsheethead->cs_date->getPlaceHolder()) ?>" value="<?php echo $t101_costsheethead->cs_date->EditValue ?>"<?php echo $t101_costsheethead->cs_date->editAttributes() ?>>
<?php if (!$t101_costsheethead->cs_date->ReadOnly && !$t101_costsheethead->cs_date->Disabled && !isset($t101_costsheethead->cs_date->EditAttrs["readonly"]) && !isset($t101_costsheethead->cs_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_costsheetheadadd", "x_cs_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php echo $t101_costsheethead->cs_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
	</div><!-- /multi-page tabs .tab-content -->
</div><!-- /multi-page tabs -->
</div><!-- /multi-page -->
<?php
	if (in_array("t102_costsheetdetail", explode(",", $t101_costsheethead->getCurrentDetailTable())) && $t102_costsheetdetail->DetailAdd) {
?>
<?php if ($t101_costsheethead->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t102_costsheetdetail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t102_costsheetdetailgrid.php" ?>
<?php } ?>
<?php if (!$t101_costsheethead_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_costsheethead_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_costsheethead_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_costsheethead_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
	// tampilkan TANGGAL HARI INI
	//$("[data-table=t101_costsheethead][data-field=x_cs_date]").val("<?php echo date('d-m-Y H:i:s');?>");

</script>
<?php include_once "footer.php" ?>
<?php
$t101_costsheethead_add->terminate();
?>