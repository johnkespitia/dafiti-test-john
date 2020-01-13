<?php
include 'src/Poker.php';

$juego = new Poker();

/*
$juego->addCard(2);
$juego->addCard(7);
$juego->addCard(8);
$juego->addCard(5);
$juego->addCard(10);
$juego->addCard(9);
$juego->addCard(11);


$juego->addCard(9);
$juego->addCard(10);
$juego->addCard(11);
$juego->addCard(12);
$juego->addCard(13);


$juego->addCard(7);
$juego->addCard(8);
$juego->addCard(12);
$juego->addCard(13);
$juego->addCard(14);

*/
$juego->addCard(14);
$juego->addCard(2);
$juego->addCard(3);
$juego->addCard(4);
$juego->addCard(5);
$juego->addCard(7);


var_dump($juego->isStraight( ));

/**
 * escalera: 14-2-3-4-5
 * escalera: 9-10-11-12-13
 * escalera: 2-7-8-5-10-9-11
 * no es escalera: 7-8-12-13-14
 * 
 */