<?php

/*
 * This file is part of the Decapsulator package.
 *
 * (c) Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Decapsulator\ObjectDecapsulator;

use Decapsulator\ObjectDecapsulator\AbstractPropertyAccessorsTest;

/**
 * MagicSetTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class MagicSetTest extends AbstractPropertyAccessorsTest
{
    /**
     * Test __set($name, $value) magic method
     * throws InvalidObjectException
     * when the property does not exist.
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Property does not exist.
     */
    public function testThrowsExceptionWhenPropertyDoesNotExist()
    {
        $propertyName = self::NONEXISTENT_PROPERTY_NAME;

        $this->decapsulator->$propertyName = 4;
    }

    /**
     * Test __set($name, $value) magic method
     * sets given property value correctly.
     *
     * @dataProvider existingPropertiesNamesProvider
     * @param string $propertyName
     */
    public function testSetsPropertyCorrectly($propertyName)
    {
        $expectedPropertyValue = 4;
        $this->decapsulator->$propertyName = $expectedPropertyValue;

        $actualPropertyValue = $this->getDecapsulatedObjectProperty($propertyName);

        $this->assertEquals($expectedPropertyValue, $actualPropertyValue);
    }
}
