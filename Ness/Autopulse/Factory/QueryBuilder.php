<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\Autopulse\Factory {
    /**
     * Query Builder class is used to generate queries and retrieve records from
     * your database. Using a query builder class will give you a more
     * understandable code, you will have a chance to access your records with
     * few lines rather than creating and thinking on complex queries.
     */
    class QueryBuilder
    {
        /**
         *  @ignore
         */
        private $command;

        /**
         *  @ignore
         */
        private $table;

        /**
         *  @ignore
         */
        private $columns;

        /**
         *  @ignore
         */
        private $conditions;

        /**
         *  @ignore
         */
        private $joiners;

        /**
         *  @ignore
         */
        private $groupers;

        /**
         *  @ignore
         */
        private $orderers;

        /**
         *  @ignore
         */
        private $limiters;

        /**
         *  @ignore
         */
        private $havings;

        /**
         *  @ignore
         */
        private $frontFree;

        /**
         *  @ignore
         */
        private $endFree;

        /**
         * This variable is used to store a wildcard option class. Can be accessible publicly.
         *
         * @var type
         */
        public $wildcard;

        /**
         * Install QueryBuilder class.
         */
        public function __construct()
        {
            ///clear all
            $this->cmd_init();
            //OPTIONS
            $this->wildcard = new helpers\WildCard();
        }

        /**
         * Creates a select command.
         *
         * @param mixed $params Array or String of items to be selected
         *
         * @return $this
         */
        public function select($params = '*')
        {
            $this->command = 'select ';
            $this->fill_columns($params);

            return $this;
        }

        /**
         * Specifies table or tables.
         *
         * @param mixed $params Array or String of items to be selected from table
         *
         * @return $this
         */
        public function table($params)
        {
            $this->fill_tables($params);

            return $this;
        }

        /**
         * Add a where condition to your query. For multiple conditions connector is 'AND'
         * If your first parameter $what is array there is no need and must not set second $where parameter.
         *
         * @param mixed  $what Set column name for where condition
         * @param string $with set value to be matched
         *
         * @return $this
         */
        public function where($what = '/', $with = '/')
        {
            if (is_array($what) && $with == '/') {
                //diziden al
                if (empty($this->conditions)) {
                    $this->conditions .= ' where ';
                    $spc = '';
                    foreach ($what as $key => $value) {
                        $spc .= " {$key}'{$value}' AND";
                    }
                    $this->conditions .= rtrim($spc, 'AND') . ' ';
                } else {
                    $this->conditions .= ' AND ';
                    $spc = '';
                    foreach ($what as $k => $v) {
                        $spc .= " {$k}'{$v}' AND";
                    }
                    $this->conditions .= rtrim($spc, 'AND') . ' ';
                }
            } else {
                //parametrelerden al
                if (empty($this->conditions)) {
                    $this->conditions .= " where {$what}'{$with}' ";
                } else {
                    $this->conditions .= " AND {$what}'{$with}' ";
                }
            }

            return $this;
        }

        /**
         * Add a where condition to your query. For multiple conditions connector is 'OR'
         * If your first parameter $what is array there is no need and must not set second $where parameter.
         *
         * @param mixed  $what Set column name for where condition
         * @param string $with set value to be matched
         *
         * @return $this
         */
        public function where_or($what = '/', $with = '/')
        {
            if (is_array($what) && $with == '/') {
                if (empty($this->conditions)) {
                    $this->conditions .= ' where ';
                    $spc = '';
                    foreach ($what as $key => $value) {
                        $spc .= " {$key}'{$value}' OR";
                    }
                    $this->conditions .= rtrim($spc, 'OR') . ' ';
                } else {
                    $this->conditions .= ' OR ';
                    $spc = '';
                    foreach ($what as $k => $v) {
                        $spc .= " {$k}'{$v}' OR";
                    }
                    $this->conditions .= rtrim($spc, 'OR') . ' ';
                }
            } else {
                if (empty($this->conditions)) {
                    $this->conditions .= " where {$what}'{$with}' ";
                } else {
                    $this->conditions .= " OR {$what}'{$with}' ";
                }
            }

            return $this;
        }

        /**
         * Add a like condition to your query. For multiple conditions connector is 'AND'
         * For setting third parameter you need to use $wildcard variable. or "front", "end", "both" values.
         *
         * @param string $what   Set column name for like condition
         * @param string $islike set value to be matched
         * @param string $wcard  A value from wildcard variable
         *
         * @return $this
         */
        public function like($what, $islike, $wcard = 'both')
        {
            $x = $this->wildcard->getWildCard();
            switch ($wcard) {
                case 'both':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} LIKE  '{$x}{$islike}{$x}' ";
                    } else {
                        $this->conditions .= "AND {$what} LIKE  '{$x}{$islike}{$x}' ";
                    }

                    break;

                case 'front':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} LIKE  '{$x}{$islike}' ";
                    } else {
                        $this->conditions .= "AND {$what} LIKE  '{$x}{$islike}' ";
                    }
                    break;

                case 'end':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} LIKE  '{$islike}{$x}' ";
                    } else {
                        $this->conditions .= "AND {$what} LIKE  '{$islike}{$x}' ";
                    }
                    break;

                default:
                    //default; both
                    $this->like($what, $islike, 'both');
                    break;
            }

            return $this;
        }

        /**
         * Add a like condition to your query. For multiple conditions connector is 'OR'
         * For setting third parameter you need to use $wildcard variable. or "front", "end", "both" values.
         *
         * @param string $what   Set column name for like condition
         * @param string $islike set value to be matched
         * @param string $wcard  A value from wildcard variable
         *
         * @return $this
         */
        public function like_or($what, $islike, $wcard = 'both')
        {
            $x = $this->wildcard->getWildCard();
            switch ($wcard) {
                case 'both':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} LIKE  '{$x}{$islike}{$x}' ";
                    } else {
                        $this->conditions .= "OR {$what} LIKE  '{$x}{$islike}{$x}' ";
                    }

                    break;

                case 'front':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} LIKE  '{$x}{$islike}' ";
                    } else {
                        $this->conditions .= "OR {$what} LIKE  '{$x}{$islike}' ";
                    }
                    break;

                case 'end':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} LIKE  '{$islike}{$x}' ";
                    } else {
                        $this->conditions .= "OR {$what} LIKE  '{$islike}{$x}' ";
                    }
                    break;

                default:
                    //default; both
                    $this->like($what, $islike, 'both');
                    break;
            }

            return $this;
        }

        /**
         * Add a  NOT like condition to your query. For multiple conditions connector is 'AND'
         * For setting third parameter you need to use $wildcard variable. or "front", "end", "both" values.
         *
         * @param string $what   Set column name for like condition
         * @param string $islike set value to be matched
         * @param string $wcard  A value from wildcard variable
         *
         * @return $this
         */
        public function like_not($what, $islike, $wcard = 'both')
        {
            $x = $this->wildcard->getWildCard();
            switch ($wcard) {
                case 'both':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} NOT LIKE  '{$x}{$islike}{$x}' ";
                    } else {
                        $this->conditions .= "AND {$what} NOT LIKE  '{$x}{$islike}{$x}' ";
                    }

                    break;

                case 'front':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} NOT LIKE  '{$x}{$islike}' ";
                    } else {
                        $this->conditions .= "AND {$what} NOT LIKE  '{$x}{$islike}' ";
                    }
                    break;

                case 'end':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} NOT LIKE  '{$islike}{$x}' ";
                    } else {
                        $this->conditions .= "AND {$what} NOT LIKE  '{$islike}{$x}' ";
                    }
                    break;

                default:
                    //default; both
                    $this->like($what, $islike, 'both');
                    break;
            }

            return $this;
        }

        /**
         * Add a Not like condition to your query. For multiple conditions connector is 'OR'
         * For setting third parameter you need to use $wildcard variable. or "front", "end", "both" values.
         *
         * @param string $what   Set column name for like condition
         * @param string $islike set value to be matched
         * @param string $wcard  A value from wildcard variable
         *
         * @return $this
         */
        public function like_or_not($what, $islike, $wcard = 'both')
        {
            $x = $this->wildcard->getWildCard();
            switch ($wcard) {
                case 'both':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} NOT LIKE  '{$x}{$islike}{$x}' ";
                    } else {
                        $this->conditions .= "OR {$what} NOT LIKE  '{$x}{$islike}{$x}' ";
                    }

                    break;

                case 'front':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} NOT LIKE  '{$x}{$islike}' ";
                    } else {
                        $this->conditions .= "OR {$what} NOT LIKE  '{$x}{$islike}' ";
                    }
                    break;

                case 'end':
                    if (empty($this->conditions)) {
                        $this->conditions .= " WHERE {$what} NOT LIKE  '{$islike}{$x}' ";
                    } else {
                        $this->conditions .= "OR {$what} NOT LIKE  '{$islike}{$x}' ";
                    }
                    break;

                default:
                    //default; both
                    $this->like($what, $islike, 'both');
                    break;
            }

            return $this;
        }

        /**
         * Add a join condition to your query
         * For setting third parameter you need to use $wildcard variable. or "front", "end", "both" values.
         *
         * @param string $table     Set table to be joined
         * @param string $condition set values to be matched
         * @param string $type      Acceptable types; 'INNER', 'OUTER', 'LEFT', 'RIGHT'
         *
         * @return $this
         */
        public function join($table, $condition, $type = '')
        {
            $this->joiners .= " {$type} JOIN {$table} ON {$condition}";

            return $this;
        }

        /**
         * Add a group by condition to your query.
         *
         * @param mixed $columns Set array or string for columns to be grouped
         *
         * @return $this
         */
        public function group_by($columns)
        {
            if (is_array($columns)) {
                if (empty($this->groupers)) {
                    $this->groupers .= ' GROUP BY ';
                    $spc = '';
                    foreach ($columns as $val) {
                        $spc .= "{$val},";
                    }
                    $this->groupers .= rtrim($spc, ',') . ' ';
                } else {
                    $this->groupers .= ', ';
                    $spc = '';
                    foreach ($columns as $val) {
                        $spc .= "{$val},";
                    }
                    $this->groupers .= rtrim($spc, ',') . ' ';
                }
            } else {
                if (empty($this->groupers)) {
                    $this->groupers .= " GROUP BY {$columns}";
                } else {
                    $this->groupers .= ", {$columns} ";
                }
            }

            return $this;
        }

        /**
         * Set aorder by condition to your query.
         *
         * @param string $what Column name
         * @param string $how  ASC or DESC
         *
         * @return $this
         */
        public function order_by($what, $how)
        {
            if (empty($this->orderers)) {
                $this->orderers .= " ORDER BY {$what} {$how}";
            } else {
                $this->orderers .= " , {$what} {$how}";
            }

            return $this;
        }

        /**
         * Add a limit to your query.
         *
         * @param int $param Value to limit your query
         *
         * @return $this
         */
        public function limit($param)
        {
            $this->limiters .= " LIMIT {$param}";

            return $this;
        }

        /**
         * This command must be used to return your created query.
         * If you do not want to use library for your command you can set $iseditableQuery.
         * If is $iseditableQuery set function returns what it get as parameter.
         *
         * @param string $iseditableQuery
         *
         * @return string
         */
        public function get($iseditableQuery = null)
        {
            if (!empty($iseditableQuery)) {
                return $iseditableQuery;
            } else {
                $currentCommand = $this->frontFree . ' ' . $this->command . ' ' . $this->columns . ' from ' . $this->table . ' ' . $this->conditions . ' ' . $this->joiners . ' ' . $this->groupers . ' ' . $this->orderers . ' ' . $this->limiters . $this->endFree . ' ';

                return trim($this->cmd_sender($currentCommand));
            }
        }

        /**
         * @ignore
         */
        private function cmd_sender(&$current)
        {
            $temp = $current;
            $current = '';
            $this->cmd_init();

            return $temp;
        }

        /**
         * Sum of column.
         *
         * @param string $prm
         *
         * @return string
         */
        public static function sum($prm)
        {
            return " SUM({$prm}) ";
        }

        /**
         * Minimum of column.
         *
         * @param string $prm
         *
         * @return string
         */
        public static function min($prm)
        {
            return " MIN({$prm}) ";
        }

        /**
         * Maximum of column.
         *
         * @param string $prm
         *
         * @return string
         */
        public static function max($prm)
        {
            return " MAX({$prm}) ";
        }

        /**
         * Average of column.
         *
         * @param string $prm
         *
         * @return string
         */
        public static function avg($prm)
        {
            return " AVG({$prm}) ";
        }

        /**
         * Count of column.
         *
         * @param string $prm
         *
         * @return string
         */
        public static function count($prm)
        {
            return " COUNT({$prm}) ";
        }

        /**
         * Add distinct to column.
         *
         * @param string $prm
         *
         * @return string
         */
        public static function distinct($prm)
        {
            return "DISTINCT {$prm} ";
        }

        /**
         * Select column as ColumnName.
         *
         * @param string $clm Column in your table
         * @param string $as  Column name to use in query
         *
         * @return string
         */
        public static function column_as($clmn, $as)
        {
            return " {$clmn} AS {$as} ";
        }

        /**
         * Add a special command or anything else where calledn.
         *
         * @param string $prm
         *
         * @return string
         */
        public static function free($prm)
        {
            return " {$prm} ";
        }

        /**
         * Add a text or any command in front of the sql query generated.
         *
         * @param string $prm
         *
         * @return string
         */
        public function frontFree($prm)
        {
            $this->frontFree = $prm;

            return $this;
        }

        /**
         * Add a text or any command in end of the sql query generated.
         *
         * @param string $prm
         *
         * @return string
         */
        public function endFree($prm)
        {
            $this->endFree = $prm;

            return $this;
        }

        /**
         * @ignore
         */
        private function fill_columns($params)
        {
            if (is_array($params)) {
                if (empty($this->columns)) {
                    foreach ($params as $value) {
                        $this->columns .= ' ' . $value . ',';
                    }
                    $this->columns = rtrim($this->columns, ',');
                } else {
                    $this->columns .= ', ';
                    foreach ($params as $value) {
                        $this->columns .= ' ' . $value . ',';
                    }
                    $this->columns = rtrim($this->columns, ',');
                }
            } else {
                if (empty($this->columns)) {
                    $this->columns .= $params;
                } else {
                    $this->columns .= ', ' . $params;
                }
            }
        }

        /**
         * @ignore
         */
        private function fill_tables($params)
        {
            if (is_array($params)) {
                if (empty($this->table)) {
                    foreach ($params as $value) {
                        $this->table .= ' ' . $value . ',';
                    }
                    $this->table = rtrim($this->table, ',');
                } else {
                    $this->table .= ', ';
                    foreach ($params as $value) {
                        $this->table .= ' ' . $value . ',';
                    }
                    $this->table = rtrim($this->table, ',');
                }
            } else {
                if (empty($this->table)) {
                    $this->table .= $params;
                } else {
                    $this->table .= ', ' . $params;
                }
            }
        }

        /**
         * @ignore
         */
        private function cmd_init()
        {
            $this->columns = '';
            $this->command = '';
            $this->table = '';
            $this->conditions = '';
            $this->joiners = '';
            $this->groupers = '';
            $this->orderers = '';
            $this->limiters = '';
            $this->havings = '';
            $this->frontFree = '';
            $this->endFree = '';
            $this->prevCommand = '';
        }
    }
}
