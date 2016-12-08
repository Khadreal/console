<?php

use Cli\JenkinServer;
use Cli\Job;
use Cli\SqliteDb;

define('TABLE_NAME', 'jobs_table');
require "vendor/autoload.php";


//$server = "https://builds.apache.org/";
$server = "https://localhost:8080/";
$db_path = "contact.db";

if(isset($argv[1])) {
    $server = $argv[1];
}

if(isset($argv[2])) {
    $db_path = $argv[2];
}

$query = new JenkinServer($server);

$job_info = $query->getJobs();

$count = count($job_info);
if( $count > 0) {

    $db = SqliteDb::instance($db_path);
    $conn = $db->getConnection();

    foreach ($job_info as $job) {

        $job = new Job($conn);
        
        $job->insert([
            'name' => $job->name,
            'status' => $job->status
        ]);

    }

}

print "{$count} job(s) was retrieved from server '$server' and saved to db '$db_path'".PHP_EOL;






