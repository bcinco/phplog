<?php
define('LOG_DIR', 'logs/');
define('LOG_FILE' , '<NAME>.<LEVEL>.<DATE>.log');

class Log
{
    // --- INFO : Interesting notices, such as application bootup
    public static function i($msg, $name='default')
    {
        self::log('info', $msg, $name);
    }

    // --- ERROR : Runtime errors
    public static function e($msg, $name='default')
    {
        self::log('error', $msg, $name);
    }
    
    // --- DEBUG : Used for tracing
    public static function d($msg, $name='default')
    {
        self::log('debug', $msg, $name);
    }
    
    private static function log($level='info', $msg, $name)
    {
        // --- construct log message
        $date       = date('Y-m-d H:i:s');
        $logger_msg = "[$date] :: ";
        if (is_array($msg) || is_object($msg))
        {
            $logger_msg .= json_encode($msg)."\n";
        }
        else
        {
            $logger_msg .= $msg."\n";
        }
        
        // --- create log file handler
        $log_file = LOG_DIR.str_replace(array('<NAME>', '<DATE>', '<LEVEL>'), array($name, date('Ymd'), $level), LOG_FILE);
        $new_flag = !(file_exists($log_file));
        $fh       = fopen($log_file, 'a');
        if (!$fh)
        {
            echo "Permission denied writing to $log_file";
            exit;
        }
        
        // -- write to file and close handler
        fwrite($fh, $logger_msg);
        fclose($fh);
        if($new_flag)
        {
            chmod($log_file, 0777);
        }
    }
    private function __construct()
    {
    }
}
?>
