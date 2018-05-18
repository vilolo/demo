<?php
/**
 * @copyright Copyright (c) 2017 Kaicai Media LLC
 * @author luoweifeng <luoweifeng@kaicaimedia.com>
 */

namespace backend\components;


class TestComponent extends \yii\base\Component
{
    const BB = "bb";

    public function bar()
    {
        $this->trigger(self::BB);
    }
}