<?php

namespace ArrowSphere\PublicApiClient\Customers\Entities;

use ArrowSphere\PublicApiClient\AbstractEntity;
use ArrowSphere\PublicApiClient\Exception\EntityValidationException;

/**
 * Class Gdap
 */
class Gdap extends AbstractEntity
{
    public const COLUMN_ID = 'id';
    public const COLUMN_DISPLAY_NAME = 'displayName';
    public const COLUMN_STATUS = 'status';
    public const COLUMN_START_DATE = 'startDate';
    public const COLUMN_END_DATE = 'endDate';
    public const COLUMN_AUTO_EXTEND = 'autoExtend';
    public const COLUMN_PRIVILEGES = 'privileges';
    public const COLUMN_SECURITY_GROUPS = 'securityGroups';

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $displayName;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $startDate;

    /**
     * @var string|null
     */
    private $endDate;

    /**
     * @var string|null
     */
    private $autoExtend;

    /**
     * @var array|null
     */
    private $privileges;

    /**
     * @var array|null
     */
    private $securityGroups;

    /**
     * Gdap constructor.
     *
     * @param array $data
     *
     * @throws EntityValidationException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->id = $data[self::COLUMN_ID] ?? '';
        $this->displayName = $data[self::COLUMN_DISPLAY_NAME] ?? '';
        $this->status = $data[self::COLUMN_STATUS] ?? '';
        $this->startDate = $data[self::COLUMN_START_DATE] ?? '';
        $this->endDate = $data[self::COLUMN_END_DATE];
        $this->autoExtend = $data[self::COLUMN_AUTO_EXTEND] ?? '';
        $this->privileges = $data[self::COLUMN_PRIVILEGES] ?? null;
        $this->securityGroups = $data[self::COLUMN_SECURITY_GROUPS] ?? null;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_filter([
            self::COLUMN_ID           => $this->id,
            self::COLUMN_DISPLAY_NAME => $this->displayName,
            self::COLUMN_STATUS       => $this->status,
            self::COLUMN_START_DATE   => $this->startDate,
            self::COLUMN_END_DATE     => $this->endDate,
            self::COLUMN_AUTO_EXTEND  => $this->autoExtend,
        ], static function ($val) {
            return $val !== null;
        });
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @return string
     */
    public function getAutoExtend(): string
    {
        return $this->autoExtend;
    }

    /**
     * @return array
     */
    public function getPrivileges(): array
    {
        return $this->privileges;
    }

    /**
     * @return array
     */
    public function getSecurityGroups(): array
    {
        return $this->securityGroups;
    }
}