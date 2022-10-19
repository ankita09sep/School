	 
	 
	 
	 

<?php
//============================================================+
// File name   : example_014.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 014 for TCPDF class
//               Javascript Form and user rights (only works on Adobe Acrobat)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Javascript Form and user rights (only works on Adobe Acrobat)
 * @author Nicola Asuni
 * @since 2008-03-04
 */


// Include the main TCPDF library (search for installation path).
require_once('"C:\xampp\htdocs\myweb\TCPDF-main\include"');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 014');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 014', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// IMPORTANT: disable font subsetting to allow users editing the document
$pdf->setFontSubsetting(false);

// set font
$pdf->SetFont('helvetica', '', 10, '', false);

// add a page
$pdf->AddPage();

/*
It is possible to create text fields, combo boxes, check boxes and buttons.
Fields are created at the current position and are given a name.
This name allows to manipulate them via JavaScript in order to perform some validation for instance.
*/

// set default form properties
$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));

$pdf->SetFont('helvetica', 'BI', 18);
$pdf->Cell(0, 5, 'Example of Form', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('helvetica', '', 12);

// Applied for std
$pdf->Cell(35, 5, 'Applied for Std:');
$pdf->TextField('applied', 50, 5);
$pdf->Ln(6);

// Admission No
$pdf->Cell(35, 5, 'Admission No:');
$pdf->TextField('admission', 50, 5);
$pdf->Ln(6);

// Name of Candidate
$pdf->Cell(35, 5, 'Name of Candidate:');
$pdf->TextField('name_candidate', 50, 5);
$pdf->Ln(6);

// Date of Birth
$pdf->Cell(35, 5, 'Date of Birth:');
$pdf->TextField('dob', 50, 5);
$pdf->Ln(6);

// Birth Certificate
$pdf->Cell(35, 5, 'Birth Certificate:');
$pdf->TextField('birth_no', 50, 5);
$pdf->Ln(6);

// Date of Issue
$pdf->Cell(35, 5, 'Date of issue:');
$pdf->TextField('date_issue', 50, 5);
$pdf->Ln(6);

// Religion
$pdf->Cell(35, 5, 'Religion:');
$pdf->TextField('religion', 50, 5);
$pdf->Ln(6);

// Gender
$pdf->Cell(35, 5, 'Gender:');
$pdf->ComboBox('gender', 30, 5, array(array('', '-'), array('M', 'Male'), array('F', 'Female')));
$pdf->Ln(6);

// Blood group
$pdf->Cell(35, 5, 'Blood group:');
$pdf->TextField('blood_group', 50, 5);
$pdf->Ln(6);


// Category
$pdf->Cell(35, 5, 'Category:');
//$pdf->RadioButton('category', 5, array('readonly' => 'true'), array(), 'SC');
$pdf->RadioButton('category', 5, array(), array(), 'SC');
$pdf->Cell(35, 5, 'Sc');
$pdf->Ln(6);
$pdf->Cell(35, 5, '');
$pdf->RadioButton('category', 5, array(), array(), 'ST', true);
$pdf->Cell(35, 5, 'ST');
$pdf->Ln(6);
$pdf->Cell(35, 5, '');
$pdf->RadioButton('category', 5, array(), array(), 'OBC');
$pdf->Cell(35, 5, 'OBC');
$pdf->Ln(6);
$pdf->Cell(35, 5, '');
$pdf->RadioButton('category', 5, array(), array(), 'GENERAL');
$pdf->Cell(35, 5, 'GENERAL');
$pdf->Ln(6);
$pdf->Cell(35, 5, '');
$pdf->RadioButton('category', 5, array(), array(), 'EWS');
$pdf->Cell(35, 5, 'EWS');
$pdf->Ln(6);
$pdf->Cell(35, 5, '');
$pdf->RadioButton('category', 5, array(), array(), 'MINORITY');
$pdf->Cell(35, 5, 'MINORITY');
$pdf->Ln(10);

// Name of the last school Attended(if any)
$pdf->Cell(35, 5, 'Name of the last school Attended(if any):');
$pdf->TextField('last_school', 50, 5);
$pdf->Ln(6);

// Class
$pdf->Cell(35, 5, 'Class:');
$pdf->TextField('class', 50, 5);
$pdf->Ln(6);

// TC no
$pdf->Cell(35, 5, 'TC no:');
$pdf->TextField('tc_no', 50, 5);
$pdf->Ln(6);

// Date 
$pdf->Cell(35, 5, 'Date:');
$pdf->TextField('date', 30, 5, array(), array('v'=>date('Y-m-d'), 'dv'=>date('Y-m-d')));
$pdf->Ln(10);

// Father's Name
$pdf->Cell(35, 5, 'Father Name:');
$pdf->TextField('father_name', 50, 5);
$pdf->Ln(6);

// Father's Qualification
$pdf->Cell(35, 5, 'Father Qualification:');
$pdf->TextField('father_qualification', 50, 5);
$pdf->Ln(6);

// Father's Occupation
$pdf->Cell(35, 5, 'Father Occupation:');
$pdf->TextField('father_occupation', 50, 5);
$pdf->Ln(6);

// Office Name Address
$pdf->Cell(35, 5, 'Office Name Address:');
$pdf->TextField('office    _no', 50, 5);
$pdf->Ln(6);

// UID NO
$pdf->Cell(35, 5, 'UID no:');
$pdf->TextField('uid_no', 50, 5);
$pdf->Ln(6);

// Mother's Name
$pdf->Cell(35, 5, 'Mother Name:');
$pdf->TextField('mother_name', 50, 5);
$pdf->Ln(6);

// Mother's Qualification
$pdf->Cell(35, 5, 'Mother Qualification:');
$pdf->TextField('mother_qualification', 50, 5);
$pdf->Ln(6);

// Mother's Occupation
$pdf->Cell(35, 5, 'mother Occupation:');
$pdf->TextField('mother_occupation', 50, 5);
$pdf->Ln(6);

// Office Name Address
$pdf->Cell(35, 5, 'Office Name Address:');
$pdf->TextField('office_no2', 50, 5);
$pdf->Ln(6);

// UID NO
$pdf->Cell(35, 5, 'UID no:');
$pdf->TextField('uid_no1', 50, 5);
$pdf->Ln(6);

// Total Annual Income of parents
$pdf->Cell(35, 5, 'Total Annual Income of parents:');
$pdf->TextField('Annual_income', 50, 5);
$pdf->Ln(6);

// Received with thanks from
$pdf->Cell(35, 5, 'Received with thanks from:');
$pdf->TextField('received', 50, 5);
$pdf->Ln(6);

// Local Address
$pdf->Cell(35, 5, 'Local:');
$pdf->TextField('local', 50, 5);
$pdf->Ln(6);

// Permanent Address
$pdf->Cell(35, 5, 'Permanent:');
$pdf->TextField('permanent', 50, 5);
$pdf->Ln(6);

// Residence No
$pdf->Cell(35, 5, 'Residence No:');
$pdf->TextField('email', 50, 5);
$pdf->Ln(6);

// Phone No
$pdf->Cell(35, 5, 'E-mail:');
$pdf->TextField('email', 50, 5);
$pdf->Ln(6);

// E-mail ID
$pdf->Cell(35, 5, 'E-mail ID:');
$pdf->TextField('email_id', 50, 5);
$pdf->Ln(6);

// Student Name
$pdf->Cell(35, 5, 'Student Name:');
$pdf->TextField('stud_name', 50, 5);
$pdf->Ln(6);

// Class
$pdf->Cell(35, 5, 'Class:');
$pdf->TextField('class', 50, 5);
$pdf->Ln(6);

// Section
$pdf->Cell(35, 5, 'Section:');
$pdf->TextField('section', 50, 5);
$pdf->Ln(6);

// ADM No
$pdf->Cell(35, 5, 'ADM no:');
$pdf->TextField('adm', 50, 5);
$pdf->Ln(6);

// Aadhar No
$pdf->Cell(35, 5, 'Aadhar No:');
$pdf->TextField('aadhar_no', 50, 5);
$pdf->Ln(6);


$pdf->SetX(50);

// Button to validate and print
$pdf->Button('print', 30, 10, 'Print', 'Print()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Reset Button
$pdf->Button('reset', 30, 10, 'Reset', array('S'=>'ResetForm'), array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Submit Button
$pdf->Button('submit', 30, 10, 'Submit', array('S'=>'SubmitForm', 'F'=>'http://localhost/printvars.php', 'Flags'=>array('ExportFormat')), array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Form validation functions
$js = <<<EOD
function CheckField(name,message) {
    var f = getField(name);
    if(f.value == '') {
        app.alert(message);
        f.setFocus();
        return false;
    }
    return true;
}
function Print() {
    if(!CheckField('firstname','First name is mandatory')) {return;}
    if(!CheckField('lastname','Last name is mandatory')) {return;}
    if(!CheckField('gender','Gender is mandatory')) {return;}
    if(!CheckField('address','Address is mandatory')) {return;}
    print();
}
EOD;

// Add Javascript code
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_014.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+