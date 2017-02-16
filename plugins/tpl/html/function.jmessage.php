<?php
/**
* @package     jelix
* @subpackage  jtpl_plugin
* @author      Loic Mathaud
* @copyright   2008 Loic Mathaud
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/

/**
* function plugin :  Display messages from jMessage
*/

function jtpl_function_html_jmessage($tpl, $type = '') {
    // Get messages
    if ($type == '') {
        $messages = jMessage::getAll();
    } else {
        $messages = jMessage::get($type);
    }
    // Not messages, quit
    if (!$messages) {
        return;
    }

    // Display messages
    if ($type == '') {
        echo '<div class="alert alert-info" role="alert">';
        echo '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
        foreach ($messages as $type_msg => $all_msg) {
            foreach ($all_msg as $msg) {
                echo '<p class="text-center">'.htmlspecialchars($msg).'</p>';
            }
        }
        echo '</div>';
    } else {
        echo '<div class="alert alert-'.$type.'" role="alert">';
        echo '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
        foreach ($messages as $msg) {
            echo '<p class="text-center">'.htmlspecialchars($msg).'</p>';
        }
        echo '</div>';
    }

    if ($type == '') {
        jMessage::clearAll();
    } else {
        jMessage::clear($type);
    }
    
}
