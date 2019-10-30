<?php


// add button to text editor
function shortcode_button_script()
{
    if(wp_script_is("quicktags"))
    {
        ?>
            <script type="text/javascript">

                //this function is used to retrieve the selected text from the text editor
                function getSel()
                {
                    var txtarea = document.getElementById("content");
                    var start = txtarea.selectionStart;
                    var finish = txtarea.selectionEnd;
                    return txtarea.value.substring(start, finish);
                }

                QTags.addButton(
                    "code_shortcode",
                    "Vimeo",
                    callback
                );

                function callback()
                {
                    var selected_text = getSel();
                    QTags.insertContent("[vimeocode]" +  selected_text + "[/vimeocode]");
                }
            </script>
        <?php
    }
}

add_action("admin_print_footer_scripts", "shortcode_button_script");

// create shortcode
function plott_vimeo_shortcode( $atts, $content = null ) {
	return '<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/' . $content . '?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>';


}
add_shortcode( 'vimeocode', 'plott_vimeo_shortcode' );

// --------------------------------------------------------------------

// add button to text editor
function shortcode_yt_button_script()
{
    if(wp_script_is("quicktags"))
    {
        ?>
            <script type="text/javascript">

                //this function is used to retrieve the selected text from the text editor
                function getSel()
                {
                    var txtarea = document.getElementById("content");
                    var start = txtarea.selectionStart;
                    var finish = txtarea.selectionEnd;
                    return txtarea.value.substring(start, finish);
                }

                QTags.addButton(
                    "code_shortcode_toob",
                    "YouTube",
                    callback
                );

                function callback()
                {
                    var selected_text = getSel();
                    QTags.insertContent("[youtubecode]" +  selected_text + "[/youtubecode]");
                }
            </script>
        <?php
    }
}

add_action("admin_print_footer_scripts", "shortcode_yt_button_script");

// create shortcode
function plott_youtube_shortcode( $atts, $content = null ) {
	return '  <div class="embed-container" style="background-color:black;padding:56.25% 0 0 0"><iframe width="560" height="315" src="//www.youtube-nocookie.com/embed/' . $content . '?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>';


}
add_shortcode( 'youtubecode', 'plott_youtube_shortcode' );

 ?>
