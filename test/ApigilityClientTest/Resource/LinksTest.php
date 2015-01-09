<?php
namespace ApigilityClientTest\Resource;

use ApigilityClientTest\Framework\TestCase;

use ApigilityClient\Resource\Links;

class LinksTest extends TestCase
{
    private $links;

    protected function setUp()
    {
        $data = array(
            'self' => array(
                'href' => 'http://api.local/v1/newspaper/item',
            ),
            'last' => array(
                'href' => 'http://api.local/v1/newspaper/item?page=1',
            ),
        );

        $this->links = new Links($data);
    }

    protected function tearDown()
    {
        $this->links = null;
    }

    public function testGetLinkPage()
    {
        $this->assertEquals('http://api.local/v1/newspaper/item', $this->links->getLinkPage());
        $this->assertEquals('http://api.local/v1/newspaper/item', $this->links->getLinkPage(Links::CURRENT_PAGE));
        $this->assertEquals('http://api.local/v1/newspaper/item?page=1', $this->links->getLinkPage(Links::LAST_PAGE));
    }

}