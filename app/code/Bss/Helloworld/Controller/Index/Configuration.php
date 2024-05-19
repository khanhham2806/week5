<?php
declare(strict_types=1);

namespace Bss\Helloworld\Controller\Index;

use Bss\Helloworld\Helper\Data;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Configuration
 *
 * class set title,description or redirect
 */
class Configuration implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var RedirectFactory
     */
    private $redirectFactory;

    /**
     * @var Data
     */

    protected $helperData;

    /**
     * @param Data $helperData
     * @param PageFactory $pageFactory
     * @param RedirectFactory $redirectFactory
     */

    public function __construct(Data $helperData, PageFactory $pageFactory, RedirectFactory $redirectFactory)
    {
        $this->helperData = $helperData;
        $this->redirectFactory = $redirectFactory;
        $this->pageFactory = $pageFactory;
    }

    /**
     * Execute
     *
     * @return mixed
     */
    public function execute()
    {
        $pageEnable = $this->helperData->getGeneralConfig('enable');
        if ($pageEnable == '1') {
            $pageTitle = $this->helperData->getGeneralConfig('page_title');
            $pageDescription = $this->helperData->getGeneralConfig('page_description');
            $page = $this->pageFactory->create();
            $page->getConfig()->getTitle()->prepend(__('Display Configuration'));
            $block = $page->getLayout()->getBlock('helloworld_index_configuration');
            $block->setData('page_title', $pageTitle);
            $block->setData('page_description', $pageDescription);
            return $page;
        } else {
            $page = $this->redirectFactory->create();
            $page->setPath('no-route');
            return $page;
        }
    }
}
