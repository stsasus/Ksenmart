<?php defined('_JEXEC') or die;

class ModKSSettingsGroupsHelper {
	
	public static function getForms() {
		$forms = array();
		if (!class_exists('KsenModelSettings')) require_once JPATH_ADMINISTRATOR . '/components/com_ksen/models/settings.php';
		$model = new KsenModelSettings();
		$forms = $model->getForm();
		
		return $forms;
	}
}