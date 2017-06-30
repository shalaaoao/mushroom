<?php
// start profiling
xhprof_enable();

// run program

function bar($x) {
  if ($x > 0) {
    bar($x - 1);
  }
}

function foo() {
  for ($idx = 0; $idx < 2; $idx++ ) {
    bar($idx);
    $x = strlen("abc");
	
	echo $x;
  }
}
foo();
// stop profiler
$xhprof_data = xhprof_disable();

//
// Saving the XHProf run
// using the default implementation of iXHProfRuns.
//
include_once "./xhprof_lib/utils/xhprof_lib.php";
include_once "./xhprof_lib/utils/xhprof_runs.php";

$xhprof_runs = new XHProfRuns_Default();

var_dump($xhprof_runs);

// Save the run under a namespace "xhprof_foo".
//
// **NOTE**:
// By default save_run() will automatically generate a unique
// run id for you. [You can override that behavior by passing
// a run id (optional arg) to the save_run() method instead.]
//
$run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_foo");
echo "<a href='/xhprof_html/index.php?run=".$run_id."&source=xhprof_foo'>view</a>";

echo "---------------\n".
     "Assuming you have set up the http based UI for \n".
     "XHProf at some address, you can view run at \n".
     "http://<xhprof-ui-address >/index.php?run=$run_id&source=xhprof_foo\n".
     "---------------\n";