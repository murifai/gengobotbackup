<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-05-06 11:19:05 --> Severity: Warning --> require_once(Dbs.php): failed to open stream: No such file or directory /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 2
ERROR - 2024-05-06 11:19:05 --> Severity: Compile Error --> require_once(): Failed opening required 'Dbs.php' (include_path='.:/opt/alt/php56/usr/share/pear:/opt/alt/php56/usr/share/php') /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 2
ERROR - 2024-05-06 11:19:08 --> Severity: Warning --> require_once(Dbs.php): failed to open stream: No such file or directory /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 2
ERROR - 2024-05-06 11:19:08 --> Severity: Compile Error --> require_once(): Failed opening required 'Dbs.php' (include_path='.:/opt/alt/php56/usr/share/pear:/opt/alt/php56/usr/share/php') /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 2
ERROR - 2024-05-06 11:20:09 --> Severity: Parsing Error --> syntax error, unexpected 'public' (T_PUBLIC) /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 4
ERROR - 2024-05-06 11:22:15 --> Severity: Parsing Error --> syntax error, unexpected 'public' (T_PUBLIC) /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 4
ERROR - 2024-05-06 11:22:51 --> Severity: Warning --> require_once(/home/gengobot/public_html/bot/application/modules/bot/controllers/../module/Dbs.php): failed to open stream: No such file or directory /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 2
ERROR - 2024-05-06 11:22:51 --> Severity: Compile Error --> require_once(): Failed opening required '/home/gengobot/public_html/bot/application/modules/bot/controllers/../module/Dbs.php' (include_path='.:/opt/alt/php56/usr/share/pear:/opt/alt/php56/usr/share/php') /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 2
ERROR - 2024-05-06 11:24:06 --> Severity: Error --> Class 'CI_Model' not found /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 4
ERROR - 2024-05-06 11:27:58 --> Severity: Error --> Class 'CI_Model' not found /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 4
ERROR - 2024-05-06 11:27:59 --> Severity: Error --> Class 'CI_Model' not found /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 4
ERROR - 2024-05-06 11:35:00 --> Severity: Error --> Class 'CI_Model' not found /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 4
ERROR - 2024-05-06 11:37:06 --> Severity: Error --> Class 'CI_Model' not found /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 4
ERROR - 2024-05-06 11:38:37 --> Severity: Error --> Class 'CI_Model' not found /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 4
ERROR - 2024-05-06 11:41:02 --> Severity: Error --> Class 'CI_Model' not found /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 4
ERROR - 2024-05-06 11:46:02 --> Severity: Error --> Class 'CI_Model' not found /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 4
ERROR - 2024-05-06 11:51:05 --> Severity: Parsing Error --> syntax error, unexpected 'public' (T_PUBLIC) /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 4
ERROR - 2024-05-06 11:51:29 --> Severity: Error --> Class 'CI_Model' not found /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 4
ERROR - 2024-05-06 11:52:41 --> Severity: Error --> Class 'CI_Model' not found /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 4
ERROR - 2024-05-06 12:04:35 --> Severity: Parsing Error --> syntax error, unexpected '?' /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 23
ERROR - 2024-05-06 12:05:42 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 12:05:43 --> Severity: Error --> Call to undefined method QuizModule::isSessionComplete() /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4493
ERROR - 2024-05-06 12:09:46 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 12:09:46 --> Severity: Error --> Call to undefined method QuizModule::isSessionComplete() /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4493
ERROR - 2024-05-06 12:11:47 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 12:12:20 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 12:12:54 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 12:12:54 --> Query error: Table 'gengobot_bot.user_quiz_state' doesn't exist - Invalid query: UPDATE `user_quiz_state` SET `current_question` = NULL, `score` = 0, `jlptlevel` = 'U4a4fd0873728bec689af0887990731dd'
WHERE `userid` = 'default_user_id'
ERROR - 2024-05-06 12:14:24 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 12:14:25 --> Query error: Unknown column 'score' in 'field list' - Invalid query: UPDATE `quiz` SET `current_question` = NULL, `score` = 0, `jlptlevel` = 'U4a4fd0873728bec689af0887990731dd'
WHERE `userid` = 'default_user_id'
ERROR - 2024-05-06 12:16:52 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 12:16:53 --> Severity: Notice --> Undefined property: stdClass::$id /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 32
ERROR - 2024-05-06 12:16:53 --> Severity: Error --> Call to private method QuizModule::generateFlexMessage() from context 'Bot' /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4479
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined property: stdClass::$id /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 32
ERROR - 2024-05-06 12:18:18 --> Severity: Warning --> Missing argument 2 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4479 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:18:18 --> Severity: Warning --> Missing argument 3 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4479 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:18:18 --> Severity: Warning --> Missing argument 4 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4479 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:18:18 --> Severity: Warning --> Missing argument 5 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4479 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:18:18 --> Severity: Warning --> Missing argument 6 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4479 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:18:18 --> Severity: Warning --> Missing argument 7 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4479 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:18:18 --> Severity: Warning --> Missing argument 8 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4479 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:18:18 --> Severity: Warning --> Missing argument 9 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4479 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:18:18 --> Severity: Warning --> Missing argument 10 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4479 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined variable: soal /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 79
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined variable: pil_a /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 80
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined variable: pil_b /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 81
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined variable: pil_c /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 82
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined variable: pil_d /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 83
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined variable: action_a /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 84
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined variable: action_b /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 85
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined variable: action_c /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 86
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Undefined variable: action_d /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 88
ERROR - 2024-05-06 12:18:18 --> Severity: Notice --> Array to string conversion /home/gengobot/public_html/bot/application/modules/bot/controllers/flex.php 1194
ERROR - 2024-05-06 12:23:54 --> Severity: Parsing Error --> syntax error, unexpected '$client' (T_VARIABLE), expecting function (T_FUNCTION) /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4507
ERROR - 2024-05-06 12:24:46 --> Severity: Parsing Error --> syntax error, unexpected '$client' (T_VARIABLE), expecting function (T_FUNCTION) /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4507
ERROR - 2024-05-06 12:25:41 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Undefined property: stdClass::$id /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 32
ERROR - 2024-05-06 12:25:42 --> Severity: Warning --> Missing argument 2 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:25:42 --> Severity: Warning --> Missing argument 3 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:25:42 --> Severity: Warning --> Missing argument 4 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:25:42 --> Severity: Warning --> Missing argument 5 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:25:42 --> Severity: Warning --> Missing argument 6 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:25:42 --> Severity: Warning --> Missing argument 7 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:25:42 --> Severity: Warning --> Missing argument 8 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:25:42 --> Severity: Warning --> Missing argument 9 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:25:42 --> Severity: Warning --> Missing argument 10 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Undefined variable: soal /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 79
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Undefined variable: pil_a /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 80
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Undefined variable: pil_b /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 81
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Undefined variable: pil_c /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 82
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Undefined variable: pil_d /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 83
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Undefined variable: action_a /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 84
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Undefined variable: action_b /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 85
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Undefined variable: action_c /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 86
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Undefined variable: action_d /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 88
ERROR - 2024-05-06 12:25:42 --> Severity: Notice --> Array to string conversion /home/gengobot/public_html/bot/application/modules/bot/controllers/flex.php 1194
ERROR - 2024-05-06 14:20:11 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 14:20:20 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined property: stdClass::$id /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 32
ERROR - 2024-05-06 22:13:07 --> Severity: Warning --> Missing argument 2 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:13:07 --> Severity: Warning --> Missing argument 3 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:13:07 --> Severity: Warning --> Missing argument 4 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:13:07 --> Severity: Warning --> Missing argument 5 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:13:07 --> Severity: Warning --> Missing argument 6 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:13:07 --> Severity: Warning --> Missing argument 7 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:13:07 --> Severity: Warning --> Missing argument 8 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:13:07 --> Severity: Warning --> Missing argument 9 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:13:07 --> Severity: Warning --> Missing argument 10 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined variable: soal /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 79
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined variable: pil_a /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 80
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined variable: pil_b /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 81
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined variable: pil_c /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 82
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined variable: pil_d /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 83
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined variable: action_a /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 84
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined variable: action_b /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 85
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined variable: action_c /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 86
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Undefined variable: action_d /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 88
ERROR - 2024-05-06 22:13:07 --> Severity: Notice --> Array to string conversion /home/gengobot/public_html/bot/application/modules/bot/controllers/flex.php 1194
INFO - 2024-05-06 22:20:10 --> Config Class Initialized
INFO - 2024-05-06 22:20:10 --> Hooks Class Initialized
DEBUG - 2024-05-06 22:20:10 --> UTF-8 Support Enabled
INFO - 2024-05-06 22:20:10 --> Utf8 Class Initialized
INFO - 2024-05-06 22:20:10 --> URI Class Initialized
INFO - 2024-05-06 22:20:10 --> Router Class Initialized
INFO - 2024-05-06 22:20:10 --> Output Class Initialized
INFO - 2024-05-06 22:20:10 --> Security Class Initialized
DEBUG - 2024-05-06 22:20:10 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-05-06 22:20:10 --> Input Class Initialized
INFO - 2024-05-06 22:20:10 --> Language Class Initialized
INFO - 2024-05-06 22:20:10 --> Language Class Initialized
INFO - 2024-05-06 22:20:10 --> Config Class Initialized
INFO - 2024-05-06 22:20:10 --> Loader Class Initialized
INFO - 2024-05-06 22:20:10 --> Helper loaded: url_helper
INFO - 2024-05-06 22:20:10 --> Helper loaded: form_helper
INFO - 2024-05-06 22:20:10 --> Database Driver Class Initialized
DEBUG - 2024-05-06 22:20:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-05-06 22:20:10 --> Session: Class initialized using 'files' driver.
INFO - 2024-05-06 22:20:10 --> Model Class Initialized
DEBUG - 2024-05-06 22:20:10 --> File loaded: /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php
INFO - 2024-05-06 22:20:10 --> Model Class Initialized
INFO - 2024-05-06 22:20:10 --> Controller Class Initialized
DEBUG - 2024-05-06 22:20:10 --> Bot MX_Controller Initialized
DEBUG - 2024-05-06 22:20:10 --> File loaded: /home/gengobot/public_html/bot/application/controllers/../modules/template/controllers/Template.php
DEBUG - 2024-05-06 22:20:10 --> Template MX_Controller Initialized
INFO - 2024-05-06 22:20:10 --> Model Class Initialized
DEBUG - 2024-05-06 22:20:10 --> Flex MX_Controller Initialized
DEBUG - 2024-05-06 22:20:10 --> Register MX_Controller Initialized
INFO - 2024-05-06 22:20:10 --> Model Class Initialized
DEBUG - 2024-05-06 22:20:10 --> Flex MX_Controller Initialized
ERROR - 2024-05-06 22:20:10 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Undefined property: stdClass::$id /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 32
ERROR - 2024-05-06 22:20:11 --> Severity: Warning --> Missing argument 2 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:20:11 --> Severity: Warning --> Missing argument 3 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:20:11 --> Severity: Warning --> Missing argument 4 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:20:11 --> Severity: Warning --> Missing argument 5 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:20:11 --> Severity: Warning --> Missing argument 6 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:20:11 --> Severity: Warning --> Missing argument 7 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:20:11 --> Severity: Warning --> Missing argument 8 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:20:11 --> Severity: Warning --> Missing argument 9 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:20:11 --> Severity: Warning --> Missing argument 10 for QuizModule::generateFlexMessage(), called in /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php on line 4480 and defined /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 76
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Undefined variable: soal /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 79
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Undefined variable: pil_a /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 80
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Undefined variable: pil_b /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 81
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Undefined variable: pil_c /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 82
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Undefined variable: pil_d /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 83
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Undefined variable: action_a /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 84
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Undefined variable: action_b /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 85
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Undefined variable: action_c /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 86
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Undefined variable: action_d /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 88
ERROR - 2024-05-06 22:20:11 --> Severity: Notice --> Array to string conversion /home/gengobot/public_html/bot/application/modules/bot/controllers/flex.php 1194
INFO - 2024-05-06 22:20:12 --> Final output sent to browser
DEBUG - 2024-05-06 22:20:12 --> Total execution time: 1.2785
ERROR - 2024-05-06 22:29:00 --> Severity: Parsing Error --> syntax error, unexpected 'elseif' (T_ELSEIF) /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4485
ERROR - 2024-05-06 22:31:20 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4509
ERROR - 2024-05-06 22:34:51 --> Severity: Parsing Error --> syntax error, unexpected 'private' (T_PRIVATE) /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4504
ERROR - 2024-05-06 22:35:21 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4507
ERROR - 2024-05-06 22:36:43 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4507
ERROR - 2024-05-06 22:37:54 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 22:49:23 --> Severity: Compile Error --> Cannot redeclare QuizModule::getTableForLevel() /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 57
ERROR - 2024-05-06 22:50:36 --> Severity: Compile Error --> Cannot redeclare QuizModule::logDebug() /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 94
ERROR - 2024-05-06 22:51:17 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 22:51:18 --> Severity: Error --> Call to undefined method Dbs::logDebug() /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 233
ERROR - 2024-05-06 22:52:39 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 22:52:40 --> Severity: Error --> Call to undefined method Dbs::logDebug() /home/gengobot/public_html/bot/application/modules/bot/models/Dbs.php 233
ERROR - 2024-05-06 23:00:13 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:00:14 --> Severity: Error --> Call to undefined method Dbs::getRandomQuestionByTableName() /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 29
ERROR - 2024-05-06 23:01:42 --> Severity: Error --> Class 'Dbs' not found /home/gengobot/public_html/bot/application/third_party/MX/Loader.php 228
ERROR - 2024-05-06 23:03:30 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:11:29 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:11:30 --> Severity: Warning --> preg_match(): No ending delimiter '/' found /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4475
ERROR - 2024-05-06 23:11:30 --> Severity: Notice --> Undefined property: QuizModule::$totalQuestions /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 86
ERROR - 2024-05-06 23:11:30 --> Severity: Notice --> Undefined property: QuizModule::$quiz_score /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 80
ERROR - 2024-05-06 23:11:30 --> Severity: Notice --> Undefined property: QuizModule::$quiz_score /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 81
ERROR - 2024-05-06 23:11:42 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:11:50 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:12:07 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:12:07 --> Severity: Warning --> preg_match(): No ending delimiter '/' found /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4475
ERROR - 2024-05-06 23:12:07 --> Severity: Notice --> Undefined property: QuizModule::$totalQuestions /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 86
ERROR - 2024-05-06 23:12:07 --> Severity: Notice --> Undefined property: QuizModule::$quiz_score /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 80
ERROR - 2024-05-06 23:12:07 --> Severity: Notice --> Undefined property: QuizModule::$quiz_score /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 81
ERROR - 2024-05-06 23:13:40 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 4507
ERROR - 2024-05-06 23:13:51 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:19:24 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:19:24 --> No questions found or error in retrieving data from: soaln3
ERROR - 2024-05-06 23:19:24 --> No questions available for level: N3
ERROR - 2024-05-06 23:21:53 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:21:54 --> Severity: Notice --> Undefined property: QuizModule::$totalQuestions /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 79
ERROR - 2024-05-06 23:21:54 --> Severity: Notice --> Undefined property: QuizModule::$quiz_score /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 73
ERROR - 2024-05-06 23:21:54 --> Severity: Notice --> Undefined property: QuizModule::$quiz_score /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 74
ERROR - 2024-05-06 23:22:19 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:22:20 --> Severity: Notice --> Undefined property: QuizModule::$totalQuestions /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 79
ERROR - 2024-05-06 23:22:20 --> Severity: Notice --> Undefined property: QuizModule::$quiz_score /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 73
ERROR - 2024-05-06 23:22:20 --> Severity: Notice --> Undefined property: QuizModule::$quiz_score /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 74
ERROR - 2024-05-06 23:22:51 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:22:52 --> No questions found or error in retrieving data from: soaln3
ERROR - 2024-05-06 23:22:52 --> No questions available for level: N3
ERROR - 2024-05-06 23:31:15 --> Severity: Warning --> mysqli::real_connect(): (HY000/1040): Too many connections /home/gengobot/public_html/bot/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2024-05-06 23:31:15 --> Unable to connect to the database
ERROR - 2024-05-06 23:31:43 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:31:45 --> No questions found or error in retrieving data from: soaln3
ERROR - 2024-05-06 23:31:45 --> No questions available for level: N3
ERROR - 2024-05-06 23:34:25 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:34:26 --> No questions found or error in retrieving data from: soaln3
ERROR - 2024-05-06 23:34:26 --> No questions available for level: N3
ERROR - 2024-05-06 23:36:47 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:36:47 --> No questions found or error in retrieving data from: soaln3
ERROR - 2024-05-06 23:36:47 --> No questions available for level: N3
ERROR - 2024-05-06 23:45:56 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:45:56 --> No questions available for level: N3
ERROR - 2024-05-06 23:47:13 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:47:14 --> No questions found or error in retrieving data from: soaln4
ERROR - 2024-05-06 23:47:14 --> No questions available for level: N4
ERROR - 2024-05-06 23:47:17 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:47:18 --> No questions found or error in retrieving data from: soaln5
ERROR - 2024-05-06 23:47:18 --> No questions available for level: N5
ERROR - 2024-05-06 23:48:00 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:48:00 --> Severity: Notice --> Undefined property: QuizModule::$totalQuestions /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 79
ERROR - 2024-05-06 23:48:00 --> Severity: Notice --> Undefined property: QuizModule::$quiz_score /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 73
ERROR - 2024-05-06 23:48:00 --> Severity: Notice --> Undefined property: QuizModule::$quiz_score /home/gengobot/public_html/bot/application/modules/bot/controllers/quiz.php 74
ERROR - 2024-05-06 23:48:19 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:48:51 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:49:14 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:49:17 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
ERROR - 2024-05-06 23:49:23 --> Severity: Notice --> Undefined index: groupId /home/gengobot/public_html/bot/application/modules/bot/controllers/Bot.php 38
