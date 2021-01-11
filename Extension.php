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
			$order->comment = 'Cutlery required: '.(array_get(post(), 'cutlery_required', false) ? 'Yes' : 'No').($order->comment != '' ? "\r\n".$order->comment : '');
		});
    }
	
    public function registerComponents()
    {
        return [
            'Thoughtco\Cutlery\Components\CutleryField' => [
                'code' => 'cutleryField',
                'name' => 'Cutlery Field',
                'description' => 'Add a cutlery field to the checkout',
            ],
        ];
    }
}

?>
