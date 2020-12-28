<?php

class SqlBuilderController
{

    public function getTables()
    {
        $db = MysqliDb::getInstance();
        $sql = 'SELECT table_name AS nombre FROM information_schema.tables WHERE table_schema = "' . $GLOBALS['cof_database']['db'] . '"';
        $query = $db->rawQuery($sql);
        if ($query) {
            return $query;
        } else {
            throw new Exception('error when querying the database.');
        }
        $db->disconnect();
    }

    public function getItemsTables($table_name)
    {
        $db = MysqliDb::getInstance();
        $sql = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$table_name.'"';
        $query = $db->rawQuery($sql);
        if ($query) {
            echo json_encode(array('success' => $query));
        } else {
            throw new Exception('error when querying the database.');
        }
        $db->disconnect();
    }


}