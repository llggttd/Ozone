<?php
	/**
	* 
	*/
	class Commander extends Entity {
	
		/**
		* undocumented class variable
		*/
		private $var;
	
		function __construct($type, $group, $name) {
			parent::__construct($type, $group, $name);
		}

		/**
		 * undocumented function
		 * @param 
		 * @return void
		 **/
		public function command(Entity $entity, Action $action) {
			$entity->run($action);
		}
	}
?>