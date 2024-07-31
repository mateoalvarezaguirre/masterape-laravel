<?php

namespace Src\Purchase\Domain\Enums;

enum PurchaseStatusEnum: int
{
    case PAYMENT_PENDING  = 1;
    case PAYMENT_APPROVED = 2;
    case PAYMENT_REJECTED = 3;
    case CANCELLED        = 4;
    case DELIVERED        = 5;
    case RETURNED         = 6;
    case REFUNDED         = 7;
    case COMPLETED        = 8;
    case ARCHIVED         = 9;
    case DELETED          = 10;

    public static function fromName(string $name): ?self
    {
        return match ($name) {
            self::PAYMENT_PENDING->name  => self::PAYMENT_PENDING,
            self::PAYMENT_APPROVED->name => self::PAYMENT_APPROVED,
            self::PAYMENT_REJECTED->name => self::PAYMENT_REJECTED,
            self::CANCELLED->name        => self::CANCELLED,
            self::DELIVERED->name        => self::DELIVERED,
            self::RETURNED->name         => self::RETURNED,
            self::REFUNDED->name         => self::REFUNDED,
            self::COMPLETED->name        => self::COMPLETED,
            self::ARCHIVED->name         => self::ARCHIVED,
            self::DELETED->name          => self::DELETED,
            default                      => null
        };
    }

    /**
     * @return array<int>
     */
    public static function toArray(): array
    {
        return [
            self::PAYMENT_PENDING->value,
            self::PAYMENT_APPROVED->value,
            self::PAYMENT_REJECTED->value,
            self::CANCELLED->value,
            self::DELIVERED->value,
            self::RETURNED->value,
            self::REFUNDED->value,
            self::COMPLETED->value,
            self::ARCHIVED->value,
            self::DELETED->value,
        ];
    }
}
