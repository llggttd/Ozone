<?php 
	/**
	* 
	*/
	class Entity {
		
		private $guid;
		private $name;
		private $type;
		private $group;
		private $space;


		function __construct($type, $group, $name) {
			$this->setType($type);
			$this->setGroup($group);
			$this->setName($name);
		}

		/**
		 * get the guid of this entity if it exists
		 *
		 * @return int $guid
		 * @author Ozone 
		 **/
		public function getGuid() {
			if (isset($guid)) {
				return $this->guid;
			}
			return false;
		}

		/**
		 * set the guid of this entity
		 * 
		 * @param string $guid
		 * @return void
		 **/
		public function setGuid($guid) {
			$this->guid = $guid;
		}

		/**
		 * get the type of this entity
		 *
		 * @return void
		 * @author Ozone
		 **/
		public function getType() {
			return $this->type;
		}

		/**
		 * set the type of this entity
		 *
		 * @return void
		 * @author Ozone
		 **/
		public function setType($type) {
			$this->type = $type;
		}

		/**
		 * get the group of this entity
		 *
		 * @return void
		 * @author Ozone
		 **/
		public function getGroup() {
			return $this->group;
		}

		/**
		 * set the group of this entity
		 *
		 * @return void
		 * @author Ozone
		 **/
		public function setGroup($group) {
			$this->group = $group;
		}

		/**
		 * get the name of this entity
		 * 
		 * @param none
		 * @return void
		 **/
		public function getName() {
			return $this->name;
		}

		/**
		 * set the name of this entity
		 * 
		 * @param string $name
		 * @return void
		 **/
		public function setName($name) {
			$this->name = $name;
		}

		/**
		 * get the space of this entity
		 * 
		 * @return void
		 **/
		public function getSpace() {
			return $this->space;
		}

		/**
		 * set the space of this entity
		 * 
		 * @param Space $space
		 * @return void
		 **/
		public function setSpace(Space $space) {
			$this->space = $space;
		}

		/**
		 * wake up
		 *
		 * @return void
		 **/
		public function wake() {

		}

		/**
		 * go to sleep
		 *
		 * @return void
		 **/
		public function sleep() {

		}

		/**
		 * undocumented function
		 * @param 
		 * @return void
		 **/
		public function run(Action $action) {
			if (!$this->canRunAction($action)) {
				return false;
			}
			$action->start($this);
		}

		/**
		 * undocumented function
		 * @param 
		 * @return void
		 **/
		public function canRunAction(Action $action) {
			return true;
		}

	}

?>