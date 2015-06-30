<?php
class testcontroller{
	function test(){
		$testmodel = new testmodel();
		$data = $testmodel->test();
		$testview = new testview();
		$testview->assign('hello world',$data);
		$testview->display();
	}
}