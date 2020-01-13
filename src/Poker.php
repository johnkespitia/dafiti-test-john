<?php

namespace Poker;
/**
 * Clase que organiza las cartas de un juego de poker
 * @author John Espitia <jcespitia1@gmail.com>
 * @version 1
 * @since 13/01/2020
 * 
 */
Class Poker{
   
    /**
     * Atributo que almacena las cartas del juego
     * @var array arreglo de cartas de juego de poker
     * @example [1,2,3,5,12,10,14]
     * @author John Espitia <jcespitia1@gmail.com>
     * @version 1
     * @since 13/01/2020
     * 
     */
    protected $cards;

    /**
     * Constante para definir el valor mayor del AS 
     * @author John Espitia <jcespitia1@gmail.com>
     * @version 1
     * @since 13/01/2020
     * 
     */
    const ASMAX = 14;

    /**
     * Constante para definir el valor menor del AS 
     * @author John Espitia <jcespitia1@gmail.com>
     * @version 1
     * @since 13/01/2020
     * 
     */
    const ASMIN = 1;

    /**
     * Constructor de la clase inicializa el atributo cards
     * @author John Espitia <jcespitia1@gmail.com>
     * @version 1
     * @since 13/01/2020
     * 
     */
    public function __construct(){
        $this->cards = [];
    }

    /**
     * Método para adicionar cartas a la mano del jugador
     * @param int $card Valor de la carta debe estar entre 1 y 14
     * @author John Espitia <jcespitia1@gmail.com>
     * @version 1
     * @since 13/01/2020
     * 
     */
    public function addCard(int $card){
        if(sizeof($this->cards)<7){
            if($card>0 && $card<15){
                $this->cards[] = $card;
            }else{
                throw new \Exception("{$card} No es una carta válida");
            }
        }else{
            throw new \Exception("La mano puede tener máximo 7 cartas");
        }
    }

    /**
     * Método que retorna las cartas del jugador
     * @return array las cartas del jugador
     * @author John Espitia <jcespitia1@gmail.com>
     * @version 1
     * @since 13/01/2020
     * 
     */
    public function getCards(){
        return $this->cards;
    }
    
    /**
     * Método que borra todas las cartas del jugador 
     * @author John Espitia <jcespitia1@gmail.com>
     * @version 1
     * @since 13/01/2020
     * 
     */
    public function cleanCards(){
        $this->cards = [];
    }

    /**
     * Método que verifica si hay escalera y retorna true o false 
     * @return boolean Retorna true si hay escalera y false si no
     * @param array $cards Cartas de juego agregadas a la mano del jugador
     * @author John Espitia <jcespitia1@gmail.com>
     * @version 1
     * @since 13/01/2020
     * 
     */
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
            if($consecutivas>=4) {
                return true;
            }
        }
        return false;
    }

}