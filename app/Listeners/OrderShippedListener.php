<?php

namespace App\Listeners;

use App\Events\OrderShippedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class OrderShippedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //你的事件监听器也可以在构造函数中加入任何依赖关系的类型提示。
        //所有的事件监听器都是通过 Laravel 的 服务容器 来解析的，因此所有的依赖都将会被自动注入。
    }

    /**
     * Handle the event.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(OrderShippedEvent $event)
    {
        /********************************************
         *
         * 1.当你分发事件之后，这里你可以实现你想做的事情 ...
         * 2.如果一个事件有多个监听器，这里返回false则不会再被其他的监听器获取
         */
        LOG::info($event->order);
        //return false;
    }
}
