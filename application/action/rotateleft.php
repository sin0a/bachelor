<?php
echo "hey dude";
class RotateLeft extends Controller{
	$model = $this->loadModel('image');
	$model->roterLeft($id);
}

?>