<?php

namespace Vol2223\PBench;

class PBench
{
	/**
	 * @param int   $execNum
	 * @param [] $functions
	 * @param closure|null $interval
	 * @return
	 */
	public static function run($execNum, $functions, $interval = null)
	{
		$times = [];
		foreach ($functions as $name => $function) {
			$time = microtime(true);
			for($i = 0; $i < $execNum; ++$i) {
				$function();
			}
			$time = microtime(true) - $time;
			$times[$name] = $time;

			if (!is_null($interval)) {
				$interval();
			}
		}

		printf("run number %s times\n", $execNum);
		foreach ($times as $testName => $time) {
			$percent = ($time / min($times)) * 100;
			$unitAverage = $time / $execNum;
			printf("%-16s: %10s sec %10s sec (%0.2f%%)\n"
				, $testName
				, sprintf("%-0.4f", $time)
				, sprintf("@ %-0.4f", $unitAverage)
				, $percent);
		}
	}
}
