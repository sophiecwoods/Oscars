<!DOCTYPE html>
<html>
<head>
<title>Academy Awards (Oscars) from 1960 to 2010</title>
</head>
<body>
<p style="color:red;">
<?php

// Load the XML and XSL sources and configure the transformer
$xmlDoc = new DomDocument();
$xmlDoc->load("oscars.xml");
$xslDoc = new DomDocument();
$xslDoc->load("oscars.xsl");
$processor = new XSLTProcessor();

$filtersOk = True; // used to check if user has applied filters correctly in HTML form

// for each year, category, nominee, and info filter: 
// if filter is set to contains, pass text entered by user to respective parameter
// if filter is set to unrestricted, ignore any text entered by user and pass empty string to parameter
// if filter is set to contains but no text has been entered by user, print an error message

// check year filters
if ($_GET['filteredYear'] === 'yearContains' && $_GET['enteredYear'] !== '') {
   $processor->setParameter('', 'year', $_GET['enteredYear']); 
}
elseif ($_GET['filteredYear'] === 'yearUnrestricted') {
   $processor->setParameter('', 'year', ''); 
}
elseif ($_GET['filteredYear'] === 'yearContains' && $_GET['enteredYear'] === '') {
   print 'Enter a year or change the drop down to unrestricted.'.'<br>';
   $filtersOk = False;
}

// check category filters 
if ($_GET['filteredCategory'] === 'categoryContains' && $_GET['enteredCategory'] !== '') {
   $processor->setParameter('', 'category', $_GET['enteredCategory']); 
}
elseif ($_GET['filteredCategory'] === 'categoryUnrestricted') {
   $processor->setParameter('', 'category', ''); 
}
elseif ($_GET['filteredCategory'] === 'categoryContains' && $_GET['enteredCategory'] === '') {
   print 'Enter a category or change the drop down to unrestricted.'.'<br>';
   $filtersOk = False;
}

// check nominee filters
if ($_GET['filteredNominee'] === 'nomineeContains' && $_GET['enteredNominee'] !== '') {
   $processor->setParameter('', 'nominee', $_GET['enteredNominee']); 
}
elseif ($_GET['filteredNominee'] === 'nomineeUnrestricted') {
   $processor->setParameter('', 'nominee', ''); 
}
elseif ($_GET['filteredNominee'] === 'nomineeContains' && $_GET['enteredNominee'] === '') {
   print 'Enter a nominee or change the drop down to unrestricted.'.'<br>';
   $filtersOk = False;
}

// check info filters
if ($_GET['filteredInfo'] === 'infoContains' && $_GET['enteredInfo'] !== '') {
   $processor->setParameter('', 'info', $_GET['enteredInfo']); 
}
elseif ($_GET['filteredInfo'] === 'infoUnrestricted') {
   $processor->setParameter('', 'info', ''); 
}
elseif ($_GET['filteredInfo'] === 'infoContains' && $_GET['enteredInfo'] === '') {
   print 'Enter some info. This can be a film name or the character name of the nominee. Or change the drop down to unrestricted.'.'<br>';
   $filtersOk = False;
}

// check winners filter applied by user and set won parameter accordingly
if ($_GET['filteredNomType'] === 'winners') {
   $processor->setParameter('', 'won', 'yes'); 
}
elseif ($_GET['filteredNomType'] === 'nonWinners') {
   $processor->setParameter('', 'won', 'no'); 
}
elseif ($_GET['filteredNomType'] === 'allNoms') {
   $processor->setParameter('', 'won', ''); 
}

// if user has applied filters correctly in HTML form, attach xsl rules, perform transformation and display results
if ($filtersOk) {
   $xslDoc = $processor->importStylesheet($xslDoc);
   $htmlDoc = $processor->transformToDoc($xmlDoc);
   print $htmlDoc->saveXML(); 
}

?>
</p>
</body>
</html>