<?php

/**
 * For help with forms see https://docs.moodle.org/dev/Form_API
 * 
 * @package     local_regform
 * @copyright   2020 Jo Beaver <myemail@example.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use local_regform\form\reg_form;

require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir . '/formslib.php');
require_once('classes/form/reg_form.php');

// Page settings.
$PAGE->set_context(context_system::instance());
$PAGE->set_url(new moodle_url('/local/regform/reg_form.php'));
$PAGE->set_title(get_string('pluginname', 'local_regform'));
$PAGE->set_heading(get_string('pluginname', 'local_regform'));
$PAGE->set_pagelayout('standard');

$mform = new reg_form();

// If cancelled redirect to ...
if ($mform->is_cancelled()) {
    // unset($_POST);
    redirect(new moodle_url('/local/regform/reg_cancelled.php'));
    // return;
} else if (($data = $mform->get_data())) {
    // $DB->update_record();
    redirect(new moodle_url('/local/regform/reg_success.php'));
} else {
    // Do something;
}

// Display the page.
echo $OUTPUT->header();
echo $OUTPUT->notification("Welcome to the registration form!", 'notifysuccess');
echo $mform->render();
echo $OUTPUT->footer();




