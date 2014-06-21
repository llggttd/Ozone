<?php 
	/**
	* 
	*/
	abstract class Entity {
		
		private $guid;
		private $soul = array();
		protected $MODE;
		const WORKING = 1;
		const IDLE = 0;

		function __construct($space, $type, $group = null, $name = null) {
			$this->space = $space;
			$this->type = $type;
			$this->group = $group;
			$this->name = $name;
			$this->MODE = Entity::WORKING;
		}

		public function getGuid() {
			return $this->guid;
		}

		public function setGuid($guid) {
			$this->guid = $guid;
		}

		public function wake() {
			$this->MODE = Entity::WORKING;
		}


		public function sleep() {
			$this->MODE = Entity::IDLE;
		}

		public function __get($name){
			if (isset($this->$name)) {
				return $this->soul[$name];
			} else {
				return null;
			}
		}

		public function __set($name, $value){
			$this->soul[$name] = $value;
		}

		public function __isset($name){
			if (isset($this->soul[$name])) {
				return true;
			} else {
				return false;
			}
		}

		abstract public function work();
	}

?>