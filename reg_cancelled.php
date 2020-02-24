<?php

/**
 * For help with forms see https://docs.moodle.org/dev/Form_API
 * 
 * @package     local_regform
 * @copyright   2020 Jo Beaver <myemail@example.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');

// Page settings.
$PAGE->set_context(context_system::instance());
$PAGE->set_url(new moodle_url('/local/regform/reg_cancelled.php'));
$PAGE->set_title(get_string('pluginname', 'local_regform'));
$PAGE->set_heading(get_string('pluginname', 'local_regform'));
$PAGE->set_pagelayout('admin');

// Display the page.
echo $OUTPUT->header();
echo $OUTPUT->notification("Your submission has been cancelled", 'notifydanger');
echo $OUTPUT->footer();
