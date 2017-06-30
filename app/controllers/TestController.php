<?php

class TestController extends BaseController {

	public function test()
	{
//		echo "<a href='/xhprof_html/index.php?run=".'234'."&source=xhprof_foo'>view</a>";
//
//
//
//		die;
		xhprof_enable();

		Test::create(['str' => 'aaa', 'str2' => '123']);

		$xhprof_data = xhprof_disable();
dd($xhprof_data);
		include_once "./xhprof_lib/utils/xhprof_lib.php";
		include_once "./xhprof_lib/utils/xhprof_runs.php";

		$xhprof_runs = new XHProfRuns_Default();

		var_dump($xhprof_runs);

		$run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_foo");
		echo "<a href='/xhprof_html/index.php?run=".$run_id."&source=xhprof_foo'>view</a>";


//		Array
//		(
//			[ct] => 1                // number of calls.
//		[wt] => 419              // wall/wait time (ms).
//		[cpu] => 0               // cpu time.
//		[mu] => 8264             // memory usage (bytes).
//		[pmu] => 0               // peak memory usage.
//		)
	}

}
