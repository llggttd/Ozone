<?php
	/**
	* 
	*/
	class Commander extends Entity {
	
		/**
		* undocumented class variable
		*/
		private $var;
	
		function __construct($space, $type, $group = null, $name = null) {
			parent::__construct($space, $type, $group, $name);
		}

		/**
		 * undocumented function
		 * @param 
		 * @return void
		 **/
		public function command(Entity $entity, Action $action) {
			$entity->run($action);
		}

		public function work(){
		}
	}
?>