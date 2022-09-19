<?php

declare(strict_types=1);

namespace EVGV\Contact\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const XML_PATH_CONTACT_PAGE_PAGE_TITLE = 'contact/page/page_title';
    const XML_PATH_CONTACT_PAGE_META_TITLE = 'contact/page/meta_title';
    const XML_PATH_CONTACT_PAGE_META_DESCRIPTION = 'contact/page/meta_description';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Get Contact Page Title
     *
     * @return string
     */
    public function getContactPageTitle(): string
    {
        return (string) $this->scopeConfig->getValue(
            self::XML_PATH_CONTACT_PAGE_PAGE_TITLE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get Contact Page Meta Title
     *
     * @return string
     */
    public function getContactPageMetaTitle(): string
    {
        return (string) $this->scopeConfig->getValue(
            self::XML_PATH_CONTACT_PAGE_META_TITLE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get Contact Page Meta Description
     *
     * @return string
     */
    public function getContactPageMetaDescription(): string
    {
        return (string) $this->scopeConfig->getValue(
            self::XML_PATH_CONTACT_PAGE_META_DESCRIPTION,
            ScopeInterface::SCOPE_STORE
        );
    }
}
