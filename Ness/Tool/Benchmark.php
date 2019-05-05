<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace Ness\Tool
{

    /**
     * This is a simple benchmarking class for Ness PHP framework.
     **/
    class Benchmark
    {
        private $pointList;		//Array for saved benchmark.

        /**
         * Initialize Benchmark class
         */
        public function __construct()
        {
            $this->pointList = [];
        }

        /**
         *	Start a benchmark point.
         *
         *	@return float
         */
        public function Start()
        {
            $s = explode(' ', microtime());
            $s = $s[1] + $s[0];

            return $s;
        }

        /**
         *	Finish a benchmark point.
         *
         *	@param $started start point of your benchmark
         *
         *	@return float
         */
        public function Finish($started)
        {
            $fnP = explode(' ', microtime());
            $fnP = $fnP[1] + $fnP[0];
            $fnP = round($fnP - $started, 4);

            return $fnP;
        }

        /**
         *	Save the current benchmark to array.
         *
         *	@param $name_for string Name for your benchmark profile
         *	@param $started start point of your benchmark
         *
         *	@return void
         */
        public function SavePoint($name_for, $started)
        {
            if (isset($started)) {
                $this->pointList[] = [$name_for=>$started];
            }
        }

        /**
         *	All saved benchmarks.
         *
         *	@return array
         */
        public function Points()
        {
            return $this->pointList;
        }
    }
}
