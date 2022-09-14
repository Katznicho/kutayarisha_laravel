<?php

namespace App\Traits;

trait AccessTrait
{
    public static $admin = [
        "Dashboard" => [
            "View Dashboard",
            // "View Only Assigned",
        ]
    ];

    public static $orders = [
        "Order Details"=>['View Orders', 'Edit Orders', 'Add Order', 'Delete Orders'],


    ];

    public static $users = [
        "User Details"=>['View users', 'Edit Users', 'Delete Users'],


    ];

    public static $reports = [
        "Patient Reports" => ['View Reports', 'Generate Reports', 'Delete Reports'],
        "Staff Reports" => ['View Staff Reports'],
    ];

    public  function spreadArrayKeys($assocArray)
    {
        $result = [];
        foreach ($assocArray as $key => $value) {
            if (is_string($key)) {
                $result[] = $key;
            }
            if (is_array($value)) {

                $result = array_merge($result, static::spreadArrayKeys($value));
            } else {
                $result[] = $value;
            }
        }
        return  $result;
    }

    public static function getAllPermissions()
    {
        $roles = static::spreadArrayKeys(
            array_merge(
                static::$admin,
                static::$orders,
                static::$users,
                static::$reports,


            )
        );
        return $roles;
    }
    public static function getAccessControl()
    {

        $access = [
            "Admin" => self::$admin,
            "Orders" =>  self::$orders,
            "Reports" =>  self::$reports,
            "Users" =>  self::$users,

            // "Accounting" => static::$accounting
        ];
        return $access;
    }


    // public static function userCan($pageRole, $actions = [])
    // {
    //     return in_array($pageRole, $actions);
    // }

    public static function user_can($page_role)
    {
        $actions1 = $_SESSION['actions'];
        $actions = json_decode($actions1);
        // print_r($actions);
        return in_array($page_role, $actions);
    }
    public static function is_assoc(array $array)
    {
        // Keys of the array
        $keys = array_keys($array);
        // If the array keys of the keys match the keys, then the array must
        // not be associative (e.g. the keys array looked like {0:0, 1:1...}).
        return array_keys($keys) !== $keys;
    }

}
