<?php
spl_autoload_register(function ($className) {
    include_once 'include/'.$className.'.php';
});

function app_menu(){
    echo"\e[1;32;40m======================================\n";
    echo"      \e[1;31;40m PAPER MARKING APPLICATION \e[1;32;40m\n";
    echo"======================================\n";
    echo"Enter one of the following options\n
         1- To Save/Override Marking guide\n
         2- To delete a Marking guide\n
         3- To List all Available Marking guide\n
         4- To Score an answer paper\n
         Q- To Quit application\n";
}

$marking_guide_obj = new MarkingGuide();
$answer_paper_obj = new AnswerPaper($marking_guide_obj);

do{
    app_menu();
    $option = trim(fgets(STDIN));

    switch($option){
        case "1":
            echo"\e[1;31;40m Enter marking guide using the format [subject]:1,A;2,C;3,B;4,A;5,D; \e[1;32;40m\n";
            $input = trim(fgets(STDIN));
            if(($marking_guide_obj->validate_input($input))){
                $status = $marking_guide_obj->save_marking_guide($input);
                if($status){
                    echo"\e[1;31;40m Saved Successfully \e[1;32;40m\n\n";
                }else{
                    echo"\e[1;31;40m Invalid format for marking guide \e[1;32;40m\n\n";
                }
            }else{
                echo"\e[1;31;40m Invalid format for marking guide \e[1;32;40m\n\n";
            }


            break;
        case "2":
            $marking_guide_obj->list_marking_guide();
            echo "Enter number of Marking guide you wish to delete\n\n";
            $input = trim(fgets(STDIN));
            if(is_numeric($input)){
                $status = $marking_guide_obj->delete_marking_guide($input);
                if($status){
                    echo"\e[1;31;40m Deleted successfully \e[1;32;40m\n\n";
                }else{
                    echo"\e[1;31;40m Invalid Index \e[1;32;40m \n\n";
                }

            }else{
                echo"\e[1;31;40m Invalid input \e[1;32;40m \n\n";
            }
            break;
        case "3":
            $marking_guide_obj->list_marking_guide();
            break;
        case "4":
            echo"\e[1;31;40m Enter answer paper you wish to mark using the format [subject]:1,A;2,C;3,B;4,A;5,D; \e[1;32;40m \n";
            $input = trim(fgets(STDIN));
            if(($marking_guide_obj->validate_input($input))){
                $answer_paper_obj->set_answer_paper($input);
                $output =$answer_paper_obj->mark_paper();
                if(is_array($output)){
                    echo"Your score is : ".$output[0]."/".$output[1]." and your percentage is: ".($output[0]/$output[1]*100)."%\n\n";
                }else{
                    echo" \e[1;31;40m Marking guide deos not exist so Cannot Mark paper \e[1;32;40m \n\n";
                }
            }else{
                echo"\e[1;31;40m Invalid format for answer paper \e[1;32;40m\n\n";
            }

            break;
        case "q":
        case "Q":
            echo"Thank you, shutting down...";
            exit();
            break;
        default:
            echo "\e[1;31;40m Your option wasn't found! \e[1;32;40m \n";
    }

}while(true);
