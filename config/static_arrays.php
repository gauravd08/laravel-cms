<?php

class StaticArray {

    public static $static_page_images = [
        2 => [
            1 => ['width' => 960, 'height' => 900],
        ],
        1 => [
            2 => ['width' => 960, 'height' => 900],
            3 => ['width' => 960, 'height' => 450],
            4 => ['width' => 960, 'height' => 450],
        ],
         3 => [
            5 => ['width' => 1024, 'height' => 582],
        ]
    ];
    
    //graphic type images
    public static $graphic_type_images = [
        GRAPHIC_TYPE_HOME_BANNER => ['width' => 1920, 'height' => 780]
    ];
     
    //graphic types
    public static $graphic_types = [
        GRAPHIC_TYPE_HOME_BANNER => 'Home Banner',
    ];
}
