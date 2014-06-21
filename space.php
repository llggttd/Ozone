<?php
	/**
	* 
	*/
	class Space {
	
		/**
		* undocumented class variable
		*/
		private $entities;
		private $data;
	
		function __construct() {
			if (!is_array($this->entities)) {
				$this->entities = array();
			}
			if (!is_array($this->data)) {
				$this->data = array();
			}
		}

		/**
		 * undocumented function
		 * @param string $name
		 * @param string $value
		 * @return void
		 **/
		public function __set($name, $value) {

			if ($value instanceof Entity) {
				$this->entities[$name] = $value;
			} else {
				$this->data[$name] = $value;
			}
		}

		/**
		 * undocumented function
		 * @param string $name
		 * @return void
		 **/
		public function __get($name) {
			if (!isset($this->$name)) {
				return null;
			}
			if (array_key_exists($name, $this->entities)) {
				return $this->entities[$name];	
			}
			return $this->data[$name];
			
		}

		/**
		 * has an entity already set
		 * 
		 * @param string $name
		 * @return void
		 **/
		public function __isset($name) {
			if (array_key_exists($name, $this->entities)) {
				return true;
			}
			if (array_key_exists($name, $this->data)) {
				return true;
			}
			return false;
		}

		/**
		 * undocumented function
		 * @param string $name
		 * @return void
		 **/
		public function get($name) {
			return $this->$name;
		}

		/**
		 * undocumented function
		 * @param 
		 * @return void
		 **/
		public function set($name, $value) {
			$this->$name = $value;
		}

		/**
		 * undocumented function
		 * @param 
		 * @return void
		 **/
		public function createGuid(Entity $entity) {
			if (!isset($this->nextGuid)) {
				$this->nextGuid = 0;
			}
			$entity->setGuid($this->nextGuid);
			$this->set($this->nextGuid, $entity);
			$this->nextGuid++;
		}

		public function run(){
			foreach ($this->entities as $entity) {
				$entity->work();
			}
		}
	}
?>