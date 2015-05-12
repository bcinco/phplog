phplog
======
A simple customizable logger for PHP. Just include the file in your PHP scripts.

Default directory:  same folder

Default log file: [NAME].[LEVEL].[DATE].log

 - [NAME]: A name for the log file ('default')
 - [LEVEL]: Log level ('info', 'error', 'debug')
 - [DATE]: Format: YYYYMMDD
 - ex. "default.info.20141022.log"

How to use:
 1. Place Log.php anywhere in your script directory.
 2. Use require_once() to include the file.
    - require_once('Log.php');
 3. Call statically: i(), e(), d().
    - Log::i("Info level logger");
    - Log::e("Error!", "core_engine");
 4. Customize the variables as necessary:
    - LOG_DIR: Location of the log files (eg 'logs/');
    - LOG_FILE: Format of the log file name.
