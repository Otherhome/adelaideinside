<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

/* 회원 랭킹 위젯 - 일반 리스트형 */

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
// add_stylesheet('<link rel="stylesheet" href="'.$widget_url.'/widget.css">', 0);

?>

<ul>
<?php 
if($wset['cache']) {
	echo na_widget_cache($widget_path.'/widget.rows.php', $wset, $wcache);
} else {
	include($widget_path.'/widget.rows.php');
}
?>
</ul>

<?php if($setup_href) { ?>
	<div class="btn-wset">
		<a href="<?php echo $setup_href;?>" class="btn-setup">
			<span class="f-sm text-muted"><i class="fa fa-cog"></i> 위젯설정</span>
		</a>
	</div>
<?php } ?>