<?php
namespace Kernel\Plugins\Test;



class Index extends \Kernel\Plugins\PluginBase {

    /** get system name */
    public function getName()
    {
        return "test";
    }
    
    public function actionIndex() {
       $this->display("description");
    }
    
    
     /**
     * Render settings form
     */
    public function actionSettings() {
        $this->beforeDisplay();
        $this->printCallbackLink(\Kernel\Plugins\PluginManager::PLUGIN_TYPE_SMS);
        $this->page->set($this->settings);
        $this->page->set([
           "Login" => $this->getRealName("Login"),
           "Password" => $this->getRealName("Password"),
           "Sender" => $this->getRealName("Sender"),
           "URL" => $this->getRealName("URL"),
           "urlPirName" => $this->getRealName("urlPir"),
        ]);
        $this->display("settings");
    }

}