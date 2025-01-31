<?php
    namespace App\Controller\CircularReferenceHandlers;

    interface CircularReferenceHandler {
        public static function getContext(): array;
    }
?>
