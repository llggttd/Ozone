<?php
	/**
	* action's base class
	*/
	abstract class Action {
	
		protected $bundles;
		const PROCESSING = 1;
		const PAUSE = 2;
		const SUCCESS = 3;
		const IDLE = 4;
		const FAILURE = 0;
		protected $STATE_CODE;
	
		function __construct($bundles = null) {
			$this->bundles = $bundles;
			$this->STATE_CODE = self::IDLE;
		}

		public function __set($name, $value){
			$this->bundles[$name] = $value;
		}

		public function __get($name){
			if (isset($this->$name)) {
				return $this->bundles[$name];
			} else {
				return null;
			}
		}

		public function __isset($name){
			if (isset($this->bundles[$name])) {
				return true;
			} else {
				return false;
			}
		}

		public function state(){
			return $this->STATE_CODE;
		}

		abstract public function start(Entity $entity);
		
	}
?>