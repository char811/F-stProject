<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.03.15
 * Time: 0:37
 */

abstract class MinkTestCase extends TestCase {
    private static $mink;

    public static function setUpBeforeClass()
    {
        if (null === self::$mink) {

            $driver = new \Behat\Mink\Driver\Selenium2Driver(
                'firefox',
                array(
                    'browserName'       => 'firefox',
                    'version'           => '9',
                    'platform'          => 'ANY',
                    'browserVersion'    => '9',
                    'browser'           => 'firefox',
                    'name'              => 'Behat Test',
                    'deviceOrientation' => 'portrait',
                    'deviceType'        => 'tablet',
                    'selenium-version'  => '2.42.2'
                )
            );

            self::$mink = new \Behat\Mink\Session($driver);
        }
    }


    protected function getMink()
    {
        return self::$mink;
    }

    protected function getSession($name = null)
    {
        return $this->getMink()->visit($name);
    }

    protected function getPage()
    {
        return self::$mink->getPage();
    }

}