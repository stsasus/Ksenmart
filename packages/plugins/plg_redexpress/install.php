<?php defined('_JEXEC') or die;

class plgKMShippingRedExpressInstallerScript {
    
    public function postflight($type, $parent) {
        
        if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
        $path = JPATH_ROOT . DS . 'plugins' . DS . 'kmshipping' . DS . 'redexpress' . DS . 'install' . DS;
        $app  = JFactory::getApplication();
        
        if (!JFile::copy($path . 'helpers' . DS . 'walletone.php', JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_ksenmart' . DS . 'helpers' . DS . 'common' . DS . 'walletone.php')) {
            $app->enqueueMessage('Couldnt move file');
        }
        
        JFolder::delete($path);
    }

    public function update($parent) {
        if(version_compare($parent->get('manifest')->version, '1.0.0', '==')){
            if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

            $app = JFactory::getApplication();
            $path = JPATH_ROOT . DS . 'plugins' . DS . 'kmshipping' . DS . 'redexpress' . DS . 'install' . DS;

            if (!JFile::copy($path . 'helpers' . DS . 'walletone.php', JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_ksenmart' . DS . 'helpers' . DS . 'common' . DS . 'walletone.php')) {
                $app->enqueueMessage('Couldnt move file');
            }
            JFolder::delete($path);

            $db = $parent->get('db');
            $table = JTable::getInstance('extension');
            if($table->load(array('element' => 'redexpress', 'folder' => 'kmshipping'))){
                $table->save(array(
                    'enabled' => 1
                ));
            }
        }
    }
}