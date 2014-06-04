<?php
	/**
	* 
	*/
	class Action {
	
		/**
		* undocumented class variable
		*/
		private $params;
	
		function __construct($params = null) {
			if (isset($params)) {
				$this->params = $params;
			}
		}

		/**
		 * undocumented function
		 * @param 
		 * @return void
		 **/
		public function start(Entity $entity) {
			echo $entity->getType() . ' ' . $entity->getName() . 'is here!';
		}
	}
?>