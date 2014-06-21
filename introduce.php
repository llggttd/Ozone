<?php
	/**
	 * 
	 */
	 class Introduce extends Action {
	 	
	 	function __construct($bundles = null){
	 		parent::__construct($bundles);
	 	}

	 	public function start(Entity $entity){
	 		echo $this->introduce($entity);
	 		$this->STATE_CODE = Action::SUCCESS;
	 	}

	 	private function introduce($entity){
	 		$content = 'Hi, everyone\n';
	 		if ($entity->name) {
	 			$content .= 'My name is ' . $entity->name . '.';
	 		} else {
	 			$content .= 'My name is %@#$$#, I can\'t tell you.';
	 		}
	 		return $content;
	 	}
	 } 
?>