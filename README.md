"# console app" 
============
 Console App Exercise
 ============
 Based on your knowledge of PHP alone, you are required to build one of the following console apps. Each app must provide a menu of different actions to perform in which the user can select one out of them to use. Once the action is performed, the menu must be presented to the user again (like a constant loop). There must be a 'Quit' menu item to allow the user break the loop and end the program.

 Good use of OOP and properly ordered code will be appreciated. Adding a unique touch to your app is highly welcomed.

 Please make the console interface as friendly as possible.

 No external library must be used, only php built-in functions are allowed.
 No API calls are welcomed.
 No connection to a db is allowed. In the case you need to persistent data use arrays or store ur data in the json file or serialise it in a file.

 Please use your bitbucket or github account to store your projects so we can review them easily.

 Each App has a maximum number of people that can work on them. It will be beside their name.

 =============
 Paper Marking (Max: 3)
 =============
 Jamb needs your help!!!

 They need a program that can mark the papers of their candidates using the marking guide for each Subject then output the score.
 The marking guide is the list of all the questions for a subject with only right answers. The marking guide is a paper with only right answers.
 A paper consists of the following:
 - a subject
 - questions
 - corresponding answers

 Jamb stored papers (and the marking guide) in the following format:

 [subject]:question_1,answer_1;question_2,answer_2;question_3,answer_3;...;question_n,answer_n

 For example,

 [english]:1,A;2,C;3,D;4,A;5,D;6,D

 Note:
 - Every question denoted with a number > 0
 - Every answer must be an upper case alphabet (No restrictions on allowed alphabets)
 - There can only be one marking guide per subject
 - The questions cannot have the same number.
     eg. [english]:1,A;1,C
     There cannot be two question 1s
     
 - There can only be one correct answer for any question.
 - There are more than one subject to be marked
 - Give 'Cannot mark' for papers that do not have a marking guide
 - Each student can only do one subject.

 The app must have the following menu actions:
 - Save (/ Override if existing) the marking guide
 - Remove a marking guide
 - List all available marking guide
 - Score a paper and output the score and a percentage