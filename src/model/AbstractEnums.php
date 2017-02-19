<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 18/02/2017
 * Time: 22:51
 */

namespace Itb;
use SplEnum;


class Month extends SplEnum {
    const __default = self::January;

    const January = 1;
    const February = 2;
    const March = 3;
    const April = 4;
    const May = 5;
    const June = 6;
    const July = 7;
    const August = 8;
    const September = 9;
    const October = 10;
    const November = 11;
    const December = 12;
}

class CountyPostcode extends SplEnum {
    const Dublin1= 1;
    const Dublin2 = 2;
    const Dublin3 = 3;
    const April = 4;

}
?>