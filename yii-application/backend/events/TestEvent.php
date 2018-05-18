<?php
/**
 * @copyright Copyright (c) 2017 Kaicai Media LLC
 * @author luoweifeng <luoweifeng@kaicaimedia.com>
 */

namespace backend\events;

use yii\base\Event;

class TestEvent extends Event
{
    const EVENT_HELLO = 'hello';

    public $message;
}