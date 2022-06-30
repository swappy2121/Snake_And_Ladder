<?php
    class SankeAndLadder{
        //variable
        public $Start_Position = 0;
        private $Previous_Position;
        private $diceNum;
        private $count = 0;

        //welcome message
        public function welcomeWindow(){
            echo "Welcome to the Snake And Ladder game \n";
            echo "Player starts from $this->Start_Position \n";
        }

        //function of rolling the dice 
        public function rollDice(){
            $this->diceNum = rand(1, 6);
            $this->count++;
            echo "Number of times dice rolled : $this->count  \n";
        
            return $this->diceNum;
        }

        //function for option check
        public function optionCheck(){
            return rand(1, 3);
        }


        public function nextMove($choice){   
                $this->Previous_Position = $this->Start_Position;
                switch($choice){
                    case 1:
                        $this->Start_Position = $this->Start_Position;
                        echo "Previous Position : $this->Previous_Position     StartPosition :  $this->Start_Position  \n";
                        break;
    
                    case 2:
                        $this->Start_Position += $this->diceNum;
                        if($this->Start_Position < 100){
                            echo "Previous Position :  $this->Previous_Position    StartPosition :  $this->Start_Position  \n";
                        }
                        elseif($this->Start_Position > 100){
                            $this->Start_Position = $this->Previous_Position;
                            echo "Previous Position :  $this->Previous_Position    StartPosition :  $this->Start_Position  \n";
                        }
                        elseif($this->Start_Position == 100){
                            echo "Previous Position :  $this->Previous_Position     StartPosition :  $this->Start_Position  \n";
                            echo "Player won the game";
                        }
                        break;
    
                    case 3:
                        $this->Start_Position -= $this->diceNum;
                        if($this->Start_Position < 0){
                            $this->Start_Position = 0;
                        }
                        echo "Previous Position :  $this->Previous_Position     StartPosition :  $this->Start_Position  \n";
                        break;
                }
            
            } 
        
    }

    
    $Game_Operation = new SankeAndLadder();
    $Game_Operation->welcomeWindow();
    while($Game_Operation->Start_Position < 100){
        $Game_Operation->rollDice();
        $choice = $Game_Operation->optionCheck();
        $Game_Operation->nextMove($choice);
    }  
?>