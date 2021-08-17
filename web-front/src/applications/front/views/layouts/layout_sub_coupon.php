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
	<h1 id="subTitle"><?php echo $layout_info['sub_title']?></h1>
	<!-- //subtitle -->

	<div id="contents" class="<?php echo $layout_info['css_contents']?>">
		<?php $this->load->view($contentView); ?>
	</div>
</div>
<!-- //wrap -->

<!-- popup// -->
	<?php $this->load->view('layouts/inc/popup'); ?>
<!-- //popup -->

<!-- 우편번호찾기// -->
	<?php $this->load->view('layouts/inc/address'); ?>
<!-- //우편번호찾기 -->

<!-- footer// -->
	<?php $this->load->view('layouts/inc/footer'); ?>
<!-- //footer -->
</body>
</html>
