<?php


namespace Ambab\EmiCalculator\Model;

use Ambab\EmiCalculator\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'bank_details';

    /**
     * @var string
     */
    protected $_cacheTag = 'bank_details';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'bank_details';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Ambab\EmiCalculator\Model\ResourceModel\Grid');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    

    public function getBankName()
    {
        return $this->getData(self::Bank_Name);
    }

    /**
     * Set Title.
     */
    public function setBankName($bank_name)
    {
        return $this->setData(self::Bank_Name, $bank_name);
    }

    /**
     * Get getContent.
     *
     * @return varchar
     */
    public function getMonth()
    {
        return $this->getData(self::Month);
    }


    public function setMonth($month)
    {
        return $this->setData(self::Month, $month);
    }

    public function getRateOfInt()
    {
        return $this->getData(self::Rate_Of_Int);
    }


    public function setRateOfInt($rate_of_int)
    {
        return $this->setData(self::Rate_Of_Int, $rate_of_int);
    }

    /**
     * Get PublishDate.
     *
     * @return varchar
     */
    public function getPublishDate()
    {
        return $this->getData(self::PUBLISH_DATE);
    }

    /**
     * Set PublishDate.
     */
    public function setPublishDate($publishDate)
    {
        return $this->setData(self::PUBLISH_DATE, $publishDate);
    }

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}