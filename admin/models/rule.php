<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');
require_once JPATH_COMPONENT.DS.'tables'.DS.'rules'.'.php';


class RuleModelRule extends JModel
{
    function __construct()
    {
        parent::__construct();

        $array = JRequest::getVar('cid',  0, '', 'array');
        $this->setId((int)$array[0]);
    }

    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param	type	The table type to instantiate
     * @param	string	A prefix for the table class name. Optional.
     * @param	array	Configuration array for model. Optional.
     * @return	JTable	A database object
     */
    public function getTable($type = 'Rule', $prefix = 'RuleTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    static function all() {
        $db =& JFactory::getDBO();
        $query = ' SELECT * FROM `#__rules` ';
        $db->setQuery( $query );
        return $db->loadObjectList();
    }

    function setId($id)
    {
        // Set id and wipe data
        $this->_id	= $id;
        $this->_data = null;
    }

    function &getData()
    {
        if (empty( $this->_data )) {
            $query = ' SELECT * FROM #__rules WHERE id = '.$this->_id;
            $this->_db->setQuery( $query );
            $this->_data = $this->_db->loadObject();
        }
        if (!$this->_data) {
            $this->_data = new stdClass();
            $this->_data->id = 0;
            $this->_data->description = "EMPTY*20, test*10";
        }
        return $this->_data;
    }

    function store()
    {
        $row = & $this->getTable('rules'); // new TableRules($this->_db); //

        $data = JRequest::get( 'post' );

        if (!$row->bind($data)) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        if (!$row->check()) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        if (!$row->store()) {
            $this->setError( $this->_db->getErrorMsg() );
            return false;
        }

        return true;
    }

    function delete()
    {
        $cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );

        $row =& $this->getTable();

        if (count( $cids )) {
            foreach($cids as $cid) {
                if (!$row->delete( $cid )) {
                    $this->setError( $row->getErrorMsg() );
                    return false;
                }
            }
        }
        return true;
    }
}