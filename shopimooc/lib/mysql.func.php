<?php

function connect()
{
    $link = mysqli_connect(DB_HOST, DB_USER, '', 'shop') or die("数据库连接失败：" . mysqli_errno() . ":" . mysqli_error());
    mysqli_set_charset($link, DB_CHARSET);
    mysqli_select_db($link, DB_DBNAME) or die("指定数据库打开失败");
    return $link;
}

function insert($table, $array)
{
    $link = connect();
    $keys = join(",", array_keys($array));
    $vals = "'" . join("','", array_values($array)) . "'";
    $sql = "insert into " . $table . "(" . $keys . ")  values(" . $vals . ")";
    mysqli_query($link, $sql);
    return mysqli_insert_id($link);
}

function update($table, $array, $where = null)
{
    $link = connect();
    $str = null;
    foreach ($array as $key => $val) {
        if ($str == null) {
            $sep = "";
        } else {
            $sep = ",";
        }
        $str.= $sep.$key . "='" . $val . "'";
    }
    $sql = "update ".$table." set ".$str. ($where == null ? null : "where " . $where);
    $result = mysqli_query($link, $sql);
    
    if ($result) {
        return mysqli_affected_rows($link);
    } else {
        return false;
    } 
}

function delete($table, $where = null)
{
    $link = connect();
    $where = $where == null ? null : "where " . $where;
    $sql = "delete from {$table} {$where}";
    mysqli_query($link, $sql);
    return mysqli_affected_rows($link);
}

function fetchOne($sql)
{
    $link = connect();
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($result);
    return $row;
}

function fetchALL($sql)
{
    $link = connect();
    $result = mysqli_query($link, $sql);
    while (@$row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function getResultNum($sql)
{
    $link = connect();
    $result = mysqli_query($link, $sql);
    return mysqli_num_rows($result);
}
?>