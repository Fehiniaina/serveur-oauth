<?php
/**
 * Created by PhpStorm.
 * User: Fehiniaina
 * Date: 24/02/15
 * Time: 10:11
 */

namespace Acme\DemoBundle\Utility\Test;

use Acme\DemoBundle\Utility\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $calc = new Calculator();
        $result = $calc->add(30, 12);

        // vérifie que votre classe a correctement calculé!
        $this->assertEquals(40, $result);
    }
} 