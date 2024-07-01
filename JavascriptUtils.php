<?php

    class JavascriptUtils{

        public static function alert($message){
            echo "<script>alert('$message');</script>";
            
        }

        public static function consoleLog($message){
            echo "<script>console.log('$message');</script>";
        }
    }
