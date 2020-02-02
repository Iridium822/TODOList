<?php




/*
 * View class
 */

class View
{
    /*
     * Generate page function
     * $template_view - general template
     * $content_view - layout
     */
    static function generate($content_view, $template_view, $data = null)
    {

        include 'views/' . $template_view;

    }

}