<?php

require_once('../model/matches.php');
$matches = new Matches();
$all_matches = $matches->getMatches();
require_once('../view/matches.php');