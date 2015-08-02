<?php
include_once($_SERVER['FILE_PREFIX']."/project_list/project_object.php") ;
$github_uri   = "https://github.com/aidansean/parodier" ;
$blogpost_uri = "http://aidansean.com/projects/?tag=parodier" ;
$project = new project_object("parodier", "Parodier", "https://github.com/aidansean/parodier", "http://aidansean.com/projects/?tag=parodier", "parodier/images/project.jpg", "parodier/images/project_bw.jpg", "This was something I made a while back for reasons that I can't quite remember.  It allows the user to create their own version of the \"KEEP CALM AND CARRY ON\" posters that have been popular in the past decade.", "Games", "CSS,HTML,JavaScript,MySQL,PHP") ;
?>