<?php

namespace Thoughtco\Cutlery;

use Event;
use System\Classes\BaseExtension;

/**
 * Cutlery Editor Extension Information File
**/
class Extension extends BaseExtension
{
    public function boot()
    {
		Event::listen('igniter.checkout.afterSaveOrder', function($order) {
			$order->comment = lang('thoughtco.cutlery::default.order.label_comment') . (array_get(post(), 'cutlery_required', false) ? lang('thoughtco.cutlery::default.checkout.label_yes') : lang('thoughtco.cutlery::default.checkout.label_no')).($order->comment != '' ? "\r\n".$order->comment : '');
		});
    }

    public function registerComponents()
    {
        return [
            'Thoughtco\Cutlery\Components\CutleryField' => [
                'code' => 'cutleryField',
                'name' => lang('thoughtco.cutlery::default.name'),
                'description' => lang('thoughtco.cutlery::default.description'),
            ],
        ];
    }
}

?>
