<?php

function write($fullname, $data, $mode = 'a')
{
	$fo = fopen($filename, $mode);
	$fw = fwrite($fo, $data);
	fclose($fo);
	return $fw;
}

function read($filename, $mode = 'r')
{
	$fo = fopen($filename, $mode);
	$fz = filesize($filename);
	$fr = "";
	if ($fz > 0) {
		$fr = fread($fo, $fz);
	}
	fclose($fo);
	return $fr;
}

function create($filename, $arr)
{
	$data = read($filename);
	if (empty($filename)) {
		$arr['id'] = 1;
		$arr1[] = $arr;
	} else {
		$arr1 = json_decode($data);
		$arr['id'] = count($arr1) + 1;
		array_push($arr1, $arr);
	}
	write($filename, '', 'w');
	return write($filename, json_encode($arr1));
}

function update($filename, $arr)
{
	$data = read($filename);
	if (!empty($data)) {
		$arr1 = json_decode($data);
		for ($i=0; $i < count($arr1); $i++) { 
			if ($arr1[$i]->username === $value) {
				return $arr1[$i];
			}
		}
		array_push($arr1, $arr);
	}
	write($filename, '', 'w');
	return write($filename, json_encode($arr1));
}

function getOne($filename, $key, $value)
{
	$data = read($filename);
	$arr1 = json_decode($data);
	for ($i=0; $i < count($arr1); $i++) { 
		if ($arr1[$i]->$key === $value) {
			return $arr1[$i];
		}
	}
	return array();
}

function search($filename, $key, $value)
{
	$found = false;
	$data = read($filename);
	if (!empty($data)) {
		$arr1 = json_decode($data);
		for ($i=0; $i < count($arr1); $i++) { 
			if ($arr1[$i]->$key === $value) {
				$found = true;
				break;
			}
		}
	}
	return $found;
}

 ?>
