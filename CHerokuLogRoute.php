<?php
/*

This route depends on having the following two lines
in your modified boot.sh:

touch /app/apache/logs/app_log
tail -F /app/apache/logs/app_log &

*/
class CHerokuLogRoute extends CLogRoute
{
    public function processLogs($logs)
    {
        $STDOUT = fopen("/app/apache/logs/app_log", "a");
        foreach($logs as $log) 
        	fwrite($STDOUT, $log[0]); //write the message [1] = level, [2]=category
        fclose($STDOUT);
    }
}