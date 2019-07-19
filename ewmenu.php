<?php
namespace PHPMaker2019\costsheet_prj;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(6, "mi_cf01_home", $MenuLanguage->MenuPhrase("6", "MenuText"), "cf01_home.php", -1, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}cf01_home.php'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(7, "mci_Setup", $MenuLanguage->MenuPhrase("7", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t001_liner", $MenuLanguage->MenuPhrase("1", "MenuText"), "t001_linerlist.php", 7, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t001_liner'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(9, "mi_t002_shipper", $MenuLanguage->MenuPhrase("9", "MenuText"), "t002_shipperlist.php", 7, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t002_shipper'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(10, "mi_t003_chargecode", $MenuLanguage->MenuPhrase("10", "MenuText"), "t003_chargecodelist.php", 7, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t003_chargecode'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(11, "mi_t004_vendor", $MenuLanguage->MenuPhrase("11", "MenuText"), "t004_vendorlist.php", 7, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t004_vendor'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(12, "mi_t101_costsheethead", $MenuLanguage->MenuPhrase("12", "MenuText"), "t101_costsheetheadlist.php", -1, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t101_costsheethead'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(8, "mci_General", $MenuLanguage->MenuPhrase("8", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t096_employees", $MenuLanguage->MenuPhrase("2", "MenuText"), "t096_employeeslist.php", 8, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t096_employees'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t097_userlevels", $MenuLanguage->MenuPhrase("3", "MenuText"), "t097_userlevelslist.php", 8, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t097_userlevels'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t099_audittrail", $MenuLanguage->MenuPhrase("5", "MenuText"), "t099_audittraillist.php", 8, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t099_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(6, "mi_cf01_home", $MenuLanguage->MenuPhrase("6", "MenuText"), "cf01_home.php", -1, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}cf01_home.php'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(7, "mci_Setup", $MenuLanguage->MenuPhrase("7", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t001_liner", $MenuLanguage->MenuPhrase("1", "MenuText"), "t001_linerlist.php", 7, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t001_liner'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(9, "mi_t002_shipper", $MenuLanguage->MenuPhrase("9", "MenuText"), "t002_shipperlist.php", 7, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t002_shipper'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(10, "mi_t003_chargecode", $MenuLanguage->MenuPhrase("10", "MenuText"), "t003_chargecodelist.php", 7, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t003_chargecode'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(11, "mi_t004_vendor", $MenuLanguage->MenuPhrase("11", "MenuText"), "t004_vendorlist.php", 7, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t004_vendor'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(12, "mi_t101_costsheethead", $MenuLanguage->MenuPhrase("12", "MenuText"), "t101_costsheetheadlist.php", -1, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t101_costsheethead'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(8, "mci_General", $MenuLanguage->MenuPhrase("8", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t096_employees", $MenuLanguage->MenuPhrase("2", "MenuText"), "t096_employeeslist.php", 8, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t096_employees'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t097_userlevels", $MenuLanguage->MenuPhrase("3", "MenuText"), "t097_userlevelslist.php", 8, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t097_userlevels'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t099_audittrail", $MenuLanguage->MenuPhrase("5", "MenuText"), "t099_audittraillist.php", 8, "", AllowListMenu('{21082F44-1044-49E8-8088-092C72267B54}t099_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>