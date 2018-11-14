<?php 
    class View 
    {
        function generate($content_view, $template_view = null, $data = null)
        {
            if (is_array($data)) 
            {
                extract($data);
            }

            if (is_null($template_view))
                include 'application/views/'.$content_view;
            else
                include 'application/views/'.$template_view;
        }
    }