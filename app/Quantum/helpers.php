<?php

// set_path
function set_active($path, $active= 'active')
{
    return Request::is($path) ? $active: '';
}

function getAusLevels()
{
	return array('Foundation' => 'Foundation', 
		'1' => 'Level 1',
		'2' => 'Level 2',
		'3' => 'Level 3',
		'4' => 'Level 4',
		'5' => 'Level 5',
		'6' => 'Level 6',
		'7' => 'Level 7',
		'8' => 'Level 8',
		'9' => 'Level 9',
		'10' => 'Level 10',
		);
}

function getFaculties()
{
	return array('The Arts' => 'The Arts',
		'English' => 'English', 
		'Compuer Science' => 'Computer Science',
		'The Humanities' => 'The Humanities', 
		'The Humanities-Economices' => 'The Humanities-E', 
		'The Humanities-Geography' => 'The Humanities-Geography', 
		'The Humanities-History' => 'The Humanities-History', 
		'Languages' => 'Languages', 
		'Mathematics' => 'Mathematics', 
		'Science' => 'Science'
	 );
}

function getDevices()
{
	return array('Tablet', 'Desktop', 'Phone');
}