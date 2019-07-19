<?php
namespace PHPMaker2019\costsheet_prj;

/**
 * Page class
 */
class t101_costsheethead_edit extends t101_costsheethead
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{21082F44-1044-49E8-8088-092C72267B54}";

	// Table name
	public $TableName = 't101_costsheethead';

	// Page object name
	public $PageObjName = "t101_costsheethead_edit";

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

		// Table object (t101_costsheethead)
		if (!isset($GLOBALS["t101_costsheethead"]) || get_class($GLOBALS["t101_costsheethead"]) == PROJECT_NAMESPACE . "t101_costsheethead") {
			$GLOBALS["t101_costsheethead"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t101_costsheethead"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (t096_employees)
		if (!isset($GLOBALS['t096_employees']))
			$GLOBALS['t096_employees'] = new t096_employees();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't101_costsheethead');

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
		global $EXPORT, $t101_costsheethead;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($t101_costsheethead);
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
					if ($pageName == "t101_costsheetheadview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;
	public $MultiPages; // Multi pages object

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
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t101_costsheetheadlist.php"));
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
		$this->liner_id->setVisibility();
		$this->no_bl->setVisibility();
		$this->shipper_id->setVisibility();
		$this->top_1->setVisibility();
		$this->vol->setVisibility();
		$this->cont->setVisibility();
		$this->no_ref->setVisibility();
		$this->vsl_voy->setVisibility();
		$this->pol_pod->setVisibility();
		$this->top_2->setVisibility();
		$this->no_cont->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Set up multi page object
		$this->setupMultiPages();

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
		$this->setupLookupOptions($this->liner_id);
		$this->setupLookupOptions($this->shipper_id);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_id")) {
				$this->id->setFormValue($CurrentForm->getValue("x_id"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$loadByQuery = TRUE;
			} else {
				$this->id->CurrentValue = NULL;
			}
		}

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values

			// Set up detail parameters
			$this->setupDetailParms();
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t101_costsheetheadlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() <> "") // Master/detail edit
					$returnUrl = $this->getViewUrl(TABLE_SHOW_DETAIL . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "t101_costsheetheadlist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed

					// Set up detail parameters
					$this->setupDetailParms();
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'liner_id' first before field var 'x_liner_id'
		$val = $CurrentForm->hasValue("liner_id") ? $CurrentForm->getValue("liner_id") : $CurrentForm->getValue("x_liner_id");
		if (!$this->liner_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->liner_id->Visible = FALSE; // Disable update for API request
			else
				$this->liner_id->setFormValue($val);
		}

		// Check field name 'no_bl' first before field var 'x_no_bl'
		$val = $CurrentForm->hasValue("no_bl") ? $CurrentForm->getValue("no_bl") : $CurrentForm->getValue("x_no_bl");
		if (!$this->no_bl->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->no_bl->Visible = FALSE; // Disable update for API request
			else
				$this->no_bl->setFormValue($val);
		}

		// Check field name 'shipper_id' first before field var 'x_shipper_id'
		$val = $CurrentForm->hasValue("shipper_id") ? $CurrentForm->getValue("shipper_id") : $CurrentForm->getValue("x_shipper_id");
		if (!$this->shipper_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->shipper_id->Visible = FALSE; // Disable update for API request
			else
				$this->shipper_id->setFormValue($val);
		}

		// Check field name 'top_1' first before field var 'x_top_1'
		$val = $CurrentForm->hasValue("top_1") ? $CurrentForm->getValue("top_1") : $CurrentForm->getValue("x_top_1");
		if (!$this->top_1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->top_1->Visible = FALSE; // Disable update for API request
			else
				$this->top_1->setFormValue($val);
		}

		// Check field name 'vol' first before field var 'x_vol'
		$val = $CurrentForm->hasValue("vol") ? $CurrentForm->getValue("vol") : $CurrentForm->getValue("x_vol");
		if (!$this->vol->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vol->Visible = FALSE; // Disable update for API request
			else
				$this->vol->setFormValue($val);
		}

		// Check field name 'cont' first before field var 'x_cont'
		$val = $CurrentForm->hasValue("cont") ? $CurrentForm->getValue("cont") : $CurrentForm->getValue("x_cont");
		if (!$this->cont->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cont->Visible = FALSE; // Disable update for API request
			else
				$this->cont->setFormValue($val);
		}

		// Check field name 'no_ref' first before field var 'x_no_ref'
		$val = $CurrentForm->hasValue("no_ref") ? $CurrentForm->getValue("no_ref") : $CurrentForm->getValue("x_no_ref");
		if (!$this->no_ref->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->no_ref->Visible = FALSE; // Disable update for API request
			else
				$this->no_ref->setFormValue($val);
		}

		// Check field name 'vsl_voy' first before field var 'x_vsl_voy'
		$val = $CurrentForm->hasValue("vsl_voy") ? $CurrentForm->getValue("vsl_voy") : $CurrentForm->getValue("x_vsl_voy");
		if (!$this->vsl_voy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vsl_voy->Visible = FALSE; // Disable update for API request
			else
				$this->vsl_voy->setFormValue($val);
		}

		// Check field name 'pol_pod' first before field var 'x_pol_pod'
		$val = $CurrentForm->hasValue("pol_pod") ? $CurrentForm->getValue("pol_pod") : $CurrentForm->getValue("x_pol_pod");
		if (!$this->pol_pod->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pol_pod->Visible = FALSE; // Disable update for API request
			else
				$this->pol_pod->setFormValue($val);
		}

		// Check field name 'top_2' first before field var 'x_top_2'
		$val = $CurrentForm->hasValue("top_2") ? $CurrentForm->getValue("top_2") : $CurrentForm->getValue("x_top_2");
		if (!$this->top_2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->top_2->Visible = FALSE; // Disable update for API request
			else
				$this->top_2->setFormValue($val);
		}

		// Check field name 'no_cont' first before field var 'x_no_cont'
		$val = $CurrentForm->hasValue("no_cont") ? $CurrentForm->getValue("no_cont") : $CurrentForm->getValue("x_no_cont");
		if (!$this->no_cont->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->no_cont->Visible = FALSE; // Disable update for API request
			else
				$this->no_cont->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->liner_id->CurrentValue = $this->liner_id->FormValue;
		$this->no_bl->CurrentValue = $this->no_bl->FormValue;
		$this->shipper_id->CurrentValue = $this->shipper_id->FormValue;
		$this->top_1->CurrentValue = $this->top_1->FormValue;
		$this->vol->CurrentValue = $this->vol->FormValue;
		$this->cont->CurrentValue = $this->cont->FormValue;
		$this->no_ref->CurrentValue = $this->no_ref->FormValue;
		$this->vsl_voy->CurrentValue = $this->vsl_voy->FormValue;
		$this->pol_pod->CurrentValue = $this->pol_pod->FormValue;
		$this->top_2->CurrentValue = $this->top_2->FormValue;
		$this->no_cont->CurrentValue = $this->no_cont->FormValue;
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
		$this->liner_id->setDbValue($row['liner_id']);
		$this->no_bl->setDbValue($row['no_bl']);
		$this->shipper_id->setDbValue($row['shipper_id']);
		$this->top_1->setDbValue($row['top_1']);
		$this->vol->setDbValue($row['vol']);
		$this->cont->setDbValue($row['cont']);
		$this->no_ref->setDbValue($row['no_ref']);
		$this->vsl_voy->setDbValue($row['vsl_voy']);
		$this->pol_pod->setDbValue($row['pol_pod']);
		$this->top_2->setDbValue($row['top_2']);
		$this->no_cont->setDbValue($row['no_cont']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['liner_id'] = NULL;
		$row['no_bl'] = NULL;
		$row['shipper_id'] = NULL;
		$row['top_1'] = NULL;
		$row['vol'] = NULL;
		$row['cont'] = NULL;
		$row['no_ref'] = NULL;
		$row['vsl_voy'] = NULL;
		$row['pol_pod'] = NULL;
		$row['top_2'] = NULL;
		$row['no_cont'] = NULL;
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
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// liner_id
			$this->liner_id->EditAttrs["class"] = "form-control";
			$this->liner_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->liner_id->CurrentValue));
			if ($curVal <> "")
				$this->liner_id->ViewValue = $this->liner_id->lookupCacheOption($curVal);
			else
				$this->liner_id->ViewValue = $this->liner_id->Lookup !== NULL && is_array($this->liner_id->Lookup->Options) ? $curVal : NULL;
			if ($this->liner_id->ViewValue !== NULL) { // Load from cache
				$this->liner_id->EditValue = array_values($this->liner_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->liner_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->liner_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->liner_id->EditValue = $arwrk;
			}

			// no_bl
			$this->no_bl->EditAttrs["class"] = "form-control";
			$this->no_bl->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->no_bl->CurrentValue = HtmlDecode($this->no_bl->CurrentValue);
			$this->no_bl->EditValue = HtmlEncode($this->no_bl->CurrentValue);
			$this->no_bl->PlaceHolder = RemoveHtml($this->no_bl->caption());

			// shipper_id
			$this->shipper_id->EditAttrs["class"] = "form-control";
			$this->shipper_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->shipper_id->CurrentValue));
			if ($curVal <> "")
				$this->shipper_id->ViewValue = $this->shipper_id->lookupCacheOption($curVal);
			else
				$this->shipper_id->ViewValue = $this->shipper_id->Lookup !== NULL && is_array($this->shipper_id->Lookup->Options) ? $curVal : NULL;
			if ($this->shipper_id->ViewValue !== NULL) { // Load from cache
				$this->shipper_id->EditValue = array_values($this->shipper_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->shipper_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->shipper_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->shipper_id->EditValue = $arwrk;
			}

			// top_1
			$this->top_1->EditCustomAttributes = "";
			$this->top_1->EditValue = $this->top_1->options(FALSE);

			// vol
			$this->vol->EditAttrs["class"] = "form-control";
			$this->vol->EditCustomAttributes = "";
			$this->vol->EditValue = HtmlEncode($this->vol->CurrentValue);
			$this->vol->PlaceHolder = RemoveHtml($this->vol->caption());

			// cont
			$this->cont->EditCustomAttributes = "";
			$this->cont->EditValue = $this->cont->options(FALSE);

			// no_ref
			$this->no_ref->EditAttrs["class"] = "form-control";
			$this->no_ref->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->no_ref->CurrentValue = HtmlDecode($this->no_ref->CurrentValue);
			$this->no_ref->EditValue = HtmlEncode($this->no_ref->CurrentValue);
			$this->no_ref->PlaceHolder = RemoveHtml($this->no_ref->caption());

			// vsl_voy
			$this->vsl_voy->EditAttrs["class"] = "form-control";
			$this->vsl_voy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vsl_voy->CurrentValue = HtmlDecode($this->vsl_voy->CurrentValue);
			$this->vsl_voy->EditValue = HtmlEncode($this->vsl_voy->CurrentValue);
			$this->vsl_voy->PlaceHolder = RemoveHtml($this->vsl_voy->caption());

			// pol_pod
			$this->pol_pod->EditAttrs["class"] = "form-control";
			$this->pol_pod->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->pol_pod->CurrentValue = HtmlDecode($this->pol_pod->CurrentValue);
			$this->pol_pod->EditValue = HtmlEncode($this->pol_pod->CurrentValue);
			$this->pol_pod->PlaceHolder = RemoveHtml($this->pol_pod->caption());

			// top_2
			$this->top_2->EditCustomAttributes = "";
			$this->top_2->EditValue = $this->top_2->options(FALSE);

			// no_cont
			$this->no_cont->EditAttrs["class"] = "form-control";
			$this->no_cont->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->no_cont->CurrentValue = HtmlDecode($this->no_cont->CurrentValue);
			$this->no_cont->EditValue = HtmlEncode($this->no_cont->CurrentValue);
			$this->no_cont->PlaceHolder = RemoveHtml($this->no_cont->caption());

			// Edit refer script
			// liner_id

			$this->liner_id->LinkCustomAttributes = "";
			$this->liner_id->HrefValue = "";

			// no_bl
			$this->no_bl->LinkCustomAttributes = "";
			$this->no_bl->HrefValue = "";

			// shipper_id
			$this->shipper_id->LinkCustomAttributes = "";
			$this->shipper_id->HrefValue = "";

			// top_1
			$this->top_1->LinkCustomAttributes = "";
			$this->top_1->HrefValue = "";

			// vol
			$this->vol->LinkCustomAttributes = "";
			$this->vol->HrefValue = "";

			// cont
			$this->cont->LinkCustomAttributes = "";
			$this->cont->HrefValue = "";

			// no_ref
			$this->no_ref->LinkCustomAttributes = "";
			$this->no_ref->HrefValue = "";

			// vsl_voy
			$this->vsl_voy->LinkCustomAttributes = "";
			$this->vsl_voy->HrefValue = "";

			// pol_pod
			$this->pol_pod->LinkCustomAttributes = "";
			$this->pol_pod->HrefValue = "";

			// top_2
			$this->top_2->LinkCustomAttributes = "";
			$this->top_2->HrefValue = "";

			// no_cont
			$this->no_cont->LinkCustomAttributes = "";
			$this->no_cont->HrefValue = "";
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
		if ($this->liner_id->Required) {
			if (!$this->liner_id->IsDetailKey && $this->liner_id->FormValue != NULL && $this->liner_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->liner_id->caption(), $this->liner_id->RequiredErrorMessage));
			}
		}
		if ($this->no_bl->Required) {
			if (!$this->no_bl->IsDetailKey && $this->no_bl->FormValue != NULL && $this->no_bl->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->no_bl->caption(), $this->no_bl->RequiredErrorMessage));
			}
		}
		if ($this->shipper_id->Required) {
			if (!$this->shipper_id->IsDetailKey && $this->shipper_id->FormValue != NULL && $this->shipper_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->shipper_id->caption(), $this->shipper_id->RequiredErrorMessage));
			}
		}
		if ($this->top_1->Required) {
			if ($this->top_1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->top_1->caption(), $this->top_1->RequiredErrorMessage));
			}
		}
		if ($this->vol->Required) {
			if (!$this->vol->IsDetailKey && $this->vol->FormValue != NULL && $this->vol->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vol->caption(), $this->vol->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->vol->FormValue)) {
			AddMessage($FormError, $this->vol->errorMessage());
		}
		if ($this->cont->Required) {
			if ($this->cont->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cont->caption(), $this->cont->RequiredErrorMessage));
			}
		}
		if ($this->no_ref->Required) {
			if (!$this->no_ref->IsDetailKey && $this->no_ref->FormValue != NULL && $this->no_ref->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->no_ref->caption(), $this->no_ref->RequiredErrorMessage));
			}
		}
		if ($this->vsl_voy->Required) {
			if (!$this->vsl_voy->IsDetailKey && $this->vsl_voy->FormValue != NULL && $this->vsl_voy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vsl_voy->caption(), $this->vsl_voy->RequiredErrorMessage));
			}
		}
		if ($this->pol_pod->Required) {
			if (!$this->pol_pod->IsDetailKey && $this->pol_pod->FormValue != NULL && $this->pol_pod->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pol_pod->caption(), $this->pol_pod->RequiredErrorMessage));
			}
		}
		if ($this->top_2->Required) {
			if ($this->top_2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->top_2->caption(), $this->top_2->RequiredErrorMessage));
			}
		}
		if ($this->no_cont->Required) {
			if (!$this->no_cont->IsDetailKey && $this->no_cont->FormValue != NULL && $this->no_cont->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->no_cont->caption(), $this->no_cont->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("t102_costsheetdetail", $detailTblVar) && $GLOBALS["t102_costsheetdetail"]->DetailEdit) {
			if (!isset($GLOBALS["t102_costsheetdetail_grid"]))
				$GLOBALS["t102_costsheetdetail_grid"] = new t102_costsheetdetail_grid(); // Get detail page object
			$GLOBALS["t102_costsheetdetail_grid"]->validateGridForm();
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

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Begin transaction
			if ($this->getCurrentDetailTable() <> "")
				$conn->beginTrans();

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// liner_id
			$this->liner_id->setDbValueDef($rsnew, $this->liner_id->CurrentValue, 0, $this->liner_id->ReadOnly);

			// no_bl
			$this->no_bl->setDbValueDef($rsnew, $this->no_bl->CurrentValue, "", $this->no_bl->ReadOnly);

			// shipper_id
			$this->shipper_id->setDbValueDef($rsnew, $this->shipper_id->CurrentValue, 0, $this->shipper_id->ReadOnly);

			// top_1
			$this->top_1->setDbValueDef($rsnew, $this->top_1->CurrentValue, "", $this->top_1->ReadOnly);

			// vol
			$this->vol->setDbValueDef($rsnew, $this->vol->CurrentValue, 0, $this->vol->ReadOnly);

			// cont
			$this->cont->setDbValueDef($rsnew, $this->cont->CurrentValue, "", $this->cont->ReadOnly);

			// no_ref
			$this->no_ref->setDbValueDef($rsnew, $this->no_ref->CurrentValue, "", $this->no_ref->ReadOnly);

			// vsl_voy
			$this->vsl_voy->setDbValueDef($rsnew, $this->vsl_voy->CurrentValue, "", $this->vsl_voy->ReadOnly);

			// pol_pod
			$this->pol_pod->setDbValueDef($rsnew, $this->pol_pod->CurrentValue, "", $this->pol_pod->ReadOnly);

			// top_2
			$this->top_2->setDbValueDef($rsnew, $this->top_2->CurrentValue, "", $this->top_2->ReadOnly);

			// no_cont
			$this->no_cont->setDbValueDef($rsnew, $this->no_cont->CurrentValue, "", $this->no_cont->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("t102_costsheetdetail", $detailTblVar) && $GLOBALS["t102_costsheetdetail"]->DetailEdit) {
						if (!isset($GLOBALS["t102_costsheetdetail_grid"]))
							$GLOBALS["t102_costsheetdetail_grid"] = new t102_costsheetdetail_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "t102_costsheetdetail"); // Load user level of detail table
						$editRow = $GLOBALS["t102_costsheetdetail_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}

				// Commit/Rollback transaction
				if ($this->getCurrentDetailTable() <> "") {
					if ($editRow) {
						$conn->commitTrans(); // Commit transaction
					} else {
						$conn->rollbackTrans(); // Rollback transaction
					}
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		if (Get(TABLE_SHOW_DETAIL) !== NULL) {
			$detailTblVar = Get(TABLE_SHOW_DETAIL);
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar <> "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("t102_costsheetdetail", $detailTblVar)) {
				if (!isset($GLOBALS["t102_costsheetdetail_grid"]))
					$GLOBALS["t102_costsheetdetail_grid"] = new t102_costsheetdetail_grid();
				if ($GLOBALS["t102_costsheetdetail_grid"]->DetailEdit) {
					$GLOBALS["t102_costsheetdetail_grid"]->CurrentMode = "edit";
					$GLOBALS["t102_costsheetdetail_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["t102_costsheetdetail_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["t102_costsheetdetail_grid"]->setStartRecordNumber(1);
					$GLOBALS["t102_costsheetdetail_grid"]->costsheethead_id->IsDetailKey = TRUE;
					$GLOBALS["t102_costsheetdetail_grid"]->costsheethead_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["t102_costsheetdetail_grid"]->costsheethead_id->setSessionValue($GLOBALS["t102_costsheetdetail_grid"]->costsheethead_id->CurrentValue);
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t101_costsheetheadlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
	}

	// Set up multi pages
	protected function setupMultiPages()
	{
		$pages = new SubPages();
		$pages->Style = "tabs";
		$pages->add(0);
		$pages->add(1);
		$pages->add(2);
		$this->MultiPages = $pages;
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
						case "x_liner_id":
							break;
						case "x_shipper_id":
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