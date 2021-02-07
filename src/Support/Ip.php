<?php declare(strict_types = 1);

namespace LaraRules\Support;

use Symfony\Component\HttpFoundation\IpUtils;

class Ip
{
    /**
     * Array of IP v4 address.
     *
     **/
    public static array $v4 = [
        '10.0.0.0/8',
        '172.16.0.0/12',
        '192.168.0.0/16'
    ];

    /**
     * Array of IP v6 address.
     *
     **/
    public static array $v6 = [
        'fc00::/7',
        'fd00::/8'
    ];

    /**
     * Check for IP V4 address.
     *
     * @param $address
     * @return bool
     */
    public static function isIpV4($address): bool
    {
        return !(substr_count($address, ':') > 1);
    }

    /**
     * Check for IP V6 address.
     *
     * @param $address
     */
    public static function isIpV6($address): bool
    {
        return (substr_count($address, ':') > 1);
    }

    /**
     * Is public ip.
     *
     * @param $address
     */
    public static function isPublicIp($address): bool
    {
        $ips = self::isIpV4($address) ? self::$v4 : self::$v6;
        return !(IpUtils::checkIp($address, $ips));
    }

    /**
     * Is private ip.
     *
     * @param $address
     */
    public static function isPrivateIp($address): bool
    {
        $ips = self::isIpV4($address) ? self::$v4 : self::$v6;
        return IpUtils::checkIp($address, $ips);
    }
}
