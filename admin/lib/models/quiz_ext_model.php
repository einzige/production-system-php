<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.modeladmin');

class QuizExtModel extends JModelAdmin
{
    var $associations = Array(); // Array("signs" => { fk             => "answer_id",
                                 //                    weights_table  => "quiz_answers_signs",
                                 //                    weighted_table => "quiz_signs",
                                 //                    weighted_fk    => "sing_id"})

    public function save($data)
    {
        $result = parent::save($data);
        if( ! $result) return $result;

        foreach(array_values($this->associations) as $association) {
            $this->save_associated($association, $data);
        }
        return $result;
    }

    // TODO: refactor, avoid using plainsql.
    public function save_associated($association, $data)
    {
        $weights_table  = $association["weights_table"];
        $weighted_table = $association["weighted_table"];
        $weighted_fk    = $association["weighted_fk"];
        $fk             = $association["fk"];

        $main_table = $this->getTable()->getTableName();
        $virtual_field = $weighted_table."_ids";

        // How to get an id in a right way?
        $pk	= (!empty($data['id'])) ? $data['id'] : (int)$this->getState($this->getName().'.id');

        $db = JFactory::getDBO();

        $db->setQuery("DELETE FROM $weights_table WHERE $fk = $pk");
        $db->query();

        $ids = Array();
        if (! isset($data[$virtual_field])) {
            $db->setQuery("SElECT id, 0 as weight FROM $main_table");
            foreach($db->loadObjectList() as $i) $ids[$i->id] = '0';
        } else {
            $ids = $data[$virtual_field];
        }

        foreach($ids as $rel_id => $weight) {
            $db->setQuery("INSERT INTO $weights_table($fk, $weighted_fk, weight) VALUES($pk, $rel_id, $weight)");
            $db->query();
        }
    }

    public function getItem($pk=null) {
        $item = parent::getItem($pk);

        $pk	= (!empty($pk)) ? $pk : (int) $this->getState($this->getName().'.id');
        $db = JFactory::getDBO();

        foreach($this->associations as $association_name => $association) {
            $weights_table  = $association["weights_table"];
            $weighted_table = $association["weighted_table"];
            $weighted_fk    = $association["weighted_fk"];
            $fk             = $association["fk"];

            $query = $db->getQuery(true);
            $query->select("$weighted_table.id as id,$weighted_table.name as name,$weights_table.weight as weight")->from($weighted_table)
                  ->leftJoin("$weights_table on $weighted_table.id = $weights_table.$weighted_fk AND $weights_table.$fk = $pk");

            $db->setQuery((string)$query);
            $item->$association_name = $db->loadObjectList();
        }

        return $item;
    }

    public function getForm($data = array(), $loadData = true)
    {
        parent::getForm($data, $loadData);
    }
}