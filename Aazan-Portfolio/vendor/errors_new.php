<?php
    class Errors
    {
        public function setError($error, $aMsg)
        {
            $_SESSION[$error] = $aMsg;
        }

        public function showError($error)
        {
            $aMsg = $_SESSION[$error];
            $alertColor = ($aMsg[0] == 0) ? 'red' : 'blue';
            $icon = ($aMsg[0] == 0) ? 'fa-exclamation-triangle' : 'fa-thumbs-up';

            $alert = '<div class="p-4 mb-4 text-sm text-'.$alertColor.'-800 rounded-lg bg-'.$alertColor.'-200 dark:bg-gray-800 dark:text-'.$alertColor.'-400" role="alert">
                <i class="fa '.$icon.' text-xl"></i> &nbsp <span class="font-medium">'.$aMsg[1].'</span>
            </div>';

            print($alert);
        }

        public function destroyError($error)
        {
            unset($_SESSION[$error]);
        }
    }
?>