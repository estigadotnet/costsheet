<?php
namespace PHPMaker2019\costsheet_prj;

/**
 * Page class
 */
class t102_costsheetdetail_add extends t102_costsheetdetail
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{21082F44-1044-49E8-8088-092C72267B54}";

	// Table name
	public $TableName = 't102_costsheetdetail';

	// Page object name
	public $PageObjName = "t102_costsheetdetail_add";

	// Audit Trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page URL
	private $_pageUrl = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		if ($this->_pageUrl == "") {
			$this->_pageUrl = CurrentPageName() . "?";
			if ($this->UseTokenInUrl)
				$this->_pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		}
		return $this->_pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $COMPOSITE_KEY_SEPARATOR;
		global $UserTable, $UserTableConn;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (t102_costsheetdetail)
		if (!isset($GLOBALS["t102_costsheetdetail"]) || get_class($GLOBALS["t102_costsheetdetail"]) == PROJECT_NAMESPACE . "t102_costsheetdetail") {
			$GLOBALS["t102_costsheetdetail"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t102_costsheetdetail"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (t096_employees)
		if (!isset($GLOBALS['t096_employees']))
			$GLOBALS['t096_employees'] = new t096_employees();

		// Table object (t101_costsheethead)
		if (!isset($GLOBALS['t101_costsheethead']))
			$GLOBALS['t101_costsheethead'] = new t101_costsheethead();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't102_costsheetdetail');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// User table object (t096_employees)
		if (!isset($UserTable)) {
			$UserTable = new t096_employees();
			$UserTableConn = Conn($UserTable->Dbid);
		}
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $t102_costsheetdetail;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($t102_costsheetdetail);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "t102_costsheetdetailview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		$validRequest = FALSE;

		// Check security for API request
		If (IsApi()) {

			// Check token first
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Post(TOKEN_NAME) !== NULL)
				$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			elseif (is_array($RequestSecurity) && @$RequestSecurity["username"] <> "") // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
		}
		if (!$validRequest) {
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t102_costsheetdetaillist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->costsheethead_id->Visible = FALSE;
		$this->chargecode_id->setVisibility();
		$this->vendor_id->setVisibility();
		$this->ptl_amount->setVisibility();
		$this->ptl_total->setVisibility();
		$this->rfc_amount->setVisibility();
		$this->rfc_total->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->chargecode_id);
		$this->setupLookupOptions($this->vendor_id);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Set up master/detail parameters
		// NOTE: must be after loadOldRecord to prevent master key values overwritten

		$this->setupMasterParms();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t102_costsheetdetaillist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t102_costsheetdetaillist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t102_costsheetdetailview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->costsheethead_id->CurrentValue = NULL;
		$this->costsheethead_id->OldValue = $this->costsheethead_id->CurrentValue;
		$this->chargecode_id->CurrentValue = NULL;
		$this->chargecode_id->OldValue = $this->chargecode_id->CurrentValue;
		$this->vendor_id->CurrentValue = NULL;
		$this->vendor_id->OldValue = $this->vendor_id->CurrentValue;
		$this->ptl_amount->CurrentValue = 0.00;
		$this->ptl_total->CurrentValue = 0.00;
		$this->rfc_amount->CurrentValue = 0.00;
		$this->rfc_total->CurrentValue = 0.00;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'chargecode_id' first before field var 'x_chargecode_id'
		$val = $CurrentForm->hasValue("chargecode_id") ? $CurrentForm->getValue("chargecode_id") : $CurrentForm->getValue("x_chargecode_id");
		if (!$this->chargecode_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->chargecode_id->Visible = FALSE; // Disable update for API request
			else
				$this->chargecode_id->setFormValue($val);
		}

		// Check field name 'vendor_id' first before field var 'x_vendor_id'
		$val = $CurrentForm->hasValue("vendor_id") ? $CurrentForm->getValue("vendor_id") : $CurrentForm->getValue("x_vendor_id");
		if (!$this->vendor_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vendor_id->Visible = FALSE; // Disable update for API request
			else
				$this->vendor_id->setFormValue($val);
		}

		// Check field name 'ptl_amount' first before field var 'x_ptl_amount'
		$val = $CurrentForm->hasValue("ptl_amount") ? $CurrentForm->getValue("ptl_amount") : $CurrentForm->getValue("x_ptl_amount");
		if (!$this->ptl_amount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ptl_amount->Visible = FALSE; // Disable update for API request
			else
				$this->ptl_amount->setFormValue($val);
		}

		// Check field name 'ptl_total' first before field var 'x_ptl_total'
		$val = $CurrentForm->hasValue("ptl_total") ? $CurrentForm->getValue("ptl_total") : $CurrentForm->getValue("x_ptl_total");
		if (!$this->ptl_total->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ptl_total->Visible = FALSE; // Disable update for API request
			else
				$this->ptl_total->setFormValue($val);
		}

		// Check field name 'rfc_amount' first before field var 'x_rfc_amount'
		$val = $CurrentForm->hasValue("rfc_amount") ? $CurrentForm->getValue("rfc_amount") : $CurrentForm->getValue("x_rfc_amount");
		if (!$this->rfc_amount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->rfc_amount->Visible = FALSE; // Disable update for API request
			else
				$this->rfc_amount->setFormValue($val);
		}

		// Check field name 'rfc_total' first before field var 'x_rfc_total'
		$val = $CurrentForm->hasValue("rfc_total") ? $CurrentForm->getValue("rfc_total") : $CurrentForm->getValue("x_rfc_total");
		if (!$this->rfc_total->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->rfc_total->Visible = FALSE; // Disable update for API request
			else
				$this->rfc_total->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->chargecode_id->CurrentValue = $this->chargecode_id->FormValue;
		$this->vendor_id->CurrentValue = $this->vendor_id->FormValue;
		$this->ptl_amount->CurrentValue = $this->ptl_amount->FormValue;
		$this->ptl_total->CurrentValue = $this->ptl_total->FormValue;
		$this->rfc_amount->CurrentValue = $this->rfc_amount->FormValue;
		$this->rfc_total->CurrentValue = $this->rfc_total->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->id->setDbValue($row['id']);
		$this->costsheethead_id->setDbValue($row['costsheethead_id']);
		$this->chargecode_id->setDbValue($row['chargecode_id']);
		$this->vendor_id->setDbValue($row['vendor_id']);
		$this->ptl_amount->setDbValue($row['ptl_amount']);
		$this->ptl_total->setDbValue($row['ptl_total']);
		$this->rfc_amount->setDbValue($row['rfc_amount']);
		$this->rfc_total->setDbValue($row['rfc_total']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['costsheethead_id'] = $this->costsheethead_id->CurrentValue;
		$row['chargecode_id'] = $this->chargecode_id->CurrentValue;
		$row['vendor_id'] = $this->vendor_id->CurrentValue;
		$row['ptl_amount'] = $this->ptl_amount->CurrentValue;
		$row['ptl_total'] = $this->ptl_total->CurrentValue;
		$row['rfc_amount'] = $this->rfc_amount->CurrentValue;
		$row['rfc_total'] = $this->rfc_total->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) <> "")
			$this->id->CurrentValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->ptl_amount->FormValue == $this->ptl_amount->CurrentValue && is_numeric(ConvertToFloatString($this->ptl_amount->CurrentValue)))
			$this->ptl_amount->CurrentValue = ConvertToFloatString($this->ptl_amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ptl_total->FormValue == $this->ptl_total->CurrentValue && is_numeric(ConvertToFloatString($this->ptl_total->CurrentValue)))
			$this->ptl_total->CurrentValue = ConvertToFloatString($this->ptl_total->CurrentValue);

		// Convert decimal values if posted back
		if ($this->rfc_amount->FormValue == $this->rfc_amount->CurrentValue && is_numeric(ConvertToFloatString($this->rfc_amount->CurrentValue)))
			$this->rfc_amount->CurrentValue = ConvertToFloatString($this->rfc_amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->rfc_total->FormValue == $this->rfc_total->CurrentValue && is_numeric(ConvertToFloatString($this->rfc_total->CurrentValue)))
			$this->rfc_total->CurrentValue = ConvertToFloatString($this->rfc_total->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// costsheethead_id
		// chargecode_id
		// vendor_id
		// ptl_amount
		// ptl_total
		// rfc_amount
		// rfc_total

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// costsheethead_id
			$this->costsheethead_id->ViewValue = $this->costsheethead_id->CurrentValue;
			$this->costsheethead_id->ViewValue = FormatNumber($this->costsheethead_id->ViewValue, 0, -2, -2, -2);
			$this->costsheethead_id->ViewCustomAttributes = "";

			// chargecode_id
			$curVal = strval($this->chargecode_id->CurrentValue);
			if ($curVal <> "") {
				$this->chargecode_id->ViewValue = $this->chargecode_id->lookupCacheOption($curVal);
				if ($this->chargecode_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->chargecode_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->chargecode_id->ViewValue = $this->chargecode_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->chargecode_id->ViewValue = $this->chargecode_id->CurrentValue;
					}
				}
			} else {
				$this->chargecode_id->ViewValue = NULL;
			}
			$this->chargecode_id->ViewCustomAttributes = "";

			// vendor_id
			$curVal = strval($this->vendor_id->CurrentValue);
			if ($curVal <> "") {
				$this->vendor_id->ViewValue = $this->vendor_id->lookupCacheOption($curVal);
				if ($this->vendor_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->vendor_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->vendor_id->ViewValue = $this->vendor_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->vendor_id->ViewValue = $this->vendor_id->CurrentValue;
					}
				}
			} else {
				$this->vendor_id->ViewValue = NULL;
			}
			$this->vendor_id->ViewCustomAttributes = "";

			// ptl_amount
			$this->ptl_amount->ViewValue = $this->ptl_amount->CurrentValue;
			$this->ptl_amount->ViewValue = FormatNumber($this->ptl_amount->ViewValue, 2, -2, -2, -2);
			$this->ptl_amount->CellCssStyle .= "text-align: right;";
			$this->ptl_amount->ViewCustomAttributes = "";

			// ptl_total
			$this->ptl_total->ViewValue = $this->ptl_total->CurrentValue;
			$this->ptl_total->ViewValue = FormatNumber($this->ptl_total->ViewValue, 2, -2, -2, -2);
			$this->ptl_total->CellCssStyle .= "text-align: right;";
			$this->ptl_total->ViewCustomAttributes = "";

			// rfc_amount
			$this->rfc_amount->ViewValue = $this->rfc_amount->CurrentValue;
			$this->rfc_amount->ViewValue = FormatNumber($this->rfc_amount->ViewValue, 2, -2, -2, -2);
			$this->rfc_amount->CellCssStyle .= "text-align: right;";
			$this->rfc_amount->ViewCustomAttributes = "";

			// rfc_total
			$this->rfc_total->ViewValue = $this->rfc_total->CurrentValue;
			$this->rfc_total->ViewValue = FormatNumber($this->rfc_total->ViewValue, 2, -2, -2, -2);
			$this->rfc_total->CellCssStyle .= "text-align: right;";
			$this->rfc_total->ViewCustomAttributes = "";

			// chargecode_id
			$this->chargecode_id->LinkCustomAttributes = "";
			$this->chargecode_id->HrefValue = "";
			$this->chargecode_id->TooltipValue = "";

			// vendor_id
			$this->vendor_id->LinkCustomAttributes = "";
			$this->vendor_id->HrefValue = "";
			$this->vendor_id->TooltipValue = "";

			// ptl_amount
			$this->ptl_amount->LinkCustomAttributes = "";
			$this->ptl_amount->HrefValue = "";
			$this->ptl_amount->TooltipValue = "";

			// ptl_total
			$this->ptl_total->LinkCustomAttributes = "";
			$this->ptl_total->HrefValue = "";
			$this->ptl_total->TooltipValue = "";

			// rfc_amount
			$this->rfc_amount->LinkCustomAttributes = "";
			$this->rfc_amount->HrefValue = "";
			$this->rfc_amount->TooltipValue = "";

			// rfc_total
			$this->rfc_total->LinkCustomAttributes = "";
			$this->rfc_total->HrefValue = "";
			$this->rfc_total->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// chargecode_id
			$this->chargecode_id->EditAttrs["class"] = "form-control";
			$this->chargecode_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->chargecode_id->CurrentValue));
			if ($curVal <> "")
				$this->chargecode_id->ViewValue = $this->chargecode_id->lookupCacheOption($curVal);
			else
				$this->chargecode_id->ViewValue = $this->chargecode_id->Lookup !== NULL && is_array($this->chargecode_id->Lookup->Options) ? $curVal : NULL;
			if ($this->chargecode_id->ViewValue !== NULL) { // Load from cache
				$this->chargecode_id->EditValue = array_values($this->chargecode_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->chargecode_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->chargecode_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->chargecode_id->EditValue = $arwrk;
			}

			// vendor_id
			$this->vendor_id->EditAttrs["class"] = "form-control";
			$this->vendor_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->vendor_id->CurrentValue));
			if ($curVal <> "")
				$this->vendor_id->ViewValue = $this->vendor_id->lookupCacheOption($curVal);
			else
				$this->vendor_id->ViewValue = $this->vendor_id->Lookup !== NULL && is_array($this->vendor_id->Lookup->Options) ? $curVal : NULL;
			if ($this->vendor_id->ViewValue !== NULL) { // Load from cache
				$this->vendor_id->EditValue = array_values($this->vendor_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->vendor_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->vendor_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->vendor_id->EditValue = $arwrk;
			}

			// ptl_amount
			$this->ptl_amount->EditAttrs["class"] = "form-control";
			$this->ptl_amount->EditCustomAttributes = "";
			$this->ptl_amount->EditValue = HtmlEncode($this->ptl_amount->CurrentValue);
			$this->ptl_amount->PlaceHolder = RemoveHtml($this->ptl_amount->caption());
			if (strval($this->ptl_amount->EditValue) <> "" && is_numeric($this->ptl_amount->EditValue))
				$this->ptl_amount->EditValue = FormatNumber($this->ptl_amount->EditValue, -2, -2, -2, -2);

			// ptl_total
			$this->ptl_total->EditAttrs["class"] = "form-control";
			$this->ptl_total->EditCustomAttributes = "";
			$this->ptl_total->EditValue = HtmlEncode($this->ptl_total->CurrentValue);
			$this->ptl_total->PlaceHolder = RemoveHtml($this->ptl_total->caption());
			if (strval($this->ptl_total->EditValue) <> "" && is_numeric($this->ptl_total->EditValue))
				$this->ptl_total->EditValue = FormatNumber($this->ptl_total->EditValue, -2, -2, -2, -2);

			// rfc_amount
			$this->rfc_amount->EditAttrs["class"] = "form-control";
			$this->rfc_amount->EditCustomAttributes = "";
			$this->rfc_amount->EditValue = HtmlEncode($this->rfc_amount->CurrentValue);
			$this->rfc_amount->PlaceHolder = RemoveHtml($this->rfc_amount->caption());
			if (strval($this->rfc_amount->EditValue) <> "" && is_numeric($this->rfc_amount->EditValue))
				$this->rfc_amount->EditValue = FormatNumber($this->rfc_amount->EditValue, -2, -2, -2, -2);

			// rfc_total
			$this->rfc_total->EditAttrs["class"] = "form-control";
			$this->rfc_total->EditCustomAttributes = "";
			$this->rfc_total->EditValue = HtmlEncode($this->rfc_total->CurrentValue);
			$this->rfc_total->PlaceHolder = RemoveHtml($this->rfc_total->caption());
			if (strval($this->rfc_total->EditValue) <> "" && is_numeric($this->rfc_total->EditValue))
				$this->rfc_total->EditValue = FormatNumber($this->rfc_total->EditValue, -2, -2, -2, -2);

			// Add refer script
			// chargecode_id

			$this->chargecode_id->LinkCustomAttributes = "";
			$this->chargecode_id->HrefValue = "";

			// vendor_id
			$this->vendor_id->LinkCustomAttributes = "";
			$this->vendor_id->HrefValue = "";

			// ptl_amount
			$this->ptl_amount->LinkCustomAttributes = "";
			$this->ptl_amount->HrefValue = "";

			// ptl_total
			$this->ptl_total->LinkCustomAttributes = "";
			$this->ptl_total->HrefValue = "";

			// rfc_amount
			$this->rfc_amount->LinkCustomAttributes = "";
			$this->rfc_amount->HrefValue = "";

			// rfc_total
			$this->rfc_total->LinkCustomAttributes = "";
			$this->rfc_total->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->costsheethead_id->Required) {
			if (!$this->costsheethead_id->IsDetailKey && $this->costsheethead_id->FormValue != NULL && $this->costsheethead_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->costsheethead_id->caption(), $this->costsheethead_id->RequiredErrorMessage));
			}
		}
		if ($this->chargecode_id->Required) {
			if (!$this->chargecode_id->IsDetailKey && $this->chargecode_id->FormValue != NULL && $this->chargecode_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->chargecode_id->caption(), $this->chargecode_id->RequiredErrorMessage));
			}
		}
		if ($this->vendor_id->Required) {
			if (!$this->vendor_id->IsDetailKey && $this->vendor_id->FormValue != NULL && $this->vendor_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vendor_id->caption(), $this->vendor_id->RequiredErrorMessage));
			}
		}
		if ($this->ptl_amount->Required) {
			if (!$this->ptl_amount->IsDetailKey && $this->ptl_amount->FormValue != NULL && $this->ptl_amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ptl_amount->caption(), $this->ptl_amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ptl_amount->FormValue)) {
			AddMessage($FormError, $this->ptl_amount->errorMessage());
		}
		if ($this->ptl_total->Required) {
			if (!$this->ptl_total->IsDetailKey && $this->ptl_total->FormValue != NULL && $this->ptl_total->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ptl_total->caption(), $this->ptl_total->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ptl_total->FormValue)) {
			AddMessage($FormError, $this->ptl_total->errorMessage());
		}
		if ($this->rfc_amount->Required) {
			if (!$this->rfc_amount->IsDetailKey && $this->rfc_amount->FormValue != NULL && $this->rfc_amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->rfc_amount->caption(), $this->rfc_amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->rfc_amount->FormValue)) {
			AddMessage($FormError, $this->rfc_amount->errorMessage());
		}
		if ($this->rfc_total->Required) {
			if (!$this->rfc_total->IsDetailKey && $this->rfc_total->FormValue != NULL && $this->rfc_total->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->rfc_total->caption(), $this->rfc_total->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->rfc_total->FormValue)) {
			AddMessage($FormError, $this->rfc_total->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// chargecode_id
		$this->chargecode_id->setDbValueDef($rsnew, $this->chargecode_id->CurrentValue, 0, FALSE);

		// vendor_id
		$this->vendor_id->setDbValueDef($rsnew, $this->vendor_id->CurrentValue, 0, FALSE);

		// ptl_amount
		$this->ptl_amount->setDbValueDef($rsnew, $this->ptl_amount->CurrentValue, 0, strval($this->ptl_amount->CurrentValue) == "");

		// ptl_total
		$this->ptl_total->setDbValueDef($rsnew, $this->ptl_total->CurrentValue, 0, strval($this->ptl_total->CurrentValue) == "");

		// rfc_amount
		$this->rfc_amount->setDbValueDef($rsnew, $this->rfc_amount->CurrentValue, 0, strval($this->rfc_amount->CurrentValue) == "");

		// rfc_total
		$this->rfc_total->setDbValueDef($rsnew, $this->rfc_total->CurrentValue, 0, strval($this->rfc_total->CurrentValue) == "");

		// costsheethead_id
		if ($this->costsheethead_id->getSessionValue() <> "") {
			$rsnew['costsheethead_id'] = $this->costsheethead_id->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t101_costsheethead") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->costsheethead_id->setQueryStringValue(Get("fk_id"));
					$this->costsheethead_id->setSessionValue($this->costsheethead_id->QueryStringValue);
					if (!is_numeric($this->costsheethead_id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t101_costsheethead") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->costsheethead_id->setFormValue(Post("fk_id"));
					$this->costsheethead_id->setSessionValue($this->costsheethead_id->FormValue);
					if (!is_numeric($this->costsheethead_id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "t101_costsheethead") {
				if ($this->costsheethead_id->CurrentValue == "")
					$this->costsheethead_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t102_costsheetdetaillist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->ParentFields) == 0 && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_chargecode_id":
							break;
						case "x_vendor_id":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>