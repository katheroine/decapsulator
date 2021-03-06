<?php

/*
 * This file is part of the Decapsulator package.
 *
 * (c) Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Exorg\Decapsulator\ObjectDecapsulator;

/**
 * PropertyExistsTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class PropertyExistsTest extends AbstractPropertyAccessorsTest
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'propertyExists';
    }

    /**
     * Test propertyExists($name) method
     * returns false when the property does not exist.
     */
    public function testReturnsFalseWhenPropertyDoesNotExist()
    {
        $arguments = array(self::NONEXISTENT_PROPERTY);

        $propertyExists = $this->callTestedMethod($arguments);

        $this->assertFalse($propertyExists);
    }

    /**
     * Test propertyExists($name) method
     * returns true when the property exists.
     *
     * @dataProvider existingPropertiesProvider
     * @param string $propertyName
     */
    public function testReturnsTrueWhenPropertyExists($propertyName)
    {
        $arguments = array($propertyName);

        $propertyExists = $this->callTestedMethod($arguments);

        $this->assertTrue($propertyExists);
    }
}
