<?php
declare(strict_types=1);

namespace Bss\Helloworld\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * class set title
 */
class Display implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @param PageFactory $pageFactory
     * @param RequestInterface $request
     */
    public function __construct(PageFactory $pageFactory, RequestInterface $request)
    {
        $this->pageFactory = $pageFactory;
        $this->request = $request;
    }

    /**
     * Excute method
     */
    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->prepend(__('Display Params'));

        $name = $this->request->getParam('name', 'Khanh');
        $dob = $this->request->getParam('dob', '28-06-2001');
        $address = $this->request->getParam('address', '83 Tran Duy Hung');
        $description = $this->request->getParam('description', 'Description');

        $block = $page->getLayout()->getBlock('helloworld_index_display');
        $block->setData('name', $name);
        $block->setData('dob', $dob);
        $block->setData('address', $address);
        $block->setData('description', $description);

        return $page;
    }
}
