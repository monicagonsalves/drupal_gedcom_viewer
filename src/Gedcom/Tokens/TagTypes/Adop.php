<?php
namespace Drupal\family_tree_generator\Gedcom\Tokens\TagTypes;

use Drupal\family_tree_generator\Gedcom\Tokens\Tag; 

require_once("../Tag.php");

class Adop extends Tag {
	function __construct(){
		parent::__construct("Adop");

		$this->specified_child_tags = array("famc","date","plac","addr","age");
	}
}