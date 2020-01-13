<?php
use PHPUnit\Framework\TestCase;

require __DIR__.'/../src/Poker.php';
final class PokerTest extends TestCase
{
 
    public function testAlgorithm() {
        $mano1 = new Poker\Poker();       
        $results1 = $mano1->isStraight([2, 3, 4 ,5, 6]);
        $this->assertEquals($results1, true, "2, 3, 4 ,5, 6");
        
        $mano2 = new Poker\Poker();       
        $results2 = $mano2->isStraight([14, 5, 4 ,2, 3]);
        $this->assertEquals($results2, true, "14, 5, 4 ,2, 3");
        
        $mano3 = new Poker\Poker();       
        $results3 = $mano3->isStraight([7, 7, 12 ,11, 3, 4, 14]);
        $this->assertEquals($results3, false, "7, 7, 12 ,11, 3, 4, 14");

        $mano4 = new Poker\Poker();       
        $results4 = $mano4->isStraight([7, 3, 2]);
        $this->assertEquals($results4, false, "7, 3, 2");
    }
        
}