<?php
namespace PHPMaker2019\costsheet_prj;

/**
 * Table class for t101_costsheethead
 */
class t101_costsheethead extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Audit trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

	// Export
	public $ExportDoc;

	// Fields
	public $id;
	public $liner_id;
	public $no_bl;
	public $shipper_id;
	public $top_1;
	public $vol;
	public $cont;
	public $no_ref;
	public $vsl_voy;
	public $pol_pod;
	public $top_2;
	public $no_cont;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 't101_costsheethead';
		$this->TableName = 't101_costsheethead';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`t101_costsheethead`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 2;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('t101_costsheethead', 't101_costsheethead', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// liner_id
		$this->liner_id = new DbField('t101_costsheethead', 't101_costsheethead', 'x_liner_id', 'liner_id', '`liner_id`', '`liner_id`', 3, -1, FALSE, '`liner_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->liner_id->Nullable = FALSE; // NOT NULL field
		$this->liner_id->Required = TRUE; // Required field
		$this->liner_id->Sortable = TRUE; // Allow sort
		$this->liner_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->liner_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->liner_id->Lookup = new Lookup('liner_id', 't001_liner', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->liner_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['liner_id'] = &$this->liner_id;

		// no_bl
		$this->no_bl = new DbField('t101_costsheethead', 't101_costsheethead', 'x_no_bl', 'no_bl', '`no_bl`', '`no_bl`', 200, -1, FALSE, '`no_bl`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->no_bl->Nullable = FALSE; // NOT NULL field
		$this->no_bl->Required = TRUE; // Required field
		$this->no_bl->Sortable = TRUE; // Allow sort
		$this->fields['no_bl'] = &$this->no_bl;

		// shipper_id
		$this->shipper_id = new DbField('t101_costsheethead', 't101_costsheethead', 'x_shipper_id', 'shipper_id', '`shipper_id`', '`shipper_id`', 3, -1, FALSE, '`shipper_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->shipper_id->Nullable = FALSE; // NOT NULL field
		$this->shipper_id->Required = TRUE; // Required field
		$this->shipper_id->Sortable = TRUE; // Allow sort
		$this->shipper_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->shipper_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->shipper_id->Lookup = new Lookup('shipper_id', 't002_shipper', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->shipper_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['shipper_id'] = &$this->shipper_id;

		// top_1
		$this->top_1 = new DbField('t101_costsheethead', 't101_costsheethead', 'x_top_1', 'top_1', '`top_1`', '`top_1`', 202, -1, FALSE, '`top_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->top_1->Nullable = FALSE; // NOT NULL field
		$this->top_1->Sortable = TRUE; // Allow sort
		$this->top_1->Lookup = new Lookup('top_1', 't101_costsheethead', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->top_1->OptionCount = 2;
		$this->fields['top_1'] = &$this->top_1;

		// vol
		$this->vol = new DbField('t101_costsheethead', 't101_costsheethead', 'x_vol', 'vol', '`vol`', '`vol`', 16, -1, FALSE, '`vol`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->vol->Nullable = FALSE; // NOT NULL field
		$this->vol->Sortable = TRUE; // Allow sort
		$this->vol->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['vol'] = &$this->vol;

		// cont
		$this->cont = new DbField('t101_costsheethead', 't101_costsheethead', 'x_cont', 'cont', '`cont`', '`cont`', 202, -1, FALSE, '`cont`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->cont->Nullable = FALSE; // NOT NULL field
		$this->cont->Sortable = TRUE; // Allow sort
		$this->cont->Lookup = new Lookup('cont', 't101_costsheethead', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->cont->OptionCount = 2;
		$this->fields['cont'] = &$this->cont;

		// no_ref
		$this->no_ref = new DbField('t101_costsheethead', 't101_costsheethead', 'x_no_ref', 'no_ref', '`no_ref`', '`no_ref`', 200, -1, FALSE, '`no_ref`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->no_ref->Nullable = FALSE; // NOT NULL field
		$this->no_ref->Required = TRUE; // Required field
		$this->no_ref->Sortable = TRUE; // Allow sort
		$this->fields['no_ref'] = &$this->no_ref;

		// vsl_voy
		$this->vsl_voy = new DbField('t101_costsheethead', 't101_costsheethead', 'x_vsl_voy', 'vsl_voy', '`vsl_voy`', '`vsl_voy`', 200, -1, FALSE, '`vsl_voy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->vsl_voy->Nullable = FALSE; // NOT NULL field
		$this->vsl_voy->Required = TRUE; // Required field
		$this->vsl_voy->Sortable = TRUE; // Allow sort
		$this->fields['vsl_voy'] = &$this->vsl_voy;

		// pol_pod
		$this->pol_pod = new DbField('t101_costsheethead', 't101_costsheethead', 'x_pol_pod', 'pol_pod', '`pol_pod`', '`pol_pod`', 200, -1, FALSE, '`pol_pod`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pol_pod->Nullable = FALSE; // NOT NULL field
		$this->pol_pod->Required = TRUE; // Required field
		$this->pol_pod->Sortable = TRUE; // Allow sort
		$this->fields['pol_pod'] = &$this->pol_pod;

		// top_2
		$this->top_2 = new DbField('t101_costsheethead', 't101_costsheethead', 'x_top_2', 'top_2', '`top_2`', '`top_2`', 202, -1, FALSE, '`top_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->top_2->Nullable = FALSE; // NOT NULL field
		$this->top_2->Sortable = TRUE; // Allow sort
		$this->top_2->Lookup = new Lookup('top_2', 't101_costsheethead', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->top_2->OptionCount = 2;
		$this->fields['top_2'] = &$this->top_2;

		// no_cont
		$this->no_cont = new DbField('t101_costsheethead', 't101_costsheethead', 'x_no_cont', 'no_cont', '`no_cont`', '`no_cont`', 200, -1, FALSE, '`no_cont`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->no_cont->Nullable = FALSE; // NOT NULL field
		$this->no_cont->Required = TRUE; // Required field
		$this->no_cont->Sortable = TRUE; // Allow sort
		$this->fields['no_cont'] = &$this->no_cont;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Multiple column sort
	public function updateSort(&$fld, $ctrl)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			if ($ctrl) {
				$orderBy = $this->getSessionOrderBy();
				if (ContainsString($orderBy, $sortField . " " . $lastSort)) {
					$orderBy = str_replace($sortField . " " . $lastSort, $sortField . " " . $thisSort, $orderBy);
				} else {
					if ($orderBy <> "")
						$orderBy .= ", ";
					$orderBy .= $sortField . " " . $thisSort;
				}
				$this->setSessionOrderBy($orderBy); // Save to Session
			} else {
				$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
			}
		} else {
			if (!$ctrl)
				$fld->setSort("");
		}
	}

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "t102_costsheetdetail") {
			$detailUrl = $GLOBALS["t102_costsheetdetail"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "t101_costsheetheadlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`t101_costsheethead`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailOnAdd($rs);
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		if ($success && $this->AuditTrailOnEdit && $rsold) {
			$rsaudit = $rs;
			$fldname = 'id';
			if (!array_key_exists($fldname, $rsaudit))
				$rsaudit[$fldname] = $rsold[$fldname];
			$this->writeAuditTrailOnEdit($rsold, $rsaudit);
		}
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		if ($success && $this->AuditTrailOnDelete)
			$this->writeAuditTrailOnDelete($rs);
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->liner_id->DbValue = $row['liner_id'];
		$this->no_bl->DbValue = $row['no_bl'];
		$this->shipper_id->DbValue = $row['shipper_id'];
		$this->top_1->DbValue = $row['top_1'];
		$this->vol->DbValue = $row['vol'];
		$this->cont->DbValue = $row['cont'];
		$this->no_ref->DbValue = $row['no_ref'];
		$this->vsl_voy->DbValue = $row['vsl_voy'];
		$this->pol_pod->DbValue = $row['pol_pod'];
		$this->top_2->DbValue = $row['top_2'];
		$this->no_cont->DbValue = $row['no_cont'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "t101_costsheetheadlist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "t101_costsheetheadview.php")
			return $Language->phrase("View");
		elseif ($pageName == "t101_costsheetheadedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "t101_costsheetheadadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "t101_costsheetheadlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("t101_costsheetheadview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_costsheetheadview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "t101_costsheetheadadd.php?" . $this->getUrlParm($parm);
		else
			$url = "t101_costsheetheadadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("t101_costsheetheadedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_costsheetheadedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("t101_costsheetheadadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_costsheetheadadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("t101_costsheetheaddelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->id->CurrentValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->liner_id->setDbValue($rs->fields('liner_id'));
		$this->no_bl->setDbValue($rs->fields('no_bl'));
		$this->shipper_id->setDbValue($rs->fields('shipper_id'));
		$this->top_1->setDbValue($rs->fields('top_1'));
		$this->vol->setDbValue($rs->fields('vol'));
		$this->cont->setDbValue($rs->fields('cont'));
		$this->no_ref->setDbValue($rs->fields('no_ref'));
		$this->vsl_voy->setDbValue($rs->fields('vsl_voy'));
		$this->pol_pod->setDbValue($rs->fields('pol_pod'));
		$this->top_2->setDbValue($rs->fields('top_2'));
		$this->no_cont->setDbValue($rs->fields('no_cont'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// liner_id
		// no_bl
		// shipper_id
		// top_1
		// vol
		// cont
		// no_ref
		// vsl_voy
		// pol_pod
		// top_2
		// no_cont
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// liner_id
		$curVal = strval($this->liner_id->CurrentValue);
		if ($curVal <> "") {
			$this->liner_id->ViewValue = $this->liner_id->lookupCacheOption($curVal);
			if ($this->liner_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->liner_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->liner_id->ViewValue = $this->liner_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->liner_id->ViewValue = $this->liner_id->CurrentValue;
				}
			}
		} else {
			$this->liner_id->ViewValue = NULL;
		}
		$this->liner_id->ViewCustomAttributes = "";

		// no_bl
		$this->no_bl->ViewValue = $this->no_bl->CurrentValue;
		$this->no_bl->ViewCustomAttributes = "";

		// shipper_id
		$curVal = strval($this->shipper_id->CurrentValue);
		if ($curVal <> "") {
			$this->shipper_id->ViewValue = $this->shipper_id->lookupCacheOption($curVal);
			if ($this->shipper_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->shipper_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->shipper_id->ViewValue = $this->shipper_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->shipper_id->ViewValue = $this->shipper_id->CurrentValue;
				}
			}
		} else {
			$this->shipper_id->ViewValue = NULL;
		}
		$this->shipper_id->ViewCustomAttributes = "";

		// top_1
		if (strval($this->top_1->CurrentValue) <> "") {
			$this->top_1->ViewValue = $this->top_1->optionCaption($this->top_1->CurrentValue);
		} else {
			$this->top_1->ViewValue = NULL;
		}
		$this->top_1->ViewCustomAttributes = "";

		// vol
		$this->vol->ViewValue = $this->vol->CurrentValue;
		$this->vol->ViewValue = FormatNumber($this->vol->ViewValue, 0, -2, -2, -2);
		$this->vol->ViewCustomAttributes = "";

		// cont
		if (strval($this->cont->CurrentValue) <> "") {
			$this->cont->ViewValue = $this->cont->optionCaption($this->cont->CurrentValue);
		} else {
			$this->cont->ViewValue = NULL;
		}
		$this->cont->ViewCustomAttributes = "";

		// no_ref
		$this->no_ref->ViewValue = $this->no_ref->CurrentValue;
		$this->no_ref->ViewCustomAttributes = "";

		// vsl_voy
		$this->vsl_voy->ViewValue = $this->vsl_voy->CurrentValue;
		$this->vsl_voy->ViewCustomAttributes = "";

		// pol_pod
		$this->pol_pod->ViewValue = $this->pol_pod->CurrentValue;
		$this->pol_pod->ViewCustomAttributes = "";

		// top_2
		if (strval($this->top_2->CurrentValue) <> "") {
			$this->top_2->ViewValue = $this->top_2->optionCaption($this->top_2->CurrentValue);
		} else {
			$this->top_2->ViewValue = NULL;
		}
		$this->top_2->ViewCustomAttributes = "";

		// no_cont
		$this->no_cont->ViewValue = $this->no_cont->CurrentValue;
		$this->no_cont->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// liner_id
		$this->liner_id->LinkCustomAttributes = "";
		$this->liner_id->HrefValue = "";
		$this->liner_id->TooltipValue = "";

		// no_bl
		$this->no_bl->LinkCustomAttributes = "";
		$this->no_bl->HrefValue = "";
		$this->no_bl->TooltipValue = "";

		// shipper_id
		$this->shipper_id->LinkCustomAttributes = "";
		$this->shipper_id->HrefValue = "";
		$this->shipper_id->TooltipValue = "";

		// top_1
		$this->top_1->LinkCustomAttributes = "";
		$this->top_1->HrefValue = "";
		$this->top_1->TooltipValue = "";

		// vol
		$this->vol->LinkCustomAttributes = "";
		$this->vol->HrefValue = "";
		$this->vol->TooltipValue = "";

		// cont
		$this->cont->LinkCustomAttributes = "";
		$this->cont->HrefValue = "";
		$this->cont->TooltipValue = "";

		// no_ref
		$this->no_ref->LinkCustomAttributes = "";
		$this->no_ref->HrefValue = "";
		$this->no_ref->TooltipValue = "";

		// vsl_voy
		$this->vsl_voy->LinkCustomAttributes = "";
		$this->vsl_voy->HrefValue = "";
		$this->vsl_voy->TooltipValue = "";

		// pol_pod
		$this->pol_pod->LinkCustomAttributes = "";
		$this->pol_pod->HrefValue = "";
		$this->pol_pod->TooltipValue = "";

		// top_2
		$this->top_2->LinkCustomAttributes = "";
		$this->top_2->HrefValue = "";
		$this->top_2->TooltipValue = "";

		// no_cont
		$this->no_cont->LinkCustomAttributes = "";
		$this->no_cont->HrefValue = "";
		$this->no_cont->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// liner_id
		$this->liner_id->EditAttrs["class"] = "form-control";
		$this->liner_id->EditCustomAttributes = "";

		// no_bl
		$this->no_bl->EditAttrs["class"] = "form-control";
		$this->no_bl->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->no_bl->CurrentValue = HtmlDecode($this->no_bl->CurrentValue);
		$this->no_bl->EditValue = $this->no_bl->CurrentValue;
		$this->no_bl->PlaceHolder = RemoveHtml($this->no_bl->caption());

		// shipper_id
		$this->shipper_id->EditAttrs["class"] = "form-control";
		$this->shipper_id->EditCustomAttributes = "";

		// top_1
		$this->top_1->EditCustomAttributes = "";
		$this->top_1->EditValue = $this->top_1->options(FALSE);

		// vol
		$this->vol->EditAttrs["class"] = "form-control";
		$this->vol->EditCustomAttributes = "";
		$this->vol->EditValue = $this->vol->CurrentValue;
		$this->vol->PlaceHolder = RemoveHtml($this->vol->caption());

		// cont
		$this->cont->EditCustomAttributes = "";
		$this->cont->EditValue = $this->cont->options(FALSE);

		// no_ref
		$this->no_ref->EditAttrs["class"] = "form-control";
		$this->no_ref->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->no_ref->CurrentValue = HtmlDecode($this->no_ref->CurrentValue);
		$this->no_ref->EditValue = $this->no_ref->CurrentValue;
		$this->no_ref->PlaceHolder = RemoveHtml($this->no_ref->caption());

		// vsl_voy
		$this->vsl_voy->EditAttrs["class"] = "form-control";
		$this->vsl_voy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->vsl_voy->CurrentValue = HtmlDecode($this->vsl_voy->CurrentValue);
		$this->vsl_voy->EditValue = $this->vsl_voy->CurrentValue;
		$this->vsl_voy->PlaceHolder = RemoveHtml($this->vsl_voy->caption());

		// pol_pod
		$this->pol_pod->EditAttrs["class"] = "form-control";
		$this->pol_pod->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->pol_pod->CurrentValue = HtmlDecode($this->pol_pod->CurrentValue);
		$this->pol_pod->EditValue = $this->pol_pod->CurrentValue;
		$this->pol_pod->PlaceHolder = RemoveHtml($this->pol_pod->caption());

		// top_2
		$this->top_2->EditCustomAttributes = "";
		$this->top_2->EditValue = $this->top_2->options(FALSE);

		// no_cont
		$this->no_cont->EditAttrs["class"] = "form-control";
		$this->no_cont->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->no_cont->CurrentValue = HtmlDecode($this->no_cont->CurrentValue);
		$this->no_cont->EditValue = $this->no_cont->CurrentValue;
		$this->no_cont->PlaceHolder = RemoveHtml($this->no_cont->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->liner_id);
					$doc->exportCaption($this->no_bl);
					$doc->exportCaption($this->shipper_id);
					$doc->exportCaption($this->top_1);
					$doc->exportCaption($this->vol);
					$doc->exportCaption($this->cont);
					$doc->exportCaption($this->no_ref);
					$doc->exportCaption($this->vsl_voy);
					$doc->exportCaption($this->pol_pod);
					$doc->exportCaption($this->top_2);
					$doc->exportCaption($this->no_cont);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->liner_id);
					$doc->exportCaption($this->no_bl);
					$doc->exportCaption($this->shipper_id);
					$doc->exportCaption($this->top_1);
					$doc->exportCaption($this->vol);
					$doc->exportCaption($this->cont);
					$doc->exportCaption($this->no_ref);
					$doc->exportCaption($this->vsl_voy);
					$doc->exportCaption($this->pol_pod);
					$doc->exportCaption($this->top_2);
					$doc->exportCaption($this->no_cont);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->liner_id);
						$doc->exportField($this->no_bl);
						$doc->exportField($this->shipper_id);
						$doc->exportField($this->top_1);
						$doc->exportField($this->vol);
						$doc->exportField($this->cont);
						$doc->exportField($this->no_ref);
						$doc->exportField($this->vsl_voy);
						$doc->exportField($this->pol_pod);
						$doc->exportField($this->top_2);
						$doc->exportField($this->no_cont);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->liner_id);
						$doc->exportField($this->no_bl);
						$doc->exportField($this->shipper_id);
						$doc->exportField($this->top_1);
						$doc->exportField($this->vol);
						$doc->exportField($this->cont);
						$doc->exportField($this->no_ref);
						$doc->exportField($this->vsl_voy);
						$doc->exportField($this->pol_pod);
						$doc->exportField($this->top_2);
						$doc->exportField($this->no_cont);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));
		global $Security, $RequestSecurity;

		// Check token first
		$func = PROJECT_NAMESPACE . "CheckToken";
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($PROJECT_ID . $this->TableName);
					if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
					$validRequest = $Security->canList(); // List permission
					if ($validRequest) {
						$Security->UserID_Loading();
						$Security->loadUserID();
						$Security->UserID_Loaded();
					}
				}
			}
		} else {

			// User profile
			$UserProfile = new UserProfile();

			// Security
			$Security = new AdvancedSecurity();
			if (is_array($RequestSecurity)) // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
			$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel(CurrentProjectID() . $this->TableName);
			$Security->TablePermission_Loaded();
			$validRequest = $Security->canList(); // List permission
		}

		// Reject invalid request
		if (!$validRequest)
			return FALSE;

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Write Audit Trail start/end for grid update
	public function writeAuditTrailDummy($typ)
	{
		$table = 't101_costsheethead';
		$usr = CurrentUserID();
		WriteAuditTrail("log", DbCurrentDateTime(), ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	public function writeAuditTrailOnAdd(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnAdd)
			return;
		$table = 't101_costsheethead';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && $this->fields[$fldname]->DataType <> DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->HtmlTag == "PASSWORD") {
					$newvalue = $Language->phrase("PasswordMask"); // Password Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) {
					if (AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) {
					$newvalue = "[XML]"; // XML Field
				} else {
					$newvalue = $rs[$fldname];
				}
				WriteAuditTrail("log", $dt, $id, $usr, "A", $table, $fldname, $key, "", $newvalue);
			}
		}
	}

	// Write Audit Trail (edit page)
	public function writeAuditTrailOnEdit(&$rsold, &$rsnew)
	{
		global $Language;
		if (!$this->AuditTrailOnEdit)
			return;
		$table = 't101_costsheethead';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rsold['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && array_key_exists($fldname, $rsold) && $this->fields[$fldname]->DataType <> DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->DataType == DATATYPE_DATE) { // DateTime field
					$modified = (FormatDateTime($rsold[$fldname], 0) <> FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($this->fields[$fldname]->HtmlTag == "PASSWORD") { // Password Field
						$oldvalue = $Language->phrase("PasswordMask");
						$newvalue = $Language->phrase("PasswordMask");
					} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) { // Memo field
						if (AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) { // XML field
						$oldvalue = "[XML]";
						$newvalue = "[XML]";
					} else {
						$oldvalue = $rsold[$fldname];
						$newvalue = $rsnew[$fldname];
					}
					WriteAuditTrail("log", $dt, $id, $usr, "U", $table, $fldname, $key, $oldvalue, $newvalue);
				}
			}
		}
	}

	// Write Audit Trail (delete page)
	public function writeAuditTrailOnDelete(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnDelete)
			return;
		$table = 't101_costsheethead';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && $this->fields[$fldname]->DataType <> DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->HtmlTag == "PASSWORD") {
					$oldvalue = $Language->phrase("PasswordMask"); // Password Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) {
					if (AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) {
					$oldvalue = "[XML]"; // XML field
				} else {
					$oldvalue = $rs[$fldname];
				}
				WriteAuditTrail("log", $dt, $id, $curUser, "D", $table, $fldname, $key, $oldvalue, "");
			}
		}
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>