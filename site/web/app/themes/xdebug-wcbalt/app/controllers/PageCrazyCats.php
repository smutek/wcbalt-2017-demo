<?php

namespace App;

use Sober\Controller\Controller;

/**
 * Class PageCrazyCats
 * @package App
 */
class PageCrazyCats extends Controller
{

    /**
     * @return array
     */
    function catGroups()
    {

        $cat_groups = [];
        $i          = 0;

        if (have_rows('cat_group')):
            $cat_group = [];
            while (have_rows('cat_group')): the_row();

                $cat_group['title']  = get_sub_field('group_title');
                $cat_group['id']     = get_sub_field('group_id');
                $cat_group['images'] = get_sub_field('gallery');

                $i === 0 ? $cat_group['state'] = 'active' : $cat_group['state'] = 'hidden';
                $i++;
            $cat_groups[] = $cat_group;

            endwhile;
        endif;

        return $cat_groups;
    }

}
