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
            unset($this->answers[(count($this->answers)-1)]);
        }else{
            return false;
        }

        return true;
    }

    /*
     * marks answer paper using the marking guide
     */

    public function mark_paper(){
        $key = array_search($this->answer_subject, $this->marking_guide_obj->subjects );

        if(is_numeric($key)){
            $score = 0;

            for ($i = 0 ; $i < count($this->answers); $i++){
                if($this->answers[$i] == $this->marking_guide_obj->subjects_answers[$this->answer_subject][$i] ){
                    $score++;
                }
            }
            $output = array($score , count($this->marking_guide_obj->subjects_answers[$this->answer_subject]) );
            return $output;

        }else{
            return false;
        }

    }
}