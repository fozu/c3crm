<?php
require_once('data/Tracker.php');
require_once('include/CRMSmarty.php');
require_once('modules/Contacts/Contacts.php');
require_once('modules/Contacts/ModuleConfig.php');
require_once('include/utils/utils.php');
global $app_strings;
global $mod_strings;
global $currentModule;
$focus = new Contacts();
if(isset($_REQUEST['record'])) {
   $focus->retrieve_entity_info($_REQUEST['record'],"Contacts");
   $focus->id = $_REQUEST['record'];
   $focus->name=$focus->column_fields['contactname'];
}
if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
	$focus->id = "";
}

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";

$log->info("Contact detail view");

$smarty = new CRMSmarty();
$smarty->assign("MOD", $mod_strings);
$smarty->assign("APP", $app_strings);
$blocks2 = getBlocks($currentModule,"detail_view",'',$focus->column_fields);
$smarty->assign("BLOCKS", $blocks2);
$smarty->assign("UPDATEINFO",updateInfo($focus->id));


if (isset($focus->name)) $smarty->assign("NAME", $focus->name);
else $smarty->assign("NAME", "");

if (isset($_REQUEST['return_module'])) $smarty->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $smarty->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $smarty->assign("RETURN_ID", $_REQUEST['return_id']);

$smarty->assign("THEME", $theme);
$smarty->assign("IMAGE_PATH", $image_path);
$smarty->assign("ID", $focus->id);
$category = getParentTab();
$smarty->assign("CATEGORY",$category);
$smarty->assign("SINGLE_MOD", 'Contact');
$smarty->assign("MODULE",$currentModule);
$smarty->display("Contacts/DetailView.tpl");

?>
