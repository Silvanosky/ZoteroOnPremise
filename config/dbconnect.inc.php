<?
function Zotero_dbConnectAuth($db) {
	$charset = '';
	
	if ($db == 'master') {
		$db = 'zotero_master';
		$state = 'up'; // 'up', 'readonly', 'down'
	}
	else if ($db == 'shard') {
		$db = 'zotero_shard_1';
	}
	else if ($db == 'id1') {
		$db = 'zotero_ids';
	}
	else if ($db == 'id2') {
		$db = 'zotero_ids';
	}
	else if ($db == 'www1') {
		$db = 'zotero_www';
	}
	else if ($db == 'www2') {
		$db = 'zotero_www';
	}
	else {
		throw new Exception("Invalid db '$db'");
	}
	return [
		'host' => 'db',
		'replicas' => !empty($replicas) ? $replicas : [],
		'port' => 5432,
		'db' => $db,
		'user' => $_ENV['POSTGRES_USER'],
		'pass' => $_ENV['POSTGRES_PASS'],
		'charset' => $charset,
		'state' => !empty($state) ? $state : 'up'
	];
}
?>
