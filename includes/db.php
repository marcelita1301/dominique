<?php
$DB_ERROR = '';

function db_error() { global $DB_ERROR; return $DB_ERROR; }

function db_stmt($sql, $types = '', $params = array()) {
    global $conexion, $DB_ERROR;
    $stmt = mysqli_prepare($conexion, $sql);
    if (!$stmt) { $DB_ERROR = mysqli_error($conexion); error_log('DB prepare: ' . $DB_ERROR); return false; }
    if ($types !== '' && count($params) > 0) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    if (!mysqli_stmt_execute($stmt)) {
        $DB_ERROR = mysqli_stmt_error($stmt);
        error_log('DB execute: ' . $DB_ERROR);
        mysqli_stmt_close($stmt);
        return false;
    }
    return $stmt;
}

function db_all($sql, $types = '', $params = array()) {
    $stmt = db_stmt($sql, $types, $params);
    if (!$stmt) return array();
    $res = mysqli_stmt_get_result($stmt);
    $rows = $res ? mysqli_fetch_all($res, MYSQLI_ASSOC) : array();
    mysqli_stmt_close($stmt);
    return $rows;
}

function db_one($sql, $types = '', $params = array()) {
    $rows = db_all($sql, $types, $params);
    return count($rows) ? $rows[0] : null;
}

function db_exec($sql, $types = '', $params = array()) {
    $stmt = db_stmt($sql, $types, $params);
    if (!$stmt) return false;
    $n = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    return $n;
}

function columna_larga($tabla, $columna) {
    $r = db_one("SELECT CHARACTER_MAXIMUM_LENGTH AS n FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ?", 'ss', array($tabla, $columna));
    return $r && (int)$r['n'] >= 60;
}
