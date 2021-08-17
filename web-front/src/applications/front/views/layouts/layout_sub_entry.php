<!DOCTYPE HTML>
<html lang="ko">
<head>
<!-- confing// -->
	<?php $this->load->view('layouts/inc/config'); ?>
<!-- //confing -->
</head>
<body class="sub">
<!-- header// -->
	<?php $this->load->view('layouts/inc/header'); ?>
<!-- //header -->

<!-- wrap// -->
<div id="wrap" class="<?php echo $layout_info['css_wrap']?>">
	<!-- subtitle// -->
	<h1 id="subTitle"><a href="javascript:history.back();" class="btn_back">뒤로가기</a><?php echo $layout_info['sub_title']?></h1>
	<!-- //subtitle -->

	<div id="contents" class="<?php echo $layout_info['css_contents']?>">
		<?php $this->load->view($contentView); ?>
	</div>
</div>
<!-- //wrap -->

<!-- footer// -->
	<?php $this->load->view('layouts/inc/footer'); ?>
<!-- //footer -->
</body>
</html>
