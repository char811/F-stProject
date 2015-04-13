<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.03.15
 * Time: 0:46
 */
use Behat\Mink\Element\NodeElement;
require_once 'MinkTestCase.php';

class PageTest extends MinkTestCase
{
    function main()
    {
        $this->getSession('http://lara/public');
        $main_page=$this->getPage();

        $this->assertContains('MyName', $main_page->getTitle());
        $this->assertEquals('http://lara/public', $main_page->getCurrentUrl());
    }
}