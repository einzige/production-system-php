<?php

jimport('joomla.application.component.controllerform');
require_once(JPATH_COMPONENT_SITE.DS.'models'.DS.'quiz.php');

class QuizControllerQuiz extends JControllerForm {

    function __construct($__config = Array())
    {
        parent::__construct($__config);
        $this->registerDefaultTask("edit");
        $this->registerTask("answer", 'answer');
    }

    public function answer()
    {
        $model = $this->getModel();
        $data = JRequest::getVar('jform', array(), 'post', 'array');
        $model->save($data);
        $pk = $model->getPK();

        $this->setRedirect("index.php?option=com_quiz&view=results&cid=$pk", "Your personal results.");
    }
}
