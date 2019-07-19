<?php
namespace PHPMaker2019\costsheet_prj;
?>
<?php if ($t101_costsheethead->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t101_costsheetheadmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t101_costsheethead->liner_id->Visible) { // liner_id ?>
		<tr id="r_liner_id">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->liner_id->caption() ?></td>
			<td<?php echo $t101_costsheethead->liner_id->cellAttributes() ?>>
<span id="el_t101_costsheethead_liner_id">
<span<?php echo $t101_costsheethead->liner_id->viewAttributes() ?>>
<?php echo $t101_costsheethead->liner_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_costsheethead->no_bl->Visible) { // no_bl ?>
		<tr id="r_no_bl">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->no_bl->caption() ?></td>
			<td<?php echo $t101_costsheethead->no_bl->cellAttributes() ?>>
<span id="el_t101_costsheethead_no_bl">
<span<?php echo $t101_costsheethead->no_bl->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_bl->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_costsheethead->shipper_id->Visible) { // shipper_id ?>
		<tr id="r_shipper_id">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->shipper_id->caption() ?></td>
			<td<?php echo $t101_costsheethead->shipper_id->cellAttributes() ?>>
<span id="el_t101_costsheethead_shipper_id">
<span<?php echo $t101_costsheethead->shipper_id->viewAttributes() ?>>
<?php echo $t101_costsheethead->shipper_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_costsheethead->top_1->Visible) { // top_1 ?>
		<tr id="r_top_1">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->top_1->caption() ?></td>
			<td<?php echo $t101_costsheethead->top_1->cellAttributes() ?>>
<span id="el_t101_costsheethead_top_1">
<span<?php echo $t101_costsheethead->top_1->viewAttributes() ?>>
<?php echo $t101_costsheethead->top_1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_costsheethead->vol->Visible) { // vol ?>
		<tr id="r_vol">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->vol->caption() ?></td>
			<td<?php echo $t101_costsheethead->vol->cellAttributes() ?>>
<span id="el_t101_costsheethead_vol">
<span<?php echo $t101_costsheethead->vol->viewAttributes() ?>>
<?php echo $t101_costsheethead->vol->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_costsheethead->cont->Visible) { // cont ?>
		<tr id="r_cont">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->cont->caption() ?></td>
			<td<?php echo $t101_costsheethead->cont->cellAttributes() ?>>
<span id="el_t101_costsheethead_cont">
<span<?php echo $t101_costsheethead->cont->viewAttributes() ?>>
<?php echo $t101_costsheethead->cont->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_costsheethead->no_ref->Visible) { // no_ref ?>
		<tr id="r_no_ref">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->no_ref->caption() ?></td>
			<td<?php echo $t101_costsheethead->no_ref->cellAttributes() ?>>
<span id="el_t101_costsheethead_no_ref">
<span<?php echo $t101_costsheethead->no_ref->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_ref->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_costsheethead->vsl_voy->Visible) { // vsl_voy ?>
		<tr id="r_vsl_voy">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->vsl_voy->caption() ?></td>
			<td<?php echo $t101_costsheethead->vsl_voy->cellAttributes() ?>>
<span id="el_t101_costsheethead_vsl_voy">
<span<?php echo $t101_costsheethead->vsl_voy->viewAttributes() ?>>
<?php echo $t101_costsheethead->vsl_voy->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_costsheethead->pol_pod->Visible) { // pol_pod ?>
		<tr id="r_pol_pod">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->pol_pod->caption() ?></td>
			<td<?php echo $t101_costsheethead->pol_pod->cellAttributes() ?>>
<span id="el_t101_costsheethead_pol_pod">
<span<?php echo $t101_costsheethead->pol_pod->viewAttributes() ?>>
<?php echo $t101_costsheethead->pol_pod->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_costsheethead->top_2->Visible) { // top_2 ?>
		<tr id="r_top_2">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->top_2->caption() ?></td>
			<td<?php echo $t101_costsheethead->top_2->cellAttributes() ?>>
<span id="el_t101_costsheethead_top_2">
<span<?php echo $t101_costsheethead->top_2->viewAttributes() ?>>
<?php echo $t101_costsheethead->top_2->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_costsheethead->no_cont->Visible) { // no_cont ?>
		<tr id="r_no_cont">
			<td class="<?php echo $t101_costsheethead->TableLeftColumnClass ?>"><?php echo $t101_costsheethead->no_cont->caption() ?></td>
			<td<?php echo $t101_costsheethead->no_cont->cellAttributes() ?>>
<span id="el_t101_costsheethead_no_cont">
<span<?php echo $t101_costsheethead->no_cont->viewAttributes() ?>>
<?php echo $t101_costsheethead->no_cont->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>