<?php
	/**
	* 
	*/
	class Mother extends Entity {
	
		function __construct(Space $space) {
			/** mother of ozone*/
			parent::__construct($space, 'mother', 'create', 'moo');
			$this->space->createGuid($this);
		}

		public function addTask(Action $action, $priority = 10){
			array_push($this->tasks, array(
					'action'		=> $action,
					'priority'		=> $priority,
					'retry'			=> 0
				));
			$this->MODE = Entity::WORKING;
		}

		public function removeTask($action){
			foreach ($this->tasks as $index => $task) {
				if ($task['action'] == $action) {
					unset($this->tasks[$index]);
				}
			}
		}

		/**
		 * create a child
		 * 
		 * @param string $type
		 * @param string $group
		 * @param string $name
		 * @return void
		 **/
		public function create($type, $group, $name) {
			switch ($type) {
				case 'commander':
					$child = new Commander($this->space, $type, $group, $name);
					break;

				case 'robot':
					$child = new Robot($this->space, $type, $group, $name);
					break;
				
				default:
					$child = new Entity($this->space, $type, $group, $name);
					break;
			}
			$this->space->createGuid($child);
			return $child;
		}

		public function work(){
			
		}
	}
?>