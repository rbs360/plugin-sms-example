<?php
	
	namespace Kernel\Plugins\Test\Actions;
	use Kernel\Actions\Notifications;
	use Kernel\Framework\SocketMessage;
	use Kernel\Framework\Websocket;
	use Kernel\Database\Database as DB;
	use Kernel\Kernel;
	
	class SmsAction extends \Kernel\Plugins\PluginSmsBase {
		
		public function actionSend($argsData = []){
			$text    = trim($this->Http->Post->request("text", "Text", ""));
			$phoneTo = trim($this->Http->Post->request("to", "Varchar", ""));
			
			try {
				$this->send($text, $phoneTo);
				$this->resultSuccess("Ваше сообщение отправлено");
				} catch (\Exception $ex) {
				$this->resultError($ex->getMessage());
			}
		}
		
		
		/**
			*  SELF SEND
			* @param type $argsData
		*/
		public function send($text, $phoneTo){
			if (!$phoneTo || !$text)
            throw new \Exception ("Variables not found");
			
			$phoneTo   = $this->getFormatPhone($phoneTo, "7");
			$sLogin    = $this->getPlugin()->getSettingsValue("login");
			$sPassword = $this->getPlugin()->getSettingsValue("password");
			$sadr      = $this->getPlugin()->getSettingsValue("sadr");
			$url       = $this->getPlugin()->getSettingsValue("url");
			
			$result = $this->Transfer("https://".$url, [
            "user"=>$sLogin,
            "pwd" => $sPassword,
            "sadr"=>$sadr,
            "dadr"=>$phoneTo,
            "text"=>$text
			], true, true);
			
			if(!is_numeric($result))
            throw new \Exception ($result);
		}	
	}	