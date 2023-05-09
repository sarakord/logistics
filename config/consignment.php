<?php

return [
    'name' => 'consignment_type',
    'status' => [
        1 => 'pending',
        2 => 'processing',
        3 => 'delivered',
    ],
    'distance_estimation_url' => [
      'neshan' => "https://api.neshan.org/v1/distance-matrix/no-traffic?type=motorcycle&origins=#ORIGIN&destinations=#DESTINATION",
      'map_ir' => "https://map.ir/distancematrix?origins=b,#ORIGIN&destinations=c,#DESTINATION"
    ],
    'distance_estimation_Api_key' => [
      'neshan' => env('API_KEY_NESHAN', null),
      'map_ir' => env('API_KEY_MAP_IR', null),
    ],
];
