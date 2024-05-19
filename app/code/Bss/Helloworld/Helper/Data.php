<?php
declare(strict_types=1);

namespace Bss\Helloworld\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Helper Data
 *
 * getdata from configuration
 */
class Data extends AbstractHelper
{
    public const XML_PATH_HELLOWORLD = 'helloworld_section/';

    /**
     * Get Config Value
     *
     * @param string $field
     * @param int $storeId
     */
    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Get GeneralConfig
     *
     * @param string $code
     * @param int $storeId
     */
    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_HELLOWORLD . 'general/' . $code, $storeId);
    }
}
