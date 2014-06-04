<?php
	/**
	* 
	*/
	class Mother extends Entity {
	
		/**
		* undocumented class variable
		*/
		private $var;
	
		function __construct(Space $space) {
			/** mother of ozone*/
			parent::__construct('mother', '111', 'moo');
			$this->setSpace($space);
			$this->getSpace()->createGuid($this);
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
			if (empty($type)) {
				return false;
			}

			$child = null;
			switch ($type) {
				case 'commander':
					$child = new Commander($type, $group, $name);
					break;

				case 'robot':
					$child = new Robot($type, $group, $name);
					break;
				
				default:
					$child = new Entity($type, $group, $name);
					break;
			}
			$child->setSpace($this->getSpace());
			$this->getSpace()->createGuid($child);
			return $child;
		}
	}
?>