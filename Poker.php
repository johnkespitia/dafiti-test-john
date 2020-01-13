<?php
Class Poker{
    
    protected $cards;

    public function addCard(int $card){
        if($card>0 && $card<15){
            $this->cards[] = $card;
        }else{
            throw new Exception("No es una carta válida");
        }
    }

    public function getCards(){
        return $this->cards;
    }

    public function isStraight( $cards = []){
        if(!empty($cards) && sizeof($cards)>0){
            $this->cards = array_combine($this->cards,$cards);
        }
    }

}