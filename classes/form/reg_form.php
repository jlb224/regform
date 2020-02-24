<?php

namespace local_regform\form;

use moodleform;

class reg_form extends moodleform
{

    public function definition()
    {
        global $CFG;

        $mform = $this->_form;

        $agreement = '<p><strong>' . get_string('agreement', 'local_regform') . '</strong></p>';
        $agreementtext = '<p>' . get_string('agreementtext', 'local_regform') . '</p>';
        $character = '<p><strong>' . get_string('character', 'local_regform') . '</strong></p>';
        $contactnumbers = '<p><strong>' . get_string('contactnumbers', 'local_regform') . '</strong>' . get_string('contactnumbers_instructions', 'local_regform') . '</p>';
        $current = '<p><strong>' . get_string('current', 'local_regform') . '</strong></p>';
        $employment = '<p><strong>' . get_string('employment', 'local_regform') . '</strong><small>' . get_string('ifapplicable', 'local_regform') . '</small></p>';
        $feespaid = '<p><strong>' . get_string('feespaid', 'local_regform') . '</strong></p>';
        $howdidyouhear = '<p><strong>' . get_string('howdidyouhear', 'local_regform') . '</strong></p>';
        $instructions = '<p><strong>' . get_string('instructions', 'local_regform') . '</strong>' . get_string('paymentaddress', 'local_regform') . '</p>';
        $otherprevqualtext = '<p>' . get_string('otherprevqualtext', 'local_regform') . '</p>';
        $othertitle = get_string('othertitle', 'local_regform') . '<small>' . get_string('specify', 'local_regform') . '</small>';
        $personaldetails = '<p><strong>' . get_string('personaldetails_label', 'local_regform') . '</strong>' . get_string('personaldetails_instructions', 'local_regform') . '</p>';
        $previousstudy = '<p><strong>' . get_string('previousstudy', 'local_regform') . '</strong></p>';
        $previousstudytext = '<p>' . get_string('previousstudytext', 'local_regform') . '</p>';
        $title = get_string('title', 'local_regform') . '<small>' . get_string('specify', 'local_regform') . '</small>';
        $universitydetails = '<p><strong>' . get_string('universitydetails', 'local_regform') . '</strong></p>';
        $universitytext = '<p>' . get_string('universitytext', 'local_regform') . '</p>';
        $whatnext = '<p><strong>' . get_string('whatnext', 'local_regform') . '</strong></p>';
        $whatnexttext = '<p>' . get_string('whatnext1', 'local_regform') . '</p>' . '<p>' . get_string('whatnext2', 'local_regform') . '</p>';
        $yourinfo = '<p><strong>' . get_string('yourinfo', 'local_regform') . '</strong></p>';
        $yourinfotext = '<p>' . get_string('yourinfo1', 'local_regform') . '</p>' . '<p>' . get_string('yourinfo2', 'local_regform') . '</p>' . '<p>' . get_string('yourinfo3', 'local_regform') . '</p>';

        // Instructions.
        $mform->addElement('html', $instructions);

        // Personal details. 
        $mform->addElement('html', $personaldetails);
        $mform->addElement('text', 'title', $title);
        $mform->setType('title', PARAM_NOTAGS);

        $mform->addElement('text', 'othertitle', $othertitle);
        $mform->setType('othertitle', PARAM_NOTAGS);

        $mform->addElement('text', 'surname', get_string('surname', 'local_regform'));
        $mform->setType('surname', PARAM_NOTAGS);

        $mform->addElement('text', 'firstname', get_string('firstname', 'local_regform'));
        $mform->setType('firstname', PARAM_NOTAGS);

        $mform->addElement('date_selector', 'dob', get_string('dob', 'local_regform'));

        $mform->addElement('text', 'email', get_string('email', 'local_regform'));
        $mform->setType('email', PARAM_NOTAGS);
        $mform->addRule('email', null, 'email', null, 'client');

        $mform->addElement('textarea', 'homeaddress', get_string('homeaddress', 'local_regform'));
        $mform->setType('homeaddress', PARAM_NOTAGS);

        $mform->addElement('text', 'postcode', get_string('postcode', 'local_regform'));
        $mform->setType('postcode', PARAM_NOTAGS);

        $mform->addElement('text', 'country', get_string('country', 'local_regform'));
        $mform->setType('country', PARAM_NOTAGS);

        // Contact telephone numbers. 
        $mform->addElement('html', $contactnumbers);
        $mform->addElement('text', 'contactpreferred', get_string('contactpreferred', 'local_regform'));
        $mform->setType('contactpreferred', PARAM_NOTAGS);

        $mform->addElement('text', 'contactalternative', get_string('contactalternative', 'local_regform'));
        $mform->setType('contactalternative', PARAM_NOTAGS);

        // Employment details.
        $mform->addElement('html', $employment);
        $mform->addElement('text', 'jobtitle', get_string('jobtitle', 'local_regform'));
        $mform->setType('jobtitle', PARAM_NOTAGS);

        $mform->addElement('text', 'employername', get_string('employername', 'local_regform'));
        $mform->setType('employername', PARAM_NOTAGS);

        $mform->addElement('textarea', 'employeraddress', get_string('employeraddress', 'local_regform'));
        $mform->setType('employeraddress', PARAM_NOTAGS);

        $mform->addElement('text', 'employerpostcode', get_string('postcode', 'local_regform'));
        $mform->setType('employerpostcode', PARAM_NOTAGS);

        $mform->addElement('text', 'employercountry', get_string('country', 'local_regform'));
        $mform->setType('employercountry', PARAM_NOTAGS);

        $whichaddress = [];
        $whichaddress[] = &$mform->createElement('radio', 'whichaddress', '',  get_string('whichaddresshome', 'local_regform'), 1);
        $whichaddress[] = &$mform->createElement('radio', 'whichaddress', '', get_string('whichaddressbusiness', 'local_regform'), 0);
        $mform->addGroup($whichaddress, 'whichaddress', get_string('whichaddress', 'local_regform'));

        // University details.
        $mform->addElement('html', $universitydetails);
        $mform->addElement('html', $universitytext);
        $mform->addElement('text', 'universityname', get_string('universityname', 'local_regform'));
        $mform->setType('universityname', PARAM_NOTAGS);

        $mform->addElement('text', 'coursetitle', get_string('coursetitle', 'local_regform'));
        $mform->setType('coursetitle', PARAM_NOTAGS);

        $studyhours = [];
        $studyhours[] = &$mform->createElement('radio', 'studyhours', '', get_string('studyhoursfull', 'local_regform'), 1);
        $studyhours[] = &$mform->createElement('radio', 'studyhours', '', get_string('studyhourspart', 'local_regform'), 0);
        $mform->addGroup($studyhours, 'studyhours', get_string('studyhours', 'local_regform'));

        $mform->addElement('date_selector', 'universityregdate', get_string('universityregdate', 'local_regform'));

        // Previous study and qualifications.
        $mform->addElement('html', $previousstudy);
        $mform->addElement('html', $previousstudytext);
        $mform->addElement('advcheckbox', 'noformalqual', get_string('prevnoformalqual', 'local_regform'));
        $mform->addElement('advcheckbox', 'gcse', get_string('prevgcse', 'local_regform'));
        $mform->addElement('advcheckbox', 'alevel', get_string('prevalevel', 'local_regform'));
        $mform->addElement('advcheckbox', 'belowdegree', get_string('prevbelowdegree', 'local_regform'));
        $mform->addElement('advcheckbox', 'degree', get_string('prevdegree', 'local_regform'));
        $mform->addElement('advcheckbox', 'postgrad', get_string('prevpostgrad', 'local_regform'));

        $mform->addElement('html', $otherprevqualtext);
        $mform->addElement('advcheckbox', 'vocicsacert', get_string('vocicsacert', 'local_regform'));
        $mform->addElement('advcheckbox', 'vocicsadip', get_string('vocicsadip', 'local_regform'));
        $mform->addElement('advcheckbox', 'vocother', get_string('vocother', 'local_regform'));
        $mform->addElement('advcheckbox', 'vocprofbody', get_string('vocprofbody', 'local_regform'));

        // How did you hear?
        $mform->addElement('html', $howdidyouhear);
        $howhearoptions = [];
        $howhearoptions[] = &$mform->createElement('advcheckbox', 'howhearmyuniversity', get_string('howhearmyuniversity', 'local_regform'));
        $howhearoptions[] = &$mform->createElement('advcheckbox', 'howhearICSAwebsite', get_string('howhearICSAwebsite', 'local_regform'));
        $howhearoptions[] = &$mform->createElement('advcheckbox', 'howhearpress', get_string('howhearpress', 'local_regform'));
        $howhearoptions[] = &$mform->createElement('advcheckbox', 'howhearfair', get_string('howhearfair', 'local_regform'));
        $howhearoptions[] = &$mform->createElement('advcheckbox', 'howhearworkplace', get_string('howhearworkplace', 'local_regform'));
        $howhearoptions[] = &$mform->createElement('advcheckbox', 'howhearalumni', get_string('howhearalumni', 'local_regform'));
        $howhearoptions[] = &$mform->createElement('advcheckbox', 'howhearlegal', get_string('howhearlegal', 'local_regform'));
        $howhearoptions[] = &$mform->createElement('advcheckbox', 'howhearcareers', get_string('howhearcareers', 'local_regform'));
        $howhearoptions[] = &$mform->createElement('advcheckbox', 'howhearfriend', get_string('howhearfriend', 'local_regform'));
        $howhearoptions[] = &$mform->createElement('advcheckbox', 'howhearother', get_string('howhearother', 'local_regform'));
        $mform->addGroup($howhearoptions, 'howhearoptions', '');

        // Current situation.
        $mform->addElement('html', $current);
        $currentoptions = [];
        $currentoptions[] = &$mform->createElement('advcheckbox', 'currentpostgrad', get_string('currentpostgrad', 'local_regform'));
        $currentoptions[] = &$mform->createElement('advcheckbox', 'currentjobseeker', get_string('currentjobseeker', 'local_regform'));
        $currentoptions[] = &$mform->createElement('advcheckbox', 'currentcorporate', get_string('currentcorporate', 'local_regform'));
        $currentoptions[] = &$mform->createElement('advcheckbox', 'currentlaw', get_string('currentlaw', 'local_regform'));
        $currentoptions[] = &$mform->createElement('advcheckbox', 'currentaccountancy', get_string('currentaccountancy', 'local_regform'));
        $currentoptions[] = &$mform->createElement('advcheckbox', 'currentotherfield', get_string('currentotherfield', 'local_regform'));
        $currentoptions[] = &$mform->createElement('advcheckbox', 'currentother', get_string('currentother', 'local_regform'));
        $mform->addGroup($currentoptions, 'currentoptions', '');

        // Fees paid by.
        $mform->addElement('html', $feespaid);
        $feespaidoptions = [];
        $feespaidoptions[] = &$mform->createElement('radio', 'feespaid', '', get_string('selffunded', 'local_regform'));
        $feespaidoptions[] = &$mform->createElement('radio', 'feespaid', '', get_string('empfunded', 'local_regform'));
        $mform->addGroup($feespaidoptions, 'feespaid', '');

        // Character and standing.
        $mform->addElement('html', $character);
        $mform->addElement('selectyesno', 'character1yesno', get_string('character1', 'local_regform'));
        $mform->addElement('selectyesno', 'character2yesno', get_string('character2', 'local_regform'));
        $mform->addElement('selectyesno', 'character3yesno', get_string('character3', 'local_regform'));

        // Your information.
        $mform->addElement('html', $yourinfo);
        $mform->addElement('html', $yourinfotext);
        $mform->addElement('advcheckbox', 'emailupdates', get_string('emailupdates', 'local_regform'));

        // Agreement.
        $mform->addElement('html', $agreement);
        $mform->addElement('advcheckbox', 'agreement1', get_string('agreement1', 'local_regform'));
        $mform->addElement('advcheckbox', 'agreement2', get_string('agreement2', 'local_regform'));
        $mform->addElement('advcheckbox', 'agreement3', get_string('agreement3', 'local_regform'));
        $mform->addElement('html', $agreementtext);
        $mform->addElement('radio', 'agreementpay', '', get_string('agreementpay1', 'local_regform'), 1);
        $mform->addElement('radio', 'agreementpay', '', get_string('agreementpay2', 'local_regform'), 0);

        // What next?
        $mform->addElement('html', $whatnext);
        $mform->addElement('html', $whatnexttext);

        // Action buttons.
        $this->add_action_buttons();
    }
}
