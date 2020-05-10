<?php
spl_autoload_register();

class AnswerPaper{
    private $answer_paper = "";
    private $answer_subject = "";
    private $marking_guide_obj;
    private $answers = array();

    public function __construct(MarkingGuide $obj){
        $this->marking_guide_obj = $obj;

    }

    /*
     * accepts the input and sets answer paper and subject
     * @param $input
     */
    public function set_answer_paper($input){
        if(!empty($input)){
            list($subject,$ques_answers) = explode(':', $input);
            $this->answer_paper = $input;
            $subject = str_replace(array('[',']'),'',$subject);
            $this->answer_subject = $subject;
            $answers= preg_replace('/[0-9]+/','',$ques_answers);
            $answers = str_replace(',','',$answers);
            $this->answers = explode(';',$answers);
        }else{
            return false;
        }

        return true;
    }

    /*
     * marks answer paper using the marking guide
     */

    public function mark_paper(){
        $key = array_search($this->answer_subject, $this->marking_guide_obj->subjects);

        if(is_numeric($key)){
            list($subject,$ques_answers) = explode(':', $this->marking_guide_obj->marking_guide[$key]);
            $answers= preg_replace('/[0-9]+/','',$ques_answers);
            $answers = str_replace(',','',$answers);
            $marking_guide_answers = explode(';',$answers);
            $score = 0;
            unset($marking_guide_answers[count($marking_guide_answers)-1]);
            unset($this->answers[(count($this->answers)-1)]);
            for ($i = 0 ; $i < count($this->answers); $i++){
                if($this->answers[$i] == $marking_guide_answers[$i] ){
                    $score++;
                }
            }
            $output = array($score , count($marking_guide_answers) );
            return $output;

        }else{
            return false;
        }

    }
}