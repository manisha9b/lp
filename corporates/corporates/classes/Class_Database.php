<?php

//session_start();
error_reporting(0);
/*
 * File Name: Database.php
 * Date: September 2010
 * Author: SUJEET G. KARN
 * Description: Contains database connection, result
 *              Management functions, input validation
 *              All functions return true if completed
 *              successfully and false if an error
 *              occurred
 *
 */

class Database {
    /*
     * Edit the following variables
     */

    private $db_host = DB_HOST;     // Database Host
    private $db_user = DB_USER;          // Username
    private $db_pass = DB_PASSWORD;          // Password
    private $db_name = DB_NAME;          // Database
    /*
     * End edit
     */
    private $con = false;               // Checks to see if the connection is active
    public $result = array();          // Results that are returned from the query
    public $innerResult = array();
    public $to_email = '';
    public $subject = '';
    public $auto_response = '';
    public $reply_email = '';
    public $from_email = '';
    public $mailHeader = '';
    public $username = '';
    public $userpwd = '';

    public $userGroupId;
    public $userId;
    public $userDisplayName;
	public $clusterId;
	public $user_id_pk;

	public $hsp_id;
	public $hsp_branch_id;

	public $ebh_customer_id;
	public $customer_name;

    /*
     * Connects to the database, only one connection
     * allowed
     */

    function __construct() {
        $this->userGroupId = $_SESSION['user_group_id'];
        $this->userId = $_SESSION['ref_id'];
        $this->userDisplayName = $_SESSION['user_display_name'];
		$this->clusterId = $_SESSION['cluster_id'];
		$this->user_id_pk= $_SESSION['user_id'];

		$this->hsp_id			= $_SESSION['hsp_id'];
		$this->hsp_branch_id	= $_SESSION['hsp_branch_id'];

		$this->ebh_customer_id	= $_SESSION['ebh_customer_id'];
		$this->customer_name	= $_SESSION['customer_name'];
    }

    public function connect() {
        //echo "db_user".$this->db_user;
        //exit;
        if (!$this->con) {
            $myconn = @mysql_connect($this->db_host, $this->db_user, $this->db_pass);
            if ($myconn) {
                $seldb = @mysql_select_db($this->db_name, $myconn);
                if ($seldb) {
                    $this->con = true;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    /*
     * Changes the new database, sets all current results
     * to null
     */

    public function setDatabase($name) {
        if ($this->con) {
            if (@mysql_close()) {
                $this->con = false;
                $this->results = null;
                $this->db_name = $name;
                $this->connect();
            }
        }
    }

    /*
     * Checks to see if the table exists when performing
     * queries
     */

    private function tableExists($table) {
        $tablesInDb = mysql_query('SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"') or die(mysql_error());
        if ($tablesInDb) {
            if (mysql_num_rows($tablesInDb) == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    /*
     * Selects information from the database.
     * Required: table (the name of the table)
     * Optional: rows (the columns requested, separated by commas)
     *           where (column = value as a string)
     *           order (column DIRECTION as a string)
     */
	    public function query($sql_query, $res_type = null) {
        $q = $sql_query;

        $query = @mysql_query($sql_query) or die(mysql_error());
		}
    public function select($sql_query, $res_type = null) {
        $q = $sql_query;

        $query = @mysql_query($sql_query) or die(mysql_error());

        if ($query) {
            $this->numResults = mysql_num_rows($query);
            for ($i = 0; $i < $this->numResults; $i++) {
                $r = mysql_fetch_array($query);
                $key = array_keys($r);
                for ($x = 0; $x < count($key); $x++) {
                    // Sanitizes keys so only alphavalues are allowed
                    if (!is_int($key[$x])) {
                        if (mysql_num_rows($query) > 0) {
                            if (!$res_type) {
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            } else {
                                $this->innerResult[$i][$key[$x]] = $r[$key[$x]];
                            }
                        } else if (mysql_num_rows($query) < 1) {
                            if (!$res_type) {
                                $this->result = null;
                            } else {
                                $this->innerResult = null;
                            }
                        } else {
                            if (!$res_type) {
                                $this->result[$key[$x]] = $r[$key[$x]];
                            } else {
                                $this->innerResult[$key[$x]] = $r[$key[$x]];
                            }
                        }
                    }
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /*
     * Insert values into the table
     * Required: table (the name of the table)
     *           values (the values to be inserted)
     * Optional: rows (if values don't match the number of rows)
     */

    public function insert($table, $values, $rows = null) {
        if ($this->tableExists($table)) {
            $insert = 'INSERT INTO ' . $table;
            if ($rows != null) {
                $insert .= ' (' . $rows . ')';
            }
            for ($i = 0; $i < count($values); $i++) {
                if (is_string($values[$i])) {
                    if ($values[$i] != 'NULL') {
                        //str_replace('"','',$values[$i]);
                        $values[$i] = '"' . $values[$i] . '"';
                    } else {
                        $values[$i] = $values[$i];
                    }
                }
            }

            //echo $insert;
            $values = implode(',', $values);
            $insert .= ' VALUES (' . $values . ')';
            //echo $insert;

            $ins = mysql_query($insert) or die(mysql_error());
            if ($ins) {
                return true;
            } else {
                return false;
            }
        }
    }

    /*
     * Deletes table or records where condition is true
     * Required: table (the name of the table)
     * Optional: where (condition [column =  value])
     */

    public function delete($table, $where = null) {
        if ($this->tableExists($table)) {
            if ($where == null) {
                $delete = 'DELETE ' . $table;
            } else {
                $delete = 'DELETE FROM ' . $table . ' WHERE ' . $where;
            }
            //echo $delete;
            $del = @mysql_query($delete);

            if ($del) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /*
     * Updates the database with the values sent
     * Required: table (the name of the table to be updated
     *           rows (the rows/values in a key/value array
     *           where (the row/condition in an array (row,condition) )
     */

    public function update($table, $rows, $where) {
        if ($this->tableExists($table)) {
            // Parse the where values
            // even values (including 0) contain the where rows
            // odd values contain the clauses for the row

            $update = 'UPDATE ' . $table . ' SET ';
            $keys = array_keys($rows);
            for ($i = 0; $i < count($rows); $i++) {
                if (is_string($rows[$keys[$i]])) {
                    if ($rows[$keys[$i]] != 'NULL') {
                        $update .= $keys[$i] . '="' . $rows[$keys[$i]] . '"';
                    } else {
                        $update .= $keys[$i] . '=' . $rows[$keys[$i]];
                    }
                } else {
                    $update .= $keys[$i] . '=' . $rows[$keys[$i]];
                }
                // Parse to add commas
                if ($i != count($rows) - 1) {
                    $update .= ',';
                }
            }
            $update .= ' WHERE ' . $where;
            //echo $update;

            $query = @mysql_query($update);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /*
     * Returns the result set
     */

    public function getResult() {
        return $this->result;
    }

    function is_duplicate($feild_name, $table_name, $where) {
        $sql = "select $feild_name from $table_name where " . $where;
        return $this->GET_NUM_ROWS($sql);
    }

    function GET_NUM_ROWS($SQL) {
        $QUERY = $SQL;
        $this->select($QUERY);
		return $this->numResults;
    }

    function delete_directory($dirname) {
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname . "/" . $file))
                    unlink($dirname . "/" . $file);
                else
                    delete_directory($dirname . '/' . $file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }
	}
