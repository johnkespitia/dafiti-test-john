<?php
Class Poker{
    
    protected $cards;

    const ASMAX = 14;
    const ASMIN = 1;

    public function __construct(){
        $this->cards = [];
    }

    public function addCard(int $card){
        if(sizeof($this->cards)<7){
            if($card>0 && $card<15){
                $this->cards[] = $card;
            }else{
                throw new Exception("{$card} No es una carta válida");
            }
        }else{
            throw new Exception("La mano puede tener máximo 7 cartas");
        }
    }

    public function getCards(){
        return $this->cards;
    }

    public function isStraight( $cards = [] ){
        foreach($cards as $c){
            $this->addCard($c);
        }
        
        if(in_array(self::ASMAX,$this->cards)) { 
            $this->cards[]=self::ASMIN; 
        }else if(in_array(self::ASMIN,$this->cards)) {
            $this->cards[]=self::ASMAX; 
        }

        sort($this->cards);
        
        $consecutivas = 0;
        
        foreach($this->cards as $k => $card){
            if($k > 0){
                if($card-$this->cards[$k-1]==1){
                    $consecutivas++;
                }else{
                    $consecutivas=0;
                }
            }
            if($consecutivas>=4) return true;
        }
        return false;
    }

}