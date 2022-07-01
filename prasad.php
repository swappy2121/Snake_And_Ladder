<?php
    class SankeAndLadder{
        //variable
        public $startPosition = 0;
        public $diceNum = 0;
        private $count = 0;
        public $player1Position = 0;
        public $player2Position = 0;
        public $previousPosition1;
        public $previousPosition2;
        private $flag = true;

        //welcome message
        public function welcome(){
            echo "Welcome to the Snake And Ladder game \n";
            echo "Player starts from $this->startPosition \n";
        }

        //function to generate random number between 1 to 6
        public function rollDice(){
            $this->diceNum = rand(1, 6);
            $this->count++;
            echo "Number of times dice rolled :" . $this->count . "____";
            //echo "Previous Position :" . $this->previousPosition . " " . "StartPosition :" . $this->startPosition;
            return $this->diceNum;
        }

        //Function to generate random number between 1 to 3
        public function option(){
            return rand(1, 3);
        }

        //Function to decide next position of player
        public function nextMove($choice){   
            //$this->flag = true;
            $this->previousPosition1 = $this->player1Position;
            $this->previousPosition2 = $this->player2Position;
                switch($choice){
                    case 1:
                        if($this->flag == true){
                            $this->player1Position = $this->player1Position;
                            echo "Player1 Previous Position :" . $this->previousPosition1 . "____" . "Player1 StartPosition :" . $this->player1Position . "\n";
                            $this->flag = false;
                        }
                        else{
                            $this->player2Position = $this->player2Position;
                            echo "Player2 Previous Position :" . $this->previousPosition2 . "____" . "Player2 StartPosition :" . $this->player2Position . "\n";
                            $this->flag = true;
                        }
                        break;
    
                    case 2:
                        if($this->flag == true){
                            $this->player1Position += $this->diceNum;
                       
                            if($this->player1Position < 100){
                                echo "Player1 Previous Position :" . $this->previousPosition1 . "____" . "Player1 StartPosition :" . $this->player1Position . "\n";
                            }
                            elseif($this->player1Position > 100){
                                $this->player1Position = $this->previousPosition1;
                                echo "Player1 Previous Position :" . $this->previousPosition1 . "____" . "Player1 StartPosition :" . $this->player1Position . "\n";
                            }
                            elseif($this->player1Position == 100){
                                echo "Player1 Previous Position :" . $this->previousPosition1 . "____" . "Player1 StartPosition :" . $this->player1Position . "\n";
                                echo "Player1 won the game";
                                break;
                            }
                            $this->diceNum = $this->rollDice();
                            $choice = $this->option();
                            $this->nextMove($choice);
                            $this->flag = false;
                        }
                        else{
                            $this->player2Position += $this->diceNum;
                            
                            if($this->player2Position < 100){
                                echo "Player2 Previous Position :" . $this->previousPosition2 . "____" . "Player2 StartPosition :" . $this->player2Position . "\n";
                            }
                            elseif($this->player2Position > 100){
                                $this->player2Position = $this->previousPosition2;
                                echo "Player2 Previous Position :" . $this->previousPosition2 . "____" . "Player2 StartPosition :" . $this->player2Position . "\n";
                            }
                            elseif($this->player2Position == 100){
                                echo "Player2 Previous Position :" . $this->previousPosition2 . "____" . "Player2 StartPosition :" . $this->player2Position . "\n";
                                echo "Player2 won the game";
                                break;
                            }
                            $this->diceNum = $this->rollDice();
                            $choice = $this->option();
                            $this->nextMove($choice);
                            $this->flag = true;
                        }  
                        break;
    
                    case 3:
                        if($this->flag == true){
                            $this->player1Position -= $this->diceNum;
                            if($this->player1Position < 0){
                                $this->player1Position = 0;
                            }
                            echo "Player1 Previous Position :" . $this->previousPosition1 . "____" . "Player1 StartPosition :" . $this->player1Position . "\n";
                            $this->flag = false;
                        }
                        else{
                            $this->player2Position -= $this->diceNum;
                            if($this->player2Position < 0){
                                $this->player2Position = 0;
                            }
                            echo "Player2 Previous Position :" . $this->previousPosition2 . "____" . "Player2 StartPosition :" . $this->player2Position . "\n";
                            $this->flag = true;
                        }    
                        break;
                }
            }        
    }

    //object
    $game = new SankeAndLadder();
    $game->welcome();
    while($game->player1Position < 100 && $game->player2Position < 100){
        $game->rollDice();
        $choice = $game->option();
        $game->nextMove($choice);
    }        
?>