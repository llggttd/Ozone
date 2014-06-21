<?php
	/**
	* 
	*/
	class Robot extends Entity {
	
		function __construct($space, $type, $group = null, $name = null) {
			parent::__construct($space, $type, $group, $name);
			$this->MODE = Entity::IDLE;
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

		public function work(){
			if ($this->MODE == Entity::IDLE) {
				return true;
			}
			if (!$this->tasks) {
				$this->MODE = Entity::IDLE;
				return true;
			}
			usort($this->tasks, function($a, $b){
				return ($a['priority'] <= $b['priority']) ? -1 : 1;
			});
			$task = array_shift($this->tasks);
			$task['action']->start($this);
			if ($task['action']->state() == Action::FAILURE) {
				$task['retry'] += 1;
				array_push($this->tasks, $task);
			}
			return true;
		}
	}
?>