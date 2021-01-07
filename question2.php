<?php
/**
 * Created by PhpStorm.
 * User: ernesto
 * Date: 1/6/21
 * Time: 2:30 PM
 */

$data = array (
    array (
        'guest_id' => 177,
        'guest_type' => 'crew',
        'first_name' => 'Marco',
        'middle_name' => NULL,
        'last_name' => 'Burns',
        'gender' => 'M',
        'guest_booking' => array (
            array (
                'booking_number' => 20008683,
                'ship_code' => 'OST',
                'room_no' => 'A0073',
                'start_time' => 1438214400,
                'end_time' => 1483142400,
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (
            array (
                'account_id' => 20009503,
                'status_id' => 2,
                'account_limit' => 0,
                'allow_charges' => true,
            ),
        ),
    ),
    array (
        'guest_id' => 10000113,
        'guest_type' => 'crew',
        'first_name' => 'Bob Jr ',
        'middle_name' => 'Charles',
        'last_name' => 'Burns',
        'gender' => 'M',
        'guest_booking' => array (
            array (
                'booking_number' => 10000013,
                'room_no' => 'B0092',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (
            array (
                'account_id' => 10000522,
                'account_limit' => 150,
                'allow_charges' => true,
            ),
        ),
    ),
    array (
        'guest_id' => 10000114,
        'guest_type' => 'crew',
        'first_name' => 'Al ',
        'middle_name' => 'Bert',
        'last_name' => 'Santiago',
        'gender' => 'M',
        'guest_booking' => array (
            array (
                'booking_number' => 10000014,
                'room_no' => 'A0018',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (
            array (
                'account_id' => 10000013,
                'account_limit' => 500,
                'allow_charges' => false,
            ),
        ),
    ),
    array (
        'guest_id' => 10000115,
        'guest_type' => 'crew',
        'first_name' => 'Red ',
        'middle_name' => 'Ruby',
        'last_name' => 'Flowers ',
        'gender' => 'F',
        'guest_booking' => array (
            array (
                'booking_number' => 10000015,
                'room_no' => 'A0051',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (
            array (
                'account_id' => 10000519,
                'account_limit' => 700,
                'allow_charges' => true,
            ),
        ),
    ),
    array (
        'guest_id' => 10000116,
        'guest_type' => 'crew',
        'first_name' => 'Ismael ',
        'middle_name' => 'Jean-Vital',
        'last_name' => 'Jammes',
        'gender' => 'M',
        'guest_booking' => array (
            array (
                'booking_number' => 10000016,
                'room_no' => 'A0023',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (
            array (
                'account_id' => 10000015,
                'account_limit' => 600,
                'allow_charges' => true,
            ),
        ),
    ),
);


function searchKeyValue($data, $keys) {
    $dataTemp = [];
    foreach ($data as $datum) {
        $guestId = $datum['guest_id'];
        $dataTemp[$guestId] = ['guest_id' => $guestId];
        foreach ($keys as $key) {
            $keyValue = findKeyValue($key, $datum);
            $dataTemp[$guestId] = array_merge($dataTemp[$guestId], $keyValue);
        }
    }

    usort($dataTemp, function ($a, $b) use ($keys) {
        foreach ($keys as $key) {
            if($a[$key] > $b[$key]) {
                return 1;
            } elseif ($a[$key] < $b[$key]) {
                return -1;
            }
        }
        return 0;
    });

    $dataToReturn = [];
    foreach ($dataTemp as $datum) {
        $guestId = $datum['guest_id'];
        foreach ($data as $value) {
            if($value['guest_id'] == $guestId) {
                $dataToReturn[] = $value;
            }
        }
    }
    print_r($dataToReturn);
    return $dataToReturn;
}

function findKeyValue($key, $data) {
    $result = [];
    if(array_key_exists($key, $data)) {
        return array($key => $data[$key]);
    }
    else {
        foreach ($data as $value) {
            if(is_array($value)) {
                $result = findKeyValue($key, $value);
            }
        }
    }
    return $result;
}

searchKeyValue($data, ['last_name', 'account_id']);
