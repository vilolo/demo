<?php
/**
 * @copyright Copyright (c) 2017 Kaicai Media LLC
 * @author luoweifeng <luoweifeng@kaicaimedia.com>
 */

namespace backend\controllers;

use backend\components\OpensslAes;
use backend\components\TestComponent;
use backend\events\TestEvent;
use common\models\SysLogistics;
use yii\base\Controller;

class TestController extends Controller
{
    const CC = "cc";
    const QQ = "qq";

    public function actionIndex()
    {
        $component = new TestComponent();

//        $component->on(TestEvent::EVENT_HELLO, ["backend\controllers\TestController", 'testEvent'], 'cccc');
//        $component->trigger(TestEvent::EVENT_HELLO);

//        $component->on(TestComponent::BB, ["backend\controllers\TestController", 'testEvent'], 'bbbbb');
//        $component->bar();

//        $component->on(TestComponent::BB, ["backend\controllers\TestController", 'testEvent'], 'aaaa');
//        $component->trigger(TestComponent::BB);

        $component->on("abc", ["backend\controllers\TestController", 'testEvent'], 'hh');
        $test_event = new TestEvent();
        $test_event->message = "哈哈哈";
        $component->trigger("abc", $test_event);
    }

    public function actionExpress()
    {
        //参数设置
        $post_data = array();
        $post_data["customer"] = '300A38387DC1D8718BA17B173543EBE8';
        $key= 'uBPwBrFc5239' ;
        $post_data["param"] = '{"com":"zhongtong","num":"720007749358"}';

        $url='http://poll.kuaidi100.com/poll/query.do';
        $post_data["sign"] = md5($post_data["param"].$key.$post_data["customer"]);
        $post_data["sign"] = strtoupper($post_data["sign"]);
        $o="";
        foreach ($post_data as $k=>$v)
        {
            $o.= "$k=".urlencode($v)."&";		//默认UTF-8编码格式
        }
        $post_data=substr($o,0,-1);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $result = curl_exec($ch);
        $data = str_replace("\&quot;",'"',$result );
        $data = json_decode($data,true);
        print_r($data);die();
        foreach ($data as $k => $v){

        }
    }

    public function actionExcel()
    {
        ini_set('max_execution_time',0);
        $data = \moonland\phpexcel\Excel::import("G:\work\kuaidi100.xlsx", [
            'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
            'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
            'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);

        $model = new SysLogistics();
        foreach ($data as $k => $v){
            $model->name = $v['公司名称'];
            $model->code = $v['公司编码'];
            $model->insert();
        }

        //print_r($data);die();
    }

    public static function testEvent($event)
    {
        print_r($event);
    }

    public function actionAes()
    {
        $key = "a610a3285c883de2";
        $iv = "6109240608fe732b";
        $aes = new OpensslAes($key, $iv);
        $res = $aes->encrypt("nihao");
        echo $res;
    }
}