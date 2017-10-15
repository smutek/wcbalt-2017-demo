<?php

namespace App;

use Sober\Controller\Controller;

class PageSamplePage extends Controller
{
    public function foo()
    {
        $foo['title'] = 'Fruits';

        $items = [
            'Apple',
            'Orange',
            'Hamburger'
        ];

        $foo['items'] = $items;

        if (in_array('Hamburger', $items)) {
            $foo = $this->bar();
        }

        //var_dump($foo);

        return $foo;
    }

    public function bar()
    {
        $bar['title'] = 'Burgers and Dogs';

        $items = [
            'Cheeseburger',
            'Hamburger',
            'Hotdog',
            'Cheesedog'
        ];

        $bar['items'] = $items;

        return $bar;
    }

}
