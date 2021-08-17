<!DOCTYPE HTML>
<html lang="ko">
<head>
<!-- confing// -->
	<?php $this->load->view('layouts/inc/config'); ?>
<!-- //confing -->
</head>
<body class="home">
<!-- header// -->
	<?php $this->load->view('layouts/inc/header'); ?>
<!-- //header -->

<!-- wrap// -->
<div id="wrap" class="main">
	<div id="contents">
		<?php $this->load->view($contentView); ?>
	</div>
</div>
<!-- //wrap -->


<!-- footer// -->
	<?php $this->load->view('layouts/inc/footer'); ?>
<!-- //footer -->
</body>
</html>
