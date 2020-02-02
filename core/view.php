<?php


namespace app\core;

/*
 * Abstract view class
 */

abstract class View
{
    /*
     * Generate page function
     * $template_view - general template
     * $content_view - layout
     */
    function generate($content_view, $template_view, $data = null)
    {

        include 'views/' . $template_view;
    }

}